<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Person extends Model
{
    protected $table='person';
    protected $primaryKey = 'id_person';
    public $timestamps = false;

    public static function getPerson()
    {
        $records = DB::table('person')->join('product_cat', 'person.id_area', '=', 'product_cat.id')
        ->join('products', 'person.id_region', '=', 'products.id')
        ->select('person.id_person', 'person.name_person', 'product_cat.product_cat_name','products.productName')
        ->get()->toArray();
        return $records;
    }
}
