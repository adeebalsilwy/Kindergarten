<?php

namespace App\Services;

use App\Models\Activity;
use App\Models\Children;
use App\Models\Event;

class ActivityEventService
{
    /**
     * Create a new activity
     */
    public function createActivity(array $data): Activity
    {
        return Activity::create($data);
    }

    /**
     * Update an activity
     */
    public function updateActivity(Activity $activity, array $data): Activity
    {
        $activity->update($data);

        return $activity;
    }

    /**
     * Delete an activity
     */
    public function deleteActivity(Activity $activity): bool
    {
        return $activity->delete();
    }

    /**
     * Register children for an activity
     */
    public function registerChildrenForActivity(int $activityId, array $childrenIds): bool
    {
        $activity = Activity::findOrFail($activityId);
        $activity->children()->sync($childrenIds);

        return true;
    }

    /**
     * Add a child to an activity
     */
    public function addChildToActivity(int $activityId, int $childId): bool
    {
        $activity = Activity::findOrFail($activityId);
        $child = Children::findOrFail($childId);

        $activity->children()->attach($childId);

        return true;
    }

    /**
     * Remove a child from an activity
     */
    public function removeChildFromActivity(int $activityId, int $childId): bool
    {
        $activity = Activity::findOrFail($activityId);
        $activity->children()->detach($childId);

        return true;
    }

    /**
     * Get activities for a specific class
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getActivitiesForClass(int $classId)
    {
        return Activity::where('class_id', $classId)
            ->with(['teacher', 'curriculum', 'children'])
            ->get();
    }

    /**
     * Get activities for a specific child
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getActivitiesForChild(int $childId)
    {
        return Activity::whereHas('children', function ($query) use ($childId) {
            $query->where('children.id', $childId);
        })
            ->with(['class', 'teacher', 'curriculum'])
            ->get();
    }

    /**
     * Get upcoming activities for a class
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUpcomingActivitiesForClass(int $classId, ?string $startDate = null, ?string $endDate = null)
    {
        $query = Activity::where('class_id', $classId)
            ->where('scheduled_date', '>=', now());

        if ($startDate) {
            $query->whereDate('scheduled_date', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('scheduled_date', '<=', $endDate);
        }

        return $query->with(['teacher', 'curriculum', 'children'])
            ->orderBy('scheduled_date', 'asc')
            ->get();
    }

    /**
     * Create a new event
     */
    public function createEvent(array $data): Event
    {
        return Event::create($data);
    }

    /**
     * Update an event
     */
    public function updateEvent(Event $event, array $data): Event
    {
        $event->update($data);

        return $event;
    }

    /**
     * Delete an event
     */
    public function deleteEvent(Event $event): bool
    {
        return $event->delete();
    }

    /**
     * Register children for an event
     */
    public function registerChildrenForEvent(int $eventId, array $childrenIds): bool
    {
        $event = Event::findOrFail($eventId);
        $event->children()->sync($childrenIds);

        return true;
    }

    /**
     * Add a child to an event
     */
    public function addChildToEvent(int $eventId, int $childId): bool
    {
        $event = Event::findOrFail($eventId);
        $child = Children::findOrFail($childId);

        $event->children()->attach($childId);

        return true;
    }

    /**
     * Remove a child from an event
     */
    public function removeChildFromEvent(int $eventId, int $childId): bool
    {
        $event = Event::findOrFail($eventId);
        $event->children()->detach($childId);

        return true;
    }

    /**
     * Get events for a specific class
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getEventsForClass(int $classId)
    {
        return Event::where('class_id', $classId)
            ->with(['teacher', 'children'])
            ->get();
    }

    /**
     * Get events for a specific child
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getEventsForChild(int $childId)
    {
        return Event::whereHas('children', function ($query) use ($childId) {
            $query->where('children.id', $childId);
        })
            ->with(['class', 'teacher'])
            ->get();
    }

    /**
     * Get upcoming events for a class
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUpcomingEventsForClass(int $classId, ?string $startDate = null, ?string $endDate = null)
    {
        $query = Event::where('class_id', $classId)
            ->where('start_datetime', '>=', now());

        if ($startDate) {
            $query->whereDate('start_datetime', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('start_datetime', '<=', $endDate);
        }

        return $query->with(['teacher', 'children'])
            ->orderBy('start_datetime', 'asc')
            ->get();
    }

    /**
     * Get activities and events for a child within a date range
     *
     * @return array
     */
    public function getChildSchedule(int $childId, ?string $startDate = null, ?string $endDate = null)
    {
        $activityQuery = Activity::whereHas('children', function ($query) use ($childId) {
            $query->where('children.id', $childId);
        });

        $eventQuery = Event::whereHas('children', function ($query) use ($childId) {
            $query->where('children.id', $childId);
        });

        if ($startDate) {
            $activityQuery->whereDate('scheduled_date', '>=', $startDate);
            $eventQuery->whereDate('start_datetime', '>=', $startDate);
        }

        if ($endDate) {
            $activityQuery->whereDate('scheduled_date', '<=', $endDate);
            $eventQuery->whereDate('start_datetime', '<=', $endDate);
        }

        $activities = $activityQuery->with(['class', 'teacher', 'curriculum'])->get();
        $events = $eventQuery->with(['class', 'teacher'])->get();

        // Sort combined schedule by date/time
        $schedule = collect();
        $schedule = $schedule->concat($activities->map(function ($item) {
            $item->type = 'activity';
            $item->date = $item->scheduled_date;

            return $item;
        }));
        $schedule = $schedule->concat($events->map(function ($item) {
            $item->type = 'event';
            $item->date = $item->start_datetime;

            return $item;
        }));

        return $schedule->sortBy('date')->values();
    }

    /**
     * Get attendance for an activity
     */
    public function getActivityAttendance(int $activityId): array
    {
        $activity = Activity::with(['children.attendances' => function ($query) use ($activityId) {
            $query->whereHas('child.activities', function ($q) use ($activityId) {
                $q->where('activity_id', $activityId);
            });
        }])->findOrFail($activityId);

        $registeredChildren = $activity->children;
        $attendanceCount = 0;
        $childrenWithAttendance = collect();

        foreach ($registeredChildren as $child) {
            $childAttendance = $child->attendances()
                ->whereDate('date', $activity->scheduled_date->toDateString())
                ->first();

            if ($childAttendance) {
                $attendanceCount++;
                $childrenWithAttendance->push([
                    'child' => $child,
                    'attendance' => $childAttendance,
                ]);
            }
        }

        return [
            'activity' => $activity,
            'registered_count' => $registeredChildren->count(),
            'attendance_count' => $attendanceCount,
            'attendance_rate' => $registeredChildren->count() > 0 ?
                round(($attendanceCount / $registeredChildren->count()) * 100, 2) : 0,
            'children_with_attendance' => $childrenWithAttendance,
        ];
    }

    /**
     * Get attendance for an event
     */
    public function getEventAttendance(int $eventId): array
    {
        $event = Event::with(['children.attendances' => function ($query) {
            $query->whereBetween('date', [
                optional($event)->start_datetime->toDateString(),
                optional($event)->end_datetime->toDateString(),
            ]);
        }])->findOrFail($eventId);

        $registeredChildren = $event->children;
        $attendanceCount = 0;
        $childrenWithAttendance = collect();

        foreach ($registeredChildren as $child) {
            // Check attendance during event period
            $childAttendance = $child->attendances()
                ->whereBetween('date', [
                    $event->start_datetime->toDateString(),
                    $event->end_datetime->toDateString(),
                ])
                ->get();

            if ($childAttendance->count() > 0) {
                $attendanceCount++;
                $childrenWithAttendance->push([
                    'child' => $child,
                    'attendance' => $childAttendance,
                ]);
            }
        }

        return [
            'event' => $event,
            'registered_count' => $registeredChildren->count(),
            'attendance_count' => $attendanceCount,
            'attendance_rate' => $registeredChildren->count() > 0 ?
                round(($attendanceCount / $registeredChildren->count()) * 100, 2) : 0,
            'children_with_attendance' => $childrenWithAttendance,
        ];
    }
}
