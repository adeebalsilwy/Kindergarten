<?php

namespace App\Http\Controllers;

use App\Models\ClassEnrollment;
use App\Models\Classes;
use App\Models\Children;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClassEnrollmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $this->authorize('view_any', ClassEnrollment::class);

        $query = ClassEnrollment::with(['class', 'child']);

        // Apply filters
        if ($request->filled('class_id')) {
            $query->where('class_id', $request->get('class_id'));
        }

        if ($request->filled('child_id')) {
            $query->where('child_id', $request->get('child_id'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->get('status'));
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortDirection = $request->get('sort_direction', 'desc');
        $allowedSortFields = ['class_id', 'child_id', 'status', 'enrollment_date', 'created_at'];
        
        if (in_array($sortBy, $allowedSortFields)) {
            $query->orderBy($sortBy, $sortDirection);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $enrollments = $query->paginate(15)->appends($request->query());

        // Get all classes and children for filter dropdowns
        $classes = Classes::all();
        $children = Children::all();

        return view('pages.class-enrollments.index', compact('enrollments', 'classes', 'children'));
    }

    public function create()
    {
        $this->authorize('create', ClassEnrollment::class);

        $classes = Classes::where('is_active', true)->get();
        $children = Children::where('enrollment_status', 'active')->get();

        return view('pages.class-enrollments.create', compact('classes', 'children'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', ClassEnrollment::class);

        $validated = $request->validate([
            'class_id' => 'required|exists:classes,id',
            'child_id' => 'required|exists:children,id|unique:class_enrollments,class_id,NULL,id,child_id,' . $request->child_id . ',status,active',
            'enrollment_date' => 'required|date',
            'status' => 'required|in:active,inactive,completed,transferred',
            'reason' => 'nullable|string|max:500',
        ]);

        // Check if class has available spots
        $class = Classes::find($validated['class_id']);
        if ($class->is_full && $validated['status'] === 'active') {
            return redirect()->back()->withErrors(['class_id' => 'Selected class is full.']);
        }

        $enrollment = ClassEnrollment::create([
            'class_id' => $validated['class_id'],
            'child_id' => $validated['child_id'],
            'enrollment_date' => $validated['enrollment_date'],
            'status' => $validated['status'],
            'reason' => $validated['reason'],
            'created_by' => auth()->id(),
        ]);

        // Update class current students count
        if ($validated['status'] === 'active') {
            $class->increment('current_students');
        }

        return redirect()->route('class-enrollments.index')->with('success', __('Class enrollment created successfully.'));
    }

    public function show(ClassEnrollment $classEnrollment)
    {
        $this->authorize('view', $classEnrollment);

        $classEnrollment->load(['class', 'child', 'createdBy']);

        return view('pages.class-enrollments.show', compact('classEnrollment'));
    }

    public function edit(ClassEnrollment $classEnrollment)
    {
        $this->authorize('update', $classEnrollment);

        $classes = Classes::where('is_active', true)->get();
        $children = Children::all();

        return view('pages.class-enrollments.edit', compact('classEnrollment', 'classes', 'children'));
    }

    public function update(Request $request, ClassEnrollment $classEnrollment)
    {
        $this->authorize('update', $classEnrollment);

        $validated = $request->validate([
            'class_id' => 'required|exists:classes,id',
            'child_id' => 'required|exists:children,id|unique:class_enrollments,class_id,' . $classEnrollment->id . ',id,child_id,' . $request->child_id . ',status,active',
            'enrollment_date' => 'required|date',
            'withdrawal_date' => 'nullable|date',
            'status' => 'required|in:active,inactive,completed,transferred',
            'reason' => 'nullable|string|max:500',
        ]);

        $previousStatus = $classEnrollment->status;
        $previousClassId = $classEnrollment->class_id;

        $classEnrollment->update([
            'class_id' => $validated['class_id'],
            'child_id' => $validated['child_id'],
            'enrollment_date' => $validated['enrollment_date'],
            'withdrawal_date' => $validated['withdrawal_date'],
            'status' => $validated['status'],
            'reason' => $validated['reason'],
        ]);

        // Update class counts based on status changes
        if ($previousStatus === 'active' && $validated['status'] !== 'active') {
            // Student is being deactivated, decrement from old class
            $oldClass = Classes::find($previousClassId);
            if ($oldClass) {
                $oldClass->decrement('current_students');
            }
        } elseif ($previousStatus !== 'active' && $validated['status'] === 'active') {
            // Student is being activated, increment to new class
            $newClass = Classes::find($validated['class_id']);
            if ($newClass && !$newClass->is_full) {
                $newClass->increment('current_students');
            } else {
                return redirect()->back()->withErrors(['class_id' => 'Selected class is full.']);
            }
        } elseif ($previousStatus === 'active' && $validated['status'] === 'active' && $previousClassId != $validated['class_id']) {
            // Student is being transferred between active classes
            $oldClass = Classes::find($previousClassId);
            $newClass = Classes::find($validated['class_id']);
            
            if ($oldClass) {
                $oldClass->decrement('current_students');
            }
            
            if ($newClass && !$newClass->is_full) {
                $newClass->increment('current_students');
            } else {
                return redirect()->back()->withErrors(['class_id' => 'Selected class is full.']);
            }
        }

        return redirect()->route('class-enrollments.index')->with('success', __('Class enrollment updated successfully.'));
    }

    public function destroy(ClassEnrollment $classEnrollment)
    {
        $this->authorize('delete', $classEnrollment);

        // If enrollment was active, decrement class count
        if ($classEnrollment->status === 'active') {
            $class = $classEnrollment->class;
            if ($class) {
                $class->decrement('current_students');
            }
        }

        $classEnrollment->delete();

        return redirect()->route('class-enrollments.index')->with('success', __('Class enrollment deleted successfully.'));
    }

    // Method to transfer a student from one class to another
    public function transfer(Request $request, ClassEnrollment $classEnrollment)
    {
        $this->authorize('update', $classEnrollment);

        $validated = $request->validate([
            'new_class_id' => 'required|exists:classes,id|different:class_id',
            'transfer_reason' => 'nullable|string|max:500',
            'transfer_date' => 'required|date',
        ]);

        $oldClass = $classEnrollment->class;
        $newClass = Classes::find($validated['new_class_id']);

        // Check if new class has available spots
        if ($newClass->is_full) {
            return redirect()->back()->withErrors(['new_class_id' => 'New class is full.']);
        }

        // Update the enrollment
        $classEnrollment->update([
            'class_id' => $validated['new_class_id'],
            'status' => 'transferred',
            'reason' => $validated['transfer_reason'],
        ]);

        // Update class counts
        if ($oldClass) {
            $oldClass->decrement('current_students');
        }
        $newClass->increment('current_students');

        return redirect()->route('class-enrollments.index')->with('success', __('Student transferred successfully.'));
    }

    // Method to enroll a student in a new class (keeping old enrollment active)
    public function dualEnroll(Request $request)
    {
        $this->authorize('create', ClassEnrollment::class);

        $validated = $request->validate([
            'class_id' => 'required|exists:classes,id',
            'child_id' => 'required|exists:children,id',
            'enrollment_date' => 'required|date',
            'status' => 'required|in:active,inactive,completed,transferred',
            'reason' => 'nullable|string|max:500',
        ]);

        // Check if class has available spots
        $class = Classes::find($validated['class_id']);
        if ($class->is_full && $validated['status'] === 'active') {
            return redirect()->back()->withErrors(['class_id' => 'Selected class is full.']);
        }

        // Check if student is already enrolled in this class
        $existingEnrollment = ClassEnrollment::where('child_id', $validated['child_id'])
            ->where('class_id', $validated['class_id'])
            ->where('status', 'active')
            ->first();

        if ($existingEnrollment) {
            return redirect()->back()->withErrors(['child_id' => 'Student is already enrolled in this class.']);
        }

        $enrollment = ClassEnrollment::create([
            'class_id' => $validated['class_id'],
            'child_id' => $validated['child_id'],
            'enrollment_date' => $validated['enrollment_date'],
            'status' => $validated['status'],
            'reason' => $validated['reason'],
            'created_by' => auth()->id(),
        ]);

        // Update class current students count
        if ($validated['status'] === 'active') {
            $class->increment('current_students');
        }

        return redirect()->route('class-enrollments.index')->with('success', __('Dual enrollment created successfully.'));
    }

    // Method to handle bulk update of enrollment statuses
    public function bulkUpdate(Request $request)
    {
        $this->authorize('update', ClassEnrollment::class);

        $request->validate([
            'ids' => 'required|array|min:1',
            'ids.*' => 'required|exists:class_enrollments,id',
            'status' => 'required|in:active,inactive,completed,transferred'
        ]);

        $ids = json_decode($request->ids, true);
        $status = $request->status;

        // Get current enrollments to track class changes
        $enrollments = ClassEnrollment::whereIn('id', $ids)->get();

        foreach ($enrollments as $enrollment) {
            $previousStatus = $enrollment->status;
            $previousClassId = $enrollment->class_id;

            $enrollment->update(['status' => $status]);

            // Update class counts based on status changes
            if ($previousStatus === 'active' && $status !== 'active') {
                // Student is being deactivated, decrement from old class
                $oldClass = Classes::find($previousClassId);
                if ($oldClass) {
                    $oldClass->decrement('current_students');
                }
            } elseif ($previousStatus !== 'active' && $status === 'active') {
                // Student is being activated, increment to class
                $class = Classes::find($enrollment->class_id);
                if ($class && !$class->is_full) {
                    $class->increment('current_students');
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Cannot activate enrollment: selected class is full or invalid.'
                    ], 422);
                }
            } elseif ($previousStatus === 'active' && $status === 'active') {
                // Status remains active, no change to class count
            } elseif ($previousStatus !== 'active' && $status !== 'active') {
                // Status remains inactive, no change to class count
            }
        }

        return response()->json([
            'success' => true,
            'message' => __('Selected enrollments updated successfully.')
        ]);
    }

    // Method to handle bulk transfer of students
    public function bulkTransfer(Request $request)
    {
        $this->authorize('update', ClassEnrollment::class);

        $request->validate([
            'ids' => 'required|array|min:1',
            'ids.*' => 'required|exists:class_enrollments,id',
            'new_class_id' => 'required|exists:classes,id',
            'reason' => 'nullable|string|max:500'
        ]);

        $ids = json_decode($request->ids, true);
        $newClassId = $request->new_class_id;
        $reason = $request->reason;

        // Check if new class has available spots for all transfers
        $newClass = Classes::find($newClassId);
        $countToTransfer = count($ids);
        $availableSpots = $newClass->capacity - $newClass->current_students;

        if ($availableSpots < $countToTransfer) {
            return response()->json([
                'success' => false,
                'message' => 'Selected class does not have enough available spots for all transfers.'
            ], 422);
        }

        // Get current enrollments to track class changes
        $enrollments = ClassEnrollment::whereIn('id', $ids)->get();

        foreach ($enrollments as $enrollment) {
            $oldClass = $enrollment->class;

            // Update the enrollment
            $enrollment->update([
                'class_id' => $newClassId,
                'status' => 'transferred',
                'reason' => $reason,
            ]);

            // Update class counts
            if ($oldClass) {
                $oldClass->decrement('current_students');
            }
            $newClass->increment('current_students');
        }

        return response()->json([
            'success' => true,
            'message' => __('Selected students transferred successfully.')
        ]);
    }

    // Method to handle bulk deletion of enrollments
    public function bulkDelete(Request $request)
    {
        $this->authorize('delete', ClassEnrollment::class);

        $request->validate([
            'ids' => 'required|array|min:1',
            'ids.*' => 'required|exists:class_enrollments,id'
        ]);

        $ids = json_decode($request->ids, true);

        // Get current enrollments to adjust class counts if needed
        $enrollments = ClassEnrollment::whereIn('id', $ids)->get();

        foreach ($enrollments as $enrollment) {
            // If enrollment was active, decrement class count
            if ($enrollment->status === 'active') {
                $class = $enrollment->class;
                if ($class) {
                    $class->decrement('current_students');
                }
            }

            // Delete the enrollment
            $enrollment->delete();
        }

        return response()->json([
            'success' => true,
            'message' => __('Selected enrollments deleted successfully.')
        ]);
    }
}