<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Product;
use App\ProductCat;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Exports\PersonExport;
use Excel;

class PersonController extends Controller
{
    //
    public function personShow(){

        // $person=new Person;
        // var_dump($person->all());
        // die();

        $person=DB::table('person')
                        ->join('product_cat', 'person.id_area', '=', 'product_cat.id')
                        ->join('products', 'person.id_region', '=', 'products.id')
                        ->select('person.id_person', 'person.name_person', 'product_cat.product_cat_name','products.productName')
                        ->get();
        // $person=Person::all();

       
        return view('personlist',compact('person'));
        
    }

    public function downloadPDF(){
        $person=DB::table('person')
                        ->join('product_cat', 'person.id_area', '=', 'product_cat.id')
                        ->join('products', 'person.id_region', '=', 'products.id')
                        ->select('person.id_person', 'person.name_person', 'product_cat.product_cat_name','products.productName')
                        ->get();
        $pdf = PDF::loadView('personsPDF',compact('person'));
        return $pdf->download('persons.pdf');
    }

    public function downloadEXCEL(){
        return Excel::download(new PersonExport,'personlist.xlsx');
    }

    public function download_CSV(){
        return Excel::download(new PersonExport,'personlistcsv.csv');
    }

    public function personUpdateSubmit($id_person,Request $request){
            $person=Person::find($id_person);
            $person->name_person=$request->input('name_person');
            $person->id_area=$request['area'];
            $person->id_region=$request['region'];
            $person->save();
            return redirect()->route('personlist');
    }

    public function personAdd(Request $request)
    {
        $prod=ProductCat::all();
        return view('personAddView',compact('prod'));
    }

    public function personAddNew(Request $request)
    {
        $name= $request->input('name_person');
        $region= $request['id_region'];
        $area= $request['id_area'];
        DB::insert('EXEC insert_person ?, ?, ?',array($name,$region,$area));
        return redirect()->route('personlist');
    }

    public function personDelete($id_person){
        $person = DB::delete('EXEC delete_person ?',array($id_person));
        return redirect()->route('personlist');
    }
    // public function personUpdate($id_person){
    //     // var_dump($id_person);
    //     die();
    //     $person=DB::table('person')
    //     ->join('product_cat', 'person.id_area', '=', 'product_cat.id')
    //     ->join('products', 'person.id_region', '=', 'products.id')
    //     ->select('person.id_person','person.id_area','person.id_region', 'person.name_person', 'product_cat.product_cat_name','products.productName')
    //     ->where('person.id_person','=',$id_person)
    //     ->get();
    //     //$result=$person->all();
    //         //var_dump($person);
    //      //var_dump($person->find($id_person));
    //     //die();
    //     return view('updateperson',compact('person'));
    //  }
}
