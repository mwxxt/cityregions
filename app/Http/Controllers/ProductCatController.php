<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\ProductCatExport;
use App\ProductCat;

class ProductCatController extends Controller
{
    public function productcatShow(){
        $product_cat=DB::table('product_cat')
                        ->select('id','product_cat_name')
                        ->get();    
        return view('productcat',compact('product_cat'));
    }
}
