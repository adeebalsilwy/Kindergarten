<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\FinancialReport;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FinancialReportModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_financial_report_model_database_structure()
    {
        $report = FinancialReport::factory()->create();

        $this->assertDatabaseHas('financial_reports', [
            'id' => $report->id,
            'name' => $report->name,
        ]);
    }

    public function test_financial_report_model_fillable_attributes()
    {
        $fillable = [
            'name',
            'report_type',
            'generated_by',
            'period_start',
            'period_end',
            'data',
        ];

        $model = new FinancialReport();
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

    public function test_financial_report_model_casts()
    {
        $casts = [
            'data' => 'array',
            'period_start' => 'datetime',
            'period_end' => 'datetime',
            'deleted_at' => 'datetime',
        ];

        $model = new FinancialReport();
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

    public function test_financial_report_model_appends()
    {
        $appends = [
            'slug',
        ];

        $model = new FinancialReport();
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

    public function test_financial_report_belongs_to_generator_relationship()
    {
        $user = User::factory()->create();
        $report = FinancialReport::factory()->create(['generated_by' => $user->id]);

        $relation = $report->generatedBy();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('generated_by', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_soft_deletes_trait()
    {
        $report = FinancialReport::factory()->create();
        $report->delete();

        $this->assertNotNull($report->deleted_at);
        $this->assertCount(0, FinancialReport::all());
        $this->assertCount(1, FinancialReport::withTrashed()->get());
    }

    public function test_title_field()
    {
        $report = FinancialReport::factory()->create([
            'name' => 'Monthly Financial Report'
        ]);

        $this->assertEquals('Monthly Financial Report', $report->name);
    }

    public function test_description_field()
    {
        $report = FinancialReport::factory()->create([
            'name' => 'Quarterly Financial Summary'
        ]);

        $this->assertEquals('Quarterly Financial Summary', $report->name);
    }

    public function test_period_fields()
    {
        $report = FinancialReport::factory()->create([
            'period_start' => '2023-01-01',
            'period_end' => '2023-03-31'
        ]);

        $this->assertInstanceOf('Carbon\Carbon', $report->period_start);
        $this->assertInstanceOf('Carbon\Carbon', $report->period_end);
        $this->assertEquals('2023-01-01', $report->period_start->format('Y-m-d'));
        $this->assertEquals('2023-03-31', $report->period_end->format('Y-m-d'));
    }

    public function test_financial_amounts_fields()
    {
        $data = [
            'total_revenue' => 10000.00,
            'total_expenses' => 7500.00,
            'net_income' => 2500.00
        ];
        
        $report = FinancialReport::factory()->create([
            'data' => $data
        ]);

        $this->assertEquals($data, $report->data);
        $this->assertIsArray($report->data);
    }

    public function test_data_field_as_array()
    {
        $data = ['income' => 5000, 'expenses' => 3000];
        $report = FinancialReport::factory()->create([
            'data' => $data
        ]);

        $this->assertEquals($data, $report->data);
        $this->assertIsArray($report->data);
    }
}