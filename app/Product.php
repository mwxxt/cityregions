<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table='products';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public static function getProduct()
    {
        $records = DB::table('products')->join('product_cat', 'products.id_area', '=', 'product_cat.id')
        ->select('products.productName','product_cat.product_cat_name')
        ->get()->toArray();
        return $records;
    }
}
