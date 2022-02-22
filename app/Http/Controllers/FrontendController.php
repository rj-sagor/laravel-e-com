<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
  public function index(){
      $all_products=Product::all();
      return view('welcome',compact('all_products'));
  }
}
