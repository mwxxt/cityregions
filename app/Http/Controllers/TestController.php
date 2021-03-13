<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCat;
use App\Product;
class TestController extends Controller
{
    //
    public function prodfunct(){

		$prod=ProductCat::all();//get data from table
		return view('productlist',compact('prod'));//sent data to view

    }
    public function findProductName(Request $request){

		
	    //if our chosen id and products table prod_cat_id col match the get first 100 data 

        //$request->id here is the id of our chosen option id
        $data=Product::select('productName','id')->where('prod_cat_id',$request->id)->take(100)->get();
        return response()->json($data);//then sent this data to ajax success
	}
}
