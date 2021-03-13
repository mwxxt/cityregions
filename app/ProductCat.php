<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductCat extends Model
{
    //
    protected $table='product_cat';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public static function getProductCat()
    {
        $records = DB::table('product_cat')->select('id','product_cat_name')->get()->toArray();
        return $records;
    }
}
