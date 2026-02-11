<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\AccountingEntry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccountingEntryModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_accounting_entry_model_database_structure()
    {
        $entry = AccountingEntry::factory()->create();

        $this->assertDatabaseHas('accounting_entries', [
            'id' => $entry->id,
            'description' => $entry->description,
            'debit' => $entry->debit,
            'credit' => $entry->credit,
        ]);
    }

    public function test_accounting_entry_model_fillable_attributes()
    {
        $fillable = [
            'description',
            'debit',
            'credit',
            'entry_date',
            'reference',
            'account_type',
        ];

        $this->assertEquals($fillable, (new AccountingEntry())->getFillable());
    }

    public function test_accounting_entry_model_casts()
    {
        $casts = [
            'debit' => 'decimal:2',
            'credit' => 'decimal:2',
            'entry_date' => 'datetime',
            'deleted_at' => 'datetime',
        ];

        $model = new AccountingEntry();
        $modelCasts = $model->getCasts();
        
        foreach ($casts as $key => $value) {
            $this->assertArrayHasKey($key, $modelCasts);
            $this->assertEquals($value, $modelCasts[$key]);
        }
    }

    public function test_accounting_entry_model_appends()
    {
        $appends = [];

        $this->assertEquals($appends, (new AccountingEntry())->getAppends());
    }

    public function test_soft_deletes_trait()
    {
        $entry = AccountingEntry::factory()->create();
        $entry->delete();

        $this->assertNotNull($entry->deleted_at);
        $this->assertCount(0, AccountingEntry::all());
        $this->assertCount(1, AccountingEntry::withTrashed()->get());
    }

    public function test_description_field()
    {
        $entry = AccountingEntry::factory()->create([
            'description' => 'Payment received for tuition'
        ]);

        $this->assertEquals('Payment received for tuition', $entry->description);
    }

    public function test_debit_credit_fields()
    {
        $entry = AccountingEntry::factory()->create([
            'debit' => 1000.00,
            'credit' => 0.00
        ]);

        $this->assertEquals(1000.00, $entry->debit);
        $this->assertEquals(0.00, $entry->credit);
        
        $this->assertIsNumeric($entry->debit);
        $this->assertIsNumeric($entry->credit);
    }

    public function test_entry_date_field()
    {
        $entry = AccountingEntry::factory()->create([
            'entry_date' => '2023-12-31'
        ]);

        $this->assertInstanceOf('Carbon\Carbon', $entry->entry_date);
        $this->assertEquals('2023-12-31', $entry->entry_date->format('Y-m-d'));
    }

    public function test_reference_field()
    {
        $entry = AccountingEntry::factory()->create([
            'reference' => 'JE-2023-001'
        ]);

        $this->assertEquals('JE-2023-001', $entry->reference);
    }

    public function test_account_type_field()
    {
        $entry = AccountingEntry::factory()->create([
            'account_type' => 'Cash'
        ]);

        $this->assertEquals('Cash', $entry->account_type);
    }

    public function test_decimal_casting()
    {
        $entry = AccountingEntry::factory()->create([
            'debit' => '750.50',
            'credit' => '250.25'
        ]);

        // Should be cast to decimal
        $this->assertEquals(750.50, $entry->debit);
        $this->assertEquals(250.25, $entry->credit);
        $this->assertIsNumeric($entry->debit);
        $this->assertIsNumeric($entry->credit);
    }
}