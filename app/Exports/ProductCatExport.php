<?php

namespace App\Exports;

use App\ProductCat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductCatExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            'Id',
            'Region'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Person::all();
        return collect(ProductCat::getProductCat());
    }
}