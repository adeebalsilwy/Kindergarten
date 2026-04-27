<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Attendance;
use App\Models\Children;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AttendanceControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->user->assignRole('Administrator');
    }

    public function test_index_returns_view_with_attendances()
    {
        $response = $this->actingAs($this->user)
            ->get(route('attendances.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.attendances.index');
    }

    public function test_index_returns_paginated_attendances()
    {
        Attendance::factory()->count(20)->create();

        $response = $this->actingAs($this->user)
            ->get(route('attendances.index'));

        $response->assertStatus(200);
        $response->assertViewHas('attendances');
    }

    public function test_create_returns_view()
    {
        $response = $this->actingAs($this->user)
            ->get(route('attendances.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.attendances.create');
    }

    public function test_store_creates_new_attendance()
    {
        $child = Children::factory()->create();
        $class = Classes::factory()->create();

        $data = [
            'child_id' => $child->id,
            'class_id' => $class->id,
            'date' => now()->format('Y-m-d'),
            'status' => 'present',
            'check_in' => '08:00',
            'check_out' => '14:00',
            'notes' => 'Regular attendance',
        ];

        $response = $this->actingAs($this->user)
            ->post(route('attendances.store'), $data);

        $response->assertRedirect(route('attendances.index'));
        $this->assertDatabaseHas('attendances', [
            'child_id' => $child->id,
            'status' => 'present',
        ]);
    }

    public function test_show_returns_view_with_attendance()
    {
        $attendance = Attendance::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('attendances.show', $attendance->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.attendances.show');
    }

    public function test_edit_returns_view_with_attendance()
    {
        $attendance = Attendance::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('attendances.edit', $attendance->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.attendances.edit');
    }

    public function test_update_modifies_attendance()
    {
        $attendance = Attendance::factory()->create();
        $child = Children::factory()->create();
        $class = Classes::factory()->create();

        $data = [
            'child_id' => $child->id,
            'class_id' => $class->id,
            'date' => now()->format('Y-m-d'),
            'status' => 'absent',
            'check_in' => null,
            'check_out' => null,
            'notes' => 'Absent due to illness',
        ];

        $response = $this->actingAs($this->user)
            ->put(route('attendances.update', $attendance->id), $data);

        $response->assertRedirect(route('attendances.index'));
        $this->assertDatabaseHas('attendances', [
            'id' => $attendance->id,
            'status' => 'absent',
        ]);
    }

    public function test_destroy_removes_attendance()
    {
        $attendance = Attendance::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('attendances.destroy', $attendance->id));

        $response->assertRedirect(route('attendances.index'));
        $this->assertSoftDeleted('attendances', [
            'id' => $attendance->id,
        ]);
    }

    public function test_bulk_returns_view()
    {
        $response = $this->actingAs($this->user)
            ->get(route('attendances.bulk'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.attendances.bulk');
    }

    public function test_bulk_store_creates_multiple_attendances()
    {
        $child1 = Children::factory()->create();
        $child2 = Children::factory()->create();
        $class = Classes::factory()->create();

        $data = [
            'date' => now()->format('Y-m-d'),
            'class_id' => $class->id,
            'attendances' => [
                $child1->id => ['status' => 'present'],
                $child2->id => ['status' => 'absent'],
            ],
        ];

        $response = $this->actingAs($this->user)
            ->post(route('attendances.bulk.store'), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('attendances', [
            'child_id' => $child1->id,
            'status' => 'present',
        ]);
        $this->assertDatabaseHas('attendances', [
            'child_id' => $child2->id,
            'status' => 'absent',
        ]);
    }

    public function test_unauthorized_user_cannot_access_attendances_routes()
    {
        $userWithoutPermission = User::factory()->create();
        
        $response = $this->actingAs($userWithoutPermission)
            ->get(route('attendances.index'));

        $response->assertForbidden();
    }

    public function test_export_functionality_pdf()
    {
        Attendance::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('attendances.export.pdf'));

        $response->assertStatus(200);
    }

    public function test_export_functionality_excel()
    {
        Attendance::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('attendances.export.excel'));

        $response->assertStatus(200);
    }

    public function test_pagination_works()
    {
        Attendance::factory()->count(30)->create();

        $response = $this->actingAs($this->user)
            ->get(route('attendances.index'));

        $response->assertStatus(200);
    }
}
