<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class DesignationExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        $counter = 1;
        // Map the data to contain only the selected fields
        return $this->data->map(function ($item) use (&$counter) {
            return [
                '#' => $counter++,
                'Name' => $item->name,
                'Status' => ucfirst($item->status),
            ];
        });
    }

    public function headings(): array
    {
        // Define headers for the selected fields
        return [
            '#',
            'Name',
            'Status'
        ];
    }
}
