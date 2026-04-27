<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Language;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LanguageControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->user->assignRole('Administrator');
    }

    public function test_index_returns_view_with_languages()
    {
        $response = $this->actingAs($this->user)
            ->get(route('languages.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.languages.index');
    }

    public function test_create_returns_view()
    {
        $response = $this->actingAs($this->user)
            ->get(route('languages.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.languages.create');
    }

    public function test_store_creates_new_language()
    {
        $data = [
            'name' => 'Arabic',
            'code' => 'ar',
            'locale' => 'ar_SA',
            'direction' => 'rtl',
            'is_active' => true,
        ];

        $response = $this->actingAs($this->user)
            ->post(route('languages.store'), $data);

        $response->assertRedirect(route('languages.index'));
        $this->assertDatabaseHas('languages', [
            'name' => 'Arabic',
            'code' => 'ar',
        ]);
    }

    public function test_show_returns_view_with_language()
    {
        $language = Language::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('languages.show', $language->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.languages.show');
    }

    public function test_edit_returns_view_with_language()
    {
        $language = Language::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('languages.edit', $language->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.languages.edit');
    }

    public function test_update_modifies_language()
    {
        $language = Language::factory()->create();

        $data = [
            'name' => 'Updated Language',
            'code' => 'updated',
            'locale' => 'updated_locale',
            'direction' => 'ltr',
            'is_active' => false,
        ];

        $response = $this->actingAs($this->user)
            ->put(route('languages.update', $language->id), $data);

        $response->assertRedirect(route('languages.index'));
        $this->assertDatabaseHas('languages', [
            'id' => $language->id,
            'name' => 'Updated Language',
        ]);
    }

    public function test_destroy_removes_language()
    {
        $language = Language::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('languages.destroy', $language->id));

        $response->assertRedirect(route('languages.index'));
        $this->assertSoftDeleted('languages', [
            'id' => $language->id,
        ]);
    }

    public function test_unauthorized_user_cannot_access_languages_routes()
    {
        $userWithoutPermission = User::factory()->create();
        
        $response = $this->actingAs($userWithoutPermission)
            ->get(route('languages.index'));

        $response->assertForbidden();
    }

    public function test_export_functionality_pdf()
    {
        Language::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('languages.export.pdf'));

        $response->assertStatus(200);
    }

    public function test_export_functionality_excel()
    {
        Language::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('languages.export.excel'));

        $response->assertStatus(200);
    }
}
