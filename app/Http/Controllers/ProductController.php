<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\ProductExport;
use App\Product;

class ProductController extends Controller
{
    public function productShow(){
        $prods=DB::table('products')
                        ->join('product_cat','products.prod_cat_id','=','product_cat.id')
                        ->select('products.id','products.productName','product_cat.product_cat_name')
                        ->get();    
        return view('product',compact('prods'));
    }
}
