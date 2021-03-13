<?php

namespace App\Exports;

use App\Person;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PersonExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            'Id',
            'Name',
            'Area',
            'Region'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Person::all();
        return collect(Person::getPerson());
    }
}
