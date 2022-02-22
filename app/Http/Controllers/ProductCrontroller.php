<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Str;


class ProductCrontroller extends Controller
{
    public function create(){
        $all_categories=Category::all();
        $all_subcategory=Subcategory::all();
return view('product.create',compact('all_categories','all_subcategory'));

    }


    public function store(Request $request){

        // print_r($request->all());
    //  return $request->file('product_image');
    $request->validate([
        'product_name'=>'required',
        'old_price'=>'required|numeric',
       

    ]);
 
    $product_slug= Str::slug( Str::lower($request->product_name));
    $sku_number=Str::lower(Str::substr($request->product_name,0,3)."-".Str::random());
    $product_id=Product::insertGetId([
        'product_name'=>$request->product_name,
        'old_price'=>$request->old_price,
        'new_price'=>$request->new_price,
        'product_slug'=>$product_slug,
        'sku_number'=>$sku_number,
        'category_id'=>$request->category_id,
        'sub_category_id'=>$request->sub_category_id,
        'short_description'=>$request->short_description,
        'created_at'=>Carbon::now(),


    ]);


    if($request->hasFile('product_image')){
        $new_image_ext=$request->file('product_image')->getClientOriginalExtension();
        $image_name=$product_id.".".$new_image_ext;
        Image::make($request->file('product_image'))->resize(270,310)->save(base_path('public/uploads/product_image/'.$image_name));


        Product::find($product_id)->update([
            'product_image'=>$image_name,

        ]);

    }
    return back();
    }

    // ==========================view==================
    public function index(){
        $all_product=Product::all();
        return view('product.index',compact('all_product'));
    }
}