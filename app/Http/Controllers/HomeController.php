<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //  $this->middleware('rolecheck');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $user=User::all();
        $category=Category::all();
         return view('home',compact('category','user'));
   
    
   

}
// public function logout(){
//     Auth::logout();

//     return redirect()->route('login');
// }
}