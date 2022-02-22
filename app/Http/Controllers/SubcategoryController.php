<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Laravel\Ui\Presets\React;

class SubcategoryController extends Controller
{
    public  function __construct(){
        $this->middleware('auth');
  }

  public function create(){
      $all_category=Category::all();
      return view('subcategory.create',compact('all_category'));
  }

  public function store(Request $request){
    $request->validate([
      'category_id'=>'required',
      'subcategory_name'=>'required',
    ]);

    Subcategory::insert([
        'category_id'=>$request->category_id,
        'subcategory_name'=>$request->subcategory_name,
        'created_at'=>Carbon::now(),

    ]);
    return redirect()->back()->with('Insdone','subcategory added successfully');
  }

  public function index(){
      $all_subcategory=Subcategory::all();
      return view('subcategory.index',compact('all_subcategory'));
  }
  public function delete($id){
    Subcategory::findOrFail($id)->delete();
    return back();
  }
  
  public function edit($id){
$subcategories=Subcategory::findOrFail($id);
$categories=Category::latest()->get();
return view('subcategory.edit',compact('subcategories','categories'));
}


public function update(Request $request,$id){
    
Subcategory::findOrFail($id)->update([
    'category_id'=>$request->category_id,
        'subcategory_name'=>$request->subcategory_name,
        'updated_at'=>Carbon::now(),
]);
return redirect()->route('subcategory.index')->with('Insdone', 'Subcategory Updated successfully !1');
}

}