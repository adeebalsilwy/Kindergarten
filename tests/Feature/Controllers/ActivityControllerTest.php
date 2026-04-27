<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Activity;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActivityControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->user->assignRole('Administrator');
    }

    public function test_index_returns_view_with_activities()
    {
        $response = $this->actingAs($this->user)
            ->get(route('activities.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.activities.index');
    }

    public function test_index_returns_paginated_activities()
    {
        Activity::factory()->count(20)->create();

        $response = $this->actingAs($this->user)
            ->get(route('activities.index'));

        $response->assertStatus(200);
        $response->assertViewHas('activities');
    }

    public function test_create_returns_view()
    {
        $response = $this->actingAs($this->user)
            ->get(route('activities.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.activities.create');
    }

    public function test_store_creates_new_activity()
    {
        $class = Classes::factory()->create();

        $data = [
            'name' => 'Science Activity',
            'description' => 'A fun science activity',
            'class_id' => $class->id,
            'date' => now()->format('Y-m-d'),
            'start_time' => '09:00',
            'end_time' => '11:00',
            'status' => 'planned',
        ];

        $response = $this->actingAs($this->user)
            ->post(route('activities.store'), $data);

        $response->assertRedirect(route('activities.index'));
        $this->assertDatabaseHas('activities', [
            'name' => 'Science Activity',
            'class_id' => $class->id,
        ]);
    }

    public function test_show_returns_view_with_activity()
    {
        $activity = Activity::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('activities.show', $activity->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.activities.show');
    }

    public function test_edit_returns_view_with_activity()
    {
        $activity = Activity::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('activities.edit', $activity->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.activities.edit');
    }

    public function test_update_modifies_activity()
    {
        $activity = Activity::factory()->create();
        $class = Classes::factory()->create();

        $data = [
            'name' => 'Updated Activity',
            'description' => 'Updated description',
            'class_id' => $class->id,
            'date' => now()->format('Y-m-d'),
            'start_time' => '10:00',
            'end_time' => '12:00',
            'status' => 'completed',
        ];

        $response = $this->actingAs($this->user)
            ->put(route('activities.update', $activity->id), $data);

        $response->assertRedirect(route('activities.index'));
        $this->assertDatabaseHas('activities', [
            'id' => $activity->id,
            'name' => 'Updated Activity',
        ]);
    }

    public function test_destroy_removes_activity()
    {
        $activity = Activity::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('activities.destroy', $activity->id));

        $response->assertRedirect(route('activities.index'));
        $this->assertSoftDeleted('activities', [
            'id' => $activity->id,
        ]);
    }

    public function test_unauthorized_user_cannot_access_activities_routes()
    {
        $userWithoutPermission = User::factory()->create();
        
        $response = $this->actingAs($userWithoutPermission)
            ->get(route('activities.index'));

        $response->assertForbidden();
    }

    public function test_export_functionality_pdf()
    {
        Activity::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('activities.export.pdf'));

        $response->assertStatus(200);
    }

    public function test_export_functionality_excel()
    {
        Activity::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('activities.export.excel'));

        $response->assertStatus(200);
    }

    public function test_pagination_works()
    {
        Activity::factory()->count(30)->create();

        $response = $this->actingAs($this->user)
            ->get(route('activities.index'));

        $response->assertStatus(200);
    }
}
