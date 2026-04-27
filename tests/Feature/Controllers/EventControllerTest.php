<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Event;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->user->assignRole('Administrator');
    }

    public function test_index_returns_view_with_events()
    {
        $response = $this->actingAs($this->user)
            ->get(route('events.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.events.index');
    }

    public function test_index_returns_paginated_events()
    {
        Event::factory()->count(20)->create();

        $response = $this->actingAs($this->user)
            ->get(route('events.index'));

        $response->assertStatus(200);
        $response->assertViewHas('events');
    }

    public function test_create_returns_view()
    {
        $response = $this->actingAs($this->user)
            ->get(route('events.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.events.create');
    }

    public function test_store_creates_new_event()
    {
        $class = Classes::factory()->create();

        $data = [
            'name' => 'School Event',
            'description' => 'A special school event',
            'class_id' => $class->id,
            'date' => now()->format('Y-m-d'),
            'start_time' => '09:00',
            'end_time' => '15:00',
            'location' => 'School Hall',
            'max_attendees' => 50,
            'cost' => 10.00,
            'status' => 'planned',
        ];

        $response = $this->actingAs($this->user)
            ->post(route('events.store'), $data);

        $response->assertRedirect(route('events.index'));
        $this->assertDatabaseHas('events', [
            'name' => 'School Event',
            'class_id' => $class->id,
        ]);
    }

    public function test_show_returns_view_with_event()
    {
        $event = Event::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('events.show', $event->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.events.show');
    }

    public function test_edit_returns_view_with_event()
    {
        $event = Event::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('events.edit', $event->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.events.edit');
    }

    public function test_update_modifies_event()
    {
        $event = Event::factory()->create();
        $class = Classes::factory()->create();

        $data = [
            'name' => 'Updated Event',
            'description' => 'Updated description',
            'class_id' => $class->id,
            'date' => now()->format('Y-m-d'),
            'start_time' => '10:00',
            'end_time' => '16:00',
            'location' => 'Updated Hall',
            'max_attendees' => 60,
            'cost' => 15.00,
            'status' => 'completed',
        ];

        $response = $this->actingAs($this->user)
            ->put(route('events.update', $event->id), $data);

        $response->assertRedirect(route('events.index'));
        $this->assertDatabaseHas('events', [
            'id' => $event->id,
            'name' => 'Updated Event',
        ]);
    }

    public function test_destroy_removes_event()
    {
        $event = Event::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('events.destroy', $event->id));

        $response->assertRedirect(route('events.index'));
        $this->assertSoftDeleted('events', [
            'id' => $event->id,
        ]);
    }

    public function test_unauthorized_user_cannot_access_events_routes()
    {
        $userWithoutPermission = User::factory()->create();
        
        $response = $this->actingAs($userWithoutPermission)
            ->get(route('events.index'));

        $response->assertForbidden();
    }

    public function test_export_functionality_pdf()
    {
        Event::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('events.export.pdf'));

        $response->assertStatus(200);
    }

    public function test_export_functionality_excel()
    {
        Event::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('events.export.excel'));

        $response->assertStatus(200);
    }

    public function test_pagination_works()
    {
        Event::factory()->count(30)->create();

        $response = $this->actingAs($this->user)
            ->get(route('events.index'));

        $response->assertStatus(200);
    }
}
