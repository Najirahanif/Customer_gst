<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class CustomerExports implements FromCollection, WithHeadings
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
                'Email' => $item->email,
                'Phone Number' => $item->phonenumber,
                'Premium Amount' => $item->premiumamount,
                'GST %' => $item->gstpercent,
                'GST Amount' => $item->gstamount,
                'Total Premium Amount' => $item->totalpremiumcollected,
                
            ];
        });
    }

    public function headings(): array
    {
        // Define headers for the selected fields
        return [
            '#',
            'Name',
            'Email',
            'Phone Number',
            'Premium Amount',
            'GST %',
            'GST Amount',
            'Total Premium Amount'
        ];
    }
}
