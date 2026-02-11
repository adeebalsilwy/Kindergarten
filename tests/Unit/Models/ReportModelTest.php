<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Report;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReportModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_report_model_database_structure()
    {
        $report = Report::factory()->create();

        $this->assertDatabaseHas('reports', [
            'id' => $report->id,
            'title' => $report->title,
            'type' => $report->type,
        ]);
    }

    public function test_report_model_fillable_attributes()
    {
        $fillable = [
            'title',
            'description',
            'type',
            'content',
            'generated_by',
            'status',
            'data',
            'format',
            'period_start',
            'period_end',
        ];

        $this->assertEquals($fillable, (new Report())->getFillable());
    }

    public function test_report_model_casts()
    {
        $casts = [
            'period_start' => 'date',
            'period_end' => 'date',
            'data' => 'array',
        ];

        $this->assertEquals($casts, (new Report())->getCasts());
    }

    public function test_report_model_appends()
    {
        $appends = [
            'formatted_period',
            'is_complete',
            'report_summary',
        ];

        $this->assertEquals($appends, (new Report())->getAppends());
    }

    public function test_report_belongs_to_generator_relationship()
    {
        $report = Report::factory()->create();

        $relation = $report->generator();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('generated_by', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_formatted_period_accessor()
    {
        $report = Report::factory()->create([
            'period_start' => '2023-01-01',
            'period_end' => '2023-12-31'
        ]);

        $this->assertEquals('Jan 1, 2023 - Dec 31, 2023', $report->formatted_period);
    }

    public function test_is_complete_accessor()
    {
        $completeReport = Report::factory()->create([
            'status' => 'completed'
        ]);

        $draftReport = Report::factory()->create([
            'status' => 'draft'
        ]);

        $pendingReport = Report::factory()->create([
            'status' => 'pending'
        ]);

        $this->assertTrue($completeReport->is_complete);
        $this->assertFalse($draftReport->is_complete);
        $this->assertFalse($pendingReport->is_complete);
    }

    public function test_report_summary_accessor()
    {
        $report = Report::factory()->create([
            'title' => 'Monthly Attendance Report',
            'type' => 'attendance',
            'content' => 'This report shows attendance trends for the month.'
        ]);

        // Summary might be a shortened version of the content or title
        $this->assertIsString($report->report_summary);
    }

    public function test_soft_deletes_trait()
    {
        $report = Report::factory()->create();
        $report->delete();

        $this->assertNotNull($report->deleted_at);
        $this->assertCount(0, Report::all());
        $this->assertCount(1, Report::withTrashed()->get());
    }

    public function test_title_field()
    {
        $report = Report::factory()->create([
            'title' => 'Quarterly Financial Summary'
        ]);

        $this->assertEquals('Quarterly Financial Summary', $report->title);
    }

    public function test_description_field()
    {
        $report = Report::factory()->create([
            'description' => 'Comprehensive analysis of quarterly financial performance'
        ]);

        $this->assertEquals('Comprehensive analysis of quarterly financial performance', $report->description);
    }

    public function test_type_field()
    {
        $report = Report::factory()->create([
            'type' => 'financial'
        ]);

        $this->assertEquals('financial', $report->type);
    }

    public function test_content_field()
    {
        $report = Report::factory()->create([
            'content' => 'This report analyzes the financial performance for Q1 2023...'
        ]);

        $this->assertEquals('This report analyzes the financial performance for Q1 2023...', $report->content);
    }

    public function test_status_field()
    {
        $report = Report::factory()->create([
            'status' => 'published'
        ]);

        $this->assertEquals('published', $report->status);
    }

    public function test_format_field()
    {
        $report = Report::factory()->create([
            'format' => 'pdf'
        ]);

        $this->assertEquals('pdf', $report->format);
    }

    public function test_period_start_field()
    {
        $report = Report::factory()->create([
            'period_start' => '2023-01-01'
        ]);

        $this->assertInstanceOf('Carbon\Carbon', $report->period_start);
        $this->assertEquals('2023-01-01', $report->period_start->format('Y-m-d'));
    }

    public function test_period_end_field()
    {
        $report = Report::factory()->create([
            'period_end' => '2023-12-31'
        ]);

        $this->assertInstanceOf('Carbon\Carbon', $report->period_end);
        $this->assertEquals('2023-12-31', $report->period_end->format('Y-m-d'));
    }

    public function test_data_field_as_array()
    {
        $data = [
            'summary' => [
                'total_records' => 150,
                'generated_at' => '2023-06-15'
            ],
            'details' => [
                'section1' => 'value1',
                'section2' => 'value2'
            ]
        ];

        $report = Report::factory()->create([
            'data' => $data
        ]);

        $this->assertIsArray($report->data);
        $this->assertEquals($data, $report->data);
        $this->assertEquals(150, $report->data['summary']['total_records']);
    }

    public function test_array_casting()
    {
        $data = ['key1' => 'value1', 'key2' => 'value2'];
        
        $report = Report::factory()->create([
            'data' => json_encode($data)
        ]);

        // Should be cast to array
        $this->assertIsArray($report->data);
        $this->assertEquals($data, $report->data);
    }

    public function test_date_casting()
    {
        $report = Report::factory()->create([
            'period_start' => '2023-06-15',
            'period_end' => '2023-06-30'
        ]);

        // Should be cast to Carbon instances
        $this->assertInstanceOf('Carbon\Carbon', $report->period_start);
        $this->assertInstanceOf('Carbon\Carbon', $report->period_end);
        $this->assertEquals('2023-06-15', $report->period_start->format('Y-m-d'));
        $this->assertEquals('2023-06-30', $report->period_end->format('Y-m-d'));
    }
}