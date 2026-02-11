<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Event;
use App\Models\Teacher;
use App\Models\Classes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_event_model_database_structure()
    {
        $event = Event::factory()->create();

        $this->assertDatabaseHas('events', [
            'id' => $event->id,
            'title' => $event->title,
            'description' => $event->description,
        ]);
    }

    public function test_event_model_fillable_attributes()
    {
        $fillable = [
            'title',
            'description',
            'start_datetime',
            'end_datetime',
            'location',
            'event_type',
            'organizer',
            'class_id',
            'teacher_id',
            'attendees',
            'status',
            'requires_confirmation',
            'is_public',
            'is_recurring',
            'recurrence_pattern',
            'recurrence_end_date',
            'recurring_days',
            'send_reminders',
            'reminder_hours_before',
            'documents',
            'notes',
        ];

        $model = new Event();
        $modelFillable = $model->getFillable();
        
        // Check that all expected attributes are present in the model's fillable array
        foreach ($fillable as $attribute) {
            $this->assertContains($attribute, $modelFillable);
        }
        
        // Check that the model's fillable array doesn't have unexpected attributes
        foreach ($modelFillable as $attribute) {
            $this->assertContains($attribute, $fillable);
        }
    }

    public function test_event_model_casts()
    {
        $casts = [
            'start_datetime' => 'datetime',
            'end_datetime' => 'datetime',
            'recurrence_end_date' => 'date',
            'requires_confirmation' => 'boolean',
            'is_public' => 'boolean',
            'is_recurring' => 'boolean',
            'send_reminders' => 'boolean',
            'reminder_hours_before' => 'integer',
            'attendees' => 'array',
            'recurring_days' => 'array',
            'documents' => 'array',
            'deleted_at' => 'datetime',
        ];

        $model = new Event();
        $modelCasts = $model->getCasts();
        
        // Check that all expected casts are present in the model's casts array
        foreach ($casts as $key => $value) {
            $this->assertArrayHasKey($key, $modelCasts);
            $this->assertEquals($value, $modelCasts[$key]);
        }
        
        // Check that the model's casts array doesn't have unexpected casts
        foreach ($modelCasts as $key => $value) {
            if (array_key_exists($key, $casts)) {
                $this->assertEquals($casts[$key], $value);
            }
        }
    }

    public function test_event_model_appends()
    {
        $appends = [
            'slug',
            'attendee_count',
            'is_full',
            'is_ongoing',
            'is_registration_open',
        ];

        $model = new Event();
        $modelAppends = $model->getAppends();
        
        // Check that all expected appends are present in the model's appends array
        foreach ($appends as $append) {
            $this->assertContains($append, $modelAppends);
        }
        
        // Check that the model's appends array doesn't have unexpected appends
        foreach ($modelAppends as $append) {
            $this->assertContains($append, $appends);
        }
    }

    public function test_event_belongs_to_teacher_relationship()
    {
        $teacher = Teacher::factory()->create();
        $event = Event::factory()->create(['teacher_id' => $teacher->id]);

        $relation = $event->teacher();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('teacher_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_event_belongs_to_class_relationship()
    {
        $class = Classes::factory()->create();
        $event = Event::factory()->create(['class_id' => $class->id]);

        $relation = $event->class();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('class_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_soft_deletes_trait()
    {
        $event = Event::factory()->create();
        $event->delete();

        $this->assertNotNull($event->deleted_at);
        $this->assertCount(0, Event::all());
        $this->assertCount(1, Event::withTrashed()->get());
    }

    public function test_title_field()
    {
        $event = Event::factory()->create([
            'title' => 'Annual School Play'
        ]);

        $this->assertEquals('Annual School Play', $event->title);
    }

    public function test_description_field()
    {
        $event = Event::factory()->create([
            'description' => 'Annual school play featuring our talented students'
        ]);

        $this->assertEquals('Annual school play featuring our talented students', $event->description);
    }

    public function test_start_datetime_field()
    {
        $event = Event::factory()->create([
            'start_datetime' => '2023-12-31 10:00:00'
        ]);

        $this->assertInstanceOf('Carbon\Carbon', $event->start_datetime);
        $this->assertEquals('2023-12-31 10:00:00', $event->start_datetime->format('Y-m-d H:i:s'));
    }

    public function test_end_datetime_field()
    {
        $event = Event::factory()->create([
            'end_datetime' => '2023-12-31 12:00:00'
        ]);

        $this->assertInstanceOf('Carbon\Carbon', $event->end_datetime);
        $this->assertEquals('2023-12-31 12:00:00', $event->end_datetime->format('Y-m-d H:i:s'));
    }

    public function test_location_field()
    {
        $event = Event::factory()->create([
            'location' => 'School Auditorium'
        ]);

        $this->assertEquals('School Auditorium', $event->location);
    }

    public function test_max_attendees_field()
    {
        $event = Event::factory()->create([
            'event_type' => 'workshop'
        ]);

        $this->assertEquals('workshop', $event->event_type);
    }

    public function test_status_field()
    {
        $event = Event::factory()->create([
            'status' => 'confirmed'
        ]);

        $this->assertEquals('confirmed', $event->status);
    }

    public function test_event_type_field()
    {
        $event = Event::factory()->create([
            'event_type' => 'meeting'
        ]);

        $this->assertEquals('meeting', $event->event_type);
    }

    public function test_recurring_field()
    {
        $event = Event::factory()->create([
            'is_recurring' => true
        ]);

        $this->assertTrue($event->is_recurring);
        $this->assertIsBool($event->is_recurring);
    }

    public function test_recurring_interval_field()
    {
        $event = Event::factory()->create([
            'recurrence_pattern' => 'weekly'
        ]);

        $this->assertEquals('weekly', $event->recurrence_pattern);
    }

    public function test_recurring_until_field()
    {
        $event = Event::factory()->create([
            'recurrence_end_date' => '2024-12-31'
        ]);

        $this->assertInstanceOf('Carbon\Carbon', $event->recurrence_end_date);
        $this->assertEquals('2024-12-31', $event->recurrence_end_date->format('Y-m-d'));
    }

    public function test_integer_casting()
    {
        $event = Event::factory()->create([
            'reminder_hours_before' => '24'
        ]);

        // Should be cast to integer
        $this->assertEquals(24, $event->reminder_hours_before);
        $this->assertIsInt($event->reminder_hours_before);
    }
}