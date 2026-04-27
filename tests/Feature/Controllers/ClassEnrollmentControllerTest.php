<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\ClassEnrollment;
use App\Models\Classes;
use App\Models\Children;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClassEnrollmentControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->user->assignRole('Administrator');
    }

    public function test_index_returns_view_with_class_enrollments()
    {
        $response = $this->actingAs($this->user)
            ->get(route('class-enrollments.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.class-enrollments.index');
    }

    public function test_index_returns_paginated_class_enrollments()
    {
        ClassEnrollment::factory()->count(20)->create();

        $response = $this->actingAs($this->user)
            ->get(route('class-enrollments.index'));

        $response->assertStatus(200);
        $response->assertViewHas('classEnrollments');
    }

    public function test_create_returns_view()
    {
        $response = $this->actingAs($this->user)
            ->get(route('class-enrollments.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.class-enrollments.create');
    }

    public function test_store_creates_new_class_enrollment()
    {
        $class = Classes::factory()->create();
        $child = Children::factory()->create();

        $data = [
            'class_id' => $class->id,
            'child_id' => $child->id,
            'enrollment_date' => now()->format('Y-m-d'),
            'status' => 'active',
            'reason' => 'New enrollment',
        ];

        $response = $this->actingAs($this->user)
            ->post(route('class-enrollments.store'), $data);

        $response->assertRedirect(route('class-enrollments.index'));
        $this->assertDatabaseHas('class_enrollments', [
            'class_id' => $class->id,
            'child_id' => $child->id,
            'status' => 'active',
        ]);
    }

    public function test_show_returns_view_with_class_enrollment()
    {
        $enrollment = ClassEnrollment::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('class-enrollments.show', $enrollment->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.class-enrollments.show');
    }

    public function test_edit_returns_view_with_class_enrollment()
    {
        $enrollment = ClassEnrollment::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('class-enrollments.edit', $enrollment->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.class-enrollments.edit');
    }

    public function test_update_modifies_class_enrollment()
    {
        $enrollment = ClassEnrollment::factory()->create();
        $class = Classes::factory()->create();
        $child = Children::factory()->create();

        $data = [
            'class_id' => $class->id,
            'child_id' => $child->id,
            'enrollment_date' => now()->format('Y-m-d'),
            'status' => 'transferred',
            'reason' => 'Class transfer',
        ];

        $response = $this->actingAs($this->user)
            ->put(route('class-enrollments.update', $enrollment->id), $data);

        $response->assertRedirect(route('class-enrollments.index'));
        $this->assertDatabaseHas('class_enrollments', [
            'id' => $enrollment->id,
            'status' => 'transferred',
        ]);
    }

    public function test_destroy_removes_class_enrollment()
    {
        $enrollment = ClassEnrollment::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('class-enrollments.destroy', $enrollment->id));

        $response->assertRedirect(route('class-enrollments.index'));
        $this->assertSoftDeleted('class_enrollments', [
            'id' => $enrollment->id,
        ]);
    }

    public function test_transfer_enrollment()
    {
        $enrollment = ClassEnrollment::factory()->create(['status' => 'active']);
        $newClass = Classes::factory()->create();

        $response = $this->actingAs($this->user)
            ->post(route('class-enrollments.transfer', $enrollment->id), [
                'class_id' => $newClass->id,
                'reason' => 'Moving to new class',
            ]);

        $response->assertRedirect(route('class-enrollments.index'));
        $this->assertDatabaseHas('class_enrollments', [
            'id' => $enrollment->id,
            'status' => 'transferred',
        ]);
    }

    public function test_dual_enroll()
    {
        $child = Children::factory()->create();
        $class1 = Classes::factory()->create();
        $class2 = Classes::factory()->create();

        $response = $this->actingAs($this->user)
            ->post(route('class-enrollments.dual-enroll'), [
                'child_id' => $child->id,
                'primary_class_id' => $class1->id,
                'secondary_class_id' => $class2->id,
            ]);

        $response->assertRedirect(route('class-enrollments.index'));
        $this->assertDatabaseHas('class_enrollments', [
            'child_id' => $child->id,
            'class_id' => $class1->id,
        ]);
        $this->assertDatabaseHas('class_enrollments', [
            'child_id' => $child->id,
            'class_id' => $class2->id,
        ]);
    }

    public function test_bulk_update()
    {
        $enrollment1 = ClassEnrollment::factory()->create();
        $enrollment2 = ClassEnrollment::factory()->create();

        $response = $this->actingAs($this->user)
            ->post(route('class-enrollments.bulk-update'), [
                'ids' => [$enrollment1->id, $enrollment2->id],
                'status' => 'completed',
            ]);

        $response->assertRedirect(route('class-enrollments.index'));
    }

    public function test_unauthorized_user_cannot_access_class_enrollments_routes()
    {
        $userWithoutPermission = User::factory()->create();
        
        $response = $this->actingAs($userWithoutPermission)
            ->get(route('class-enrollments.index'));

        $response->assertForbidden();
    }

    public function test_pagination_works()
    {
        ClassEnrollment::factory()->count(30)->create();

        $response = $this->actingAs($this->user)
            ->get(route('class-enrollments.index'));

        $response->assertStatus(200);
    }
}
