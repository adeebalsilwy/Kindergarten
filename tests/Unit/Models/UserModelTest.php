<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\AccountingEntry;
use App\Models\Expense;
use App\Models\FinancialReport;
use App\Models\Activity;
use App\Models\Event;
use App\Models\Classes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_model_database_structure()
    {
        $user = User::factory()->create();

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }

    public function test_user_model_fillable_attributes()
    {
        $fillable = [
            'name',
            'email',
            'email_verified_at',
            'password',
            'is_active',
            'token',
            'user_id',
            'ip_address',
            'user_agent',
            'payload',
            'last_activity',
        ];

        $this->assertEquals($fillable, (new User())->getFillable());
    }

    public function test_user_model_casts()
    {
        $casts = [
            'email_verified_at' => 'datetime',
            'is_active' => 'boolean',
            'last_activity' => 'integer',
            'password' => 'hashed',
            'deleted_at' => 'datetime',
        ];

        $modelCasts = (new User())->getCasts();
        
        // Check that all expected casts are present
        foreach ($casts as $key => $value) {
            $this->assertArrayHasKey($key, $modelCasts);
            $this->assertEquals($value, $modelCasts[$key]);
        }
    }

    public function test_user_model_hidden_attributes()
    {
        $hidden = [
            'password',
            'token',
        ];

        $this->assertEquals($hidden, (new User())->getHidden());
    }

    public function test_user_model_appends()
    {
        $appends = [
            'slug',
        ];

        $this->assertEquals($appends, (new User())->getAppends());
    }

    public function test_user_has_many_accounting_entries_relationship()
    {
        $user = User::factory()->create();
        $accountingEntry = AccountingEntry::factory()->create(['created_by' => $user->id]);

        $relation = $user->accountingEntries();
        
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('created_by', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_user_has_many_expenses_created_relationship()
    {
        $user = User::factory()->create();
        $expense = Expense::factory()->create(['created_by' => $user->id]);

        $relation = $user->expensesCreated();
        
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('created_by', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_user_has_many_expenses_assigned_relationship()
    {
        $user = User::factory()->create();
        $expense = Expense::factory()->create(['assigned_to' => $user->id]);

        $relation = $user->expensesAssigned();
        
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('assigned_to', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_user_has_many_financial_reports_relationship()
    {
        $user = User::factory()->create();
        $financialReport = FinancialReport::factory()->create(['generated_by' => $user->id]);

        $relation = $user->financialReports();
        
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('generated_by', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_user_has_many_created_activities_relationship()
    {
        $user = User::factory()->create();
        $activity = Activity::factory()->create(['teacher_id' => $user->id]);

        $relation = $user->createdActivities();
        
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('teacher_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_user_has_many_created_events_relationship()
    {
        $user = User::factory()->create();
        $event = Event::factory()->create(['teacher_id' => $user->id]);

        $relation = $user->createdEvents();
        
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('teacher_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_user_has_many_created_classes_relationship()
    {
        $user = User::factory()->create();
        $class = Classes::factory()->create(['teacher_id' => $user->id]);

        $relation = $user->createdClasses();
        
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('teacher_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_slug_accessor()
    {
        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);

        $this->assertEquals('john-doe', $user->slug);
    }

    public function test_has_roles_trait()
    {
        $user = User::factory()->create();
        
        // Test that the user can have roles
        $this->assertTrue(method_exists($user, 'assignRole'));
        $this->assertTrue(method_exists($user, 'hasRole'));
        $this->assertTrue(method_exists($user, 'roles'));
    }

    public function test_soft_deletes_trait()
    {
        $user = User::factory()->create();
        $user->delete();

        $this->assertNotNull($user->deleted_at);
        $this->assertCount(0, User::all());
        $this->assertCount(1, User::withTrashed()->get());
    }

    public function test_email_verification_requirement()
    {
        $user = new User();
        $this->assertTrue(in_array('Illuminate\Contracts\Auth\MustVerifyEmail', class_implements($user)));
    }

    public function test_password_hashing()
    {
        $user = User::factory()->create([
            'password' => 'plaintext_password'
        ]);

        // The password should be hashed, not stored as plain text
        $this->assertNotEquals('plaintext_password', $user->password);
        $this->assertTrue(password_verify('plaintext_password', $user->password));
    }

    public function test_dates_attribute()
    {
        $dates = ['email_verified_at'];
        $user = new User();
        
        // Note: In newer Laravel versions, dates are handled through casts
        $casts = $user->getCasts();
        $this->assertArrayHasKey('email_verified_at', $casts);
        $this->assertEquals('datetime', $casts['email_verified_at']);
    }
}