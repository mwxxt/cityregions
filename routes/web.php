<?php


use Illuminate\Http\Request;
use App\ProductCat;
use App\Product;
use App\Person;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/prodview','TestController@prodfunct')->name('prodview');

Route::get('/findProductName','TestController@findProductName');

Route::get('/personview/{id_person}/update', function($id_person,Request $request){
    $person=DB::table('person')
        ->join('product_cat', 'person.id_area', '=', 'product_cat.id')
        ->join('products', 'person.id_region', '=', 'products.id')
        ->select('person.id_person','person.id_area','person.id_region', 'person.name_person', 'product_cat.product_cat_name','products.productName')
        ->where('person.id_person','=',$id_person)
        ->get();
    
     $prod=ProductCat::all(); 
     $produ=Product::all();
    //  $data=Product::select('productName','id')->where('prod_cat_id',$request->id)->take(100)->get();
    // $json=response()->json($data);
     //var_dump($person[0]);
     //die();
        return view('updateperson',compact('person','prod','produ'))->with('data',$person[0]);
})->name('person-update');
Route::post('/personview/{id_person}/update', 'PersonController@personUpdateSubmit')->name('person-update-submit');
//------------------------------ Person(Жители) -------------------------------------
Route::get('/personview','PersonController@personShow')->name('personlist');
Route::get('/personAddView','PersonController@personAdd')->name('personadd');
Route::post('/personAddSubmit','PersonController@personAddNew')->name('personAddNew');
Route::get('/personDelete/{ID}','PersonController@personDelete')->name('personDelete');
//------------------------------ ProductCat(Регионы) -------------------------------------
Route::get('/productcat','ProductCatController@productcatShow')->name('productcat');
//------------------------------ Product(Районы) -------------------------------------
Route::get('/product','ProductController@productShow')->name('product');
//------------------------------ PDF and EXCEL -------------------------------------
Route::get('/download-pdf','PersonController@downloadPDF')->name('personAddSubmit');
Route::get('/download-excel','PersonController@downloadEXCEL');
Route::get('/download-csv','PersonController@download_CSV');