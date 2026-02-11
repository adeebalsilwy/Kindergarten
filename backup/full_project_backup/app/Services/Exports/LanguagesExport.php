<?php

namespace App\Services\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LanguagesExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping, WithStyles
{
    protected $languages;

    public function __construct($languages)
    {
        $this->languages = $languages;
    }

    public function collection()
    {
        return $this->languages;
    }

    public function headings(): array
    {
        return [
            __('global.id'),
            __('languages.fields.name'),
            __('languages.fields.code'),
            __('languages.fields.is_rtl'),
            __('languages.fields.is_active'),
            __('global.created_at'),
            __('global.updated_at'),
        ];
    }

    public function map($language): array
    {
        return [
            $language->id,
            $language->name,
            $language->code,
            $language->is_rtl ? __('global.yes') : __('global.no'),
            $language->is_active ? __('global.yes') : __('global.no'),
            $language->created_at->format('Y-m-d H:i:s'),
            $language->updated_at->format('Y-m-d H:i:s'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true]],
        ];
    }
}
