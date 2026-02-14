<?php

namespace App\Services;

use App\Models\Children;
use App\Models\Guardian;
use Illuminate\Support\Facades\DB;

class GuardianService
{
    public function query()
    {
        return Guardian::query();
    }

    public function find(int $id): Guardian
    {
        return Guardian::with(['children', 'secondChildren'])->findOrFail($id);
    }

    /**
     * Create a new guardian with associated children
     */
    public function create(array $data): Guardian
    {
        return DB::transaction(function () use ($data) {
            $guardian = Guardian::create($data);

            // Link existing children if provided
            if (isset($data['children_ids']) && is_array($data['children_ids'])) {
                foreach ($data['children_ids'] as $childId) {
                    $child = Children::find($childId);
                    if ($child) {
                        $child->update(['parent_id' => $guardian->id]);
                    }
                }
            }

            return $guardian;
        });
    }

    /**
     * Update guardian information
     */
    public function update($guardian, array $data): Guardian
    {
        if (is_numeric($guardian)) {
            $model = Guardian::findOrFail($guardian);
            $model->update($data);

            return $model;
        }
        $guardian->update($data);

        return $guardian;
    }

    /**
     * Delete a guardian (soft delete)
     */
    public function delete($guardian): bool
    {
        if (is_numeric($guardian)) {
            $model = Guardian::findOrFail($guardian);

            return $model->delete();
        }

        return $guardian->delete();
    }

    /**
     * Restore a soft deleted guardian
     */
    public function restore(int $id): Guardian
    {
        $guardian = Guardian::withTrashed()->findOrFail($id);
        $guardian->restore();

        return $guardian;
    }

    /**
     * Get all guardians with optional filters
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(array $filters = [])
    {
        $query = Guardian::query();

        if (isset($filters['phone'])) {
            $query->where('phone', 'LIKE', '%'.$filters['phone'].'%');
        }

        if (isset($filters['email'])) {
            $query->where('email', 'LIKE', '%'.$filters['email'].'%');
        }

        if (isset($filters['relationship'])) {
            $query->where('relationship', $filters['relationship']);
        }

        return $query->with(['children', 'secondChildren'])->get();
    }

    /**
     * Get a guardian by ID with relationships
     */
    public function getById(int $id): Guardian
    {
        return Guardian::with(['children', 'secondChildren'])->findOrFail($id);
    }

    /**
     * Get children associated with a guardian
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getChildren(Guardian $guardian)
    {
        return $guardian->children;
    }

    /**
     * Get emergency contacts from guardians
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getEmergencyContacts(array $relations = [])
    {
        return Guardian::where('relationship', 'like', '%emergency%')
            ->orWhere('is_primary_emergency_contact', true)
            ->with($relations)
            ->get();
    }

    /**
     * Check if guardian has active children enrolled
     */
    public function hasActiveChildren(Guardian $guardian): bool
    {
        return $guardian->children()
            ->where('enrollment_status', 'active')
            ->exists();
    }

    /**
     * Get guardian's children count
     */
    public function getChildrenCount(Guardian $guardian): int
    {
        return $guardian->children()->count();
    }

    /**
     * Get all contact information for a guardian
     */
    public function getContactInfo(Guardian $guardian): array
    {
        return [
            'name' => $guardian->name,
            'email' => $guardian->email,
            'phone' => $guardian->phone,
            'address' => $guardian->address,
            'relationship' => $guardian->relationship,
            'secondary_phone' => $guardian->secondary_phone ?? null,
            'workplace' => $guardian->workplace ?? null,
            'occupation' => $guardian->occupation ?? null,
        ];
    }

    /**
     * Check if guardian can be contacted via SMS
     */
    public function canReceiveSMS(Guardian $guardian): bool
    {
        return ! empty($guardian->phone) && $guardian->receives_sms_notifications;
    }

    /**
     * Check if guardian can be contacted via email
     */
    public function canReceiveEmail(Guardian $guardian): bool
    {
        return ! empty($guardian->email) && $guardian->receives_email_notifications;
    }
}
