<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productcontroller extends Controller
{
    public function create(){
        $brands=DB::table('brands')->select('name_en','id')->get();
        $subcategories=DB::table('subcategories')->select('name_en','id')->get();
        return view('admins.products.create',compact('brands','subcategories'));
    }
    public function index(){


        $allproducts = DB::table('products')
        ->leftJoin('brands', 'brands.id', '=', 'products.brand_id')
        ->leftJoin('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
        ->select('products.*', 'brands.name_en AS brand_name_en', 'subcategories.name_en AS subcategory_name_en' )
        ->get();
    return view('admins.products.index',compact('allproducts'));



    }
    public function edit($id){

        $brands=DB::table('brands')->select('name_en','id')->get();
        $subcategories=DB::table('subcategories')->select('name_en','id')->get();
        $product=DB::table('products')->select()->where('id','=',$id)->first();

        return view('admins.products.edit',compact('brands','subcategories','product'));
    }

    public function store(Request $request){
$request->validate([
    'name_ar'=>['required','string','min:2','max:512'],
    'name_en'=>['required','string','min:2','max:512'],
    'details_ar'=>['required','string'],
    'details_ar'=>['required','string'],
    'code'=>['required','int','unique:products','digits:6'],
    'price'=>['required','numeric','min:1','max:9999999,99'],
    'status'=>['nullable','int','in:0,1'],
    'subcategory_id'=>['required','int','exists:subcategories,id'],
    'image'=>['required','mimes:png,jpg','max:1000']

]);
$fileName = $request->file('image')->hashName(). '.'. $request->file('image')->extension();
$request->file('image')->move(public_path('dist\img\products'),$fileName);
$product_data = $request->except('_token','image');
$product_data['image']=$fileName;
DB::table('products')->insert($product_data);
return redirect()->route('dashboard.products.index')->with('success','data created successfuly');
    }
    public function update(){

    }


}
