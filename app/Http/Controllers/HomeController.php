<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(auth()->user()->role === 'user'){
        return redirect(route('user-cart'));
      }else if(auth()->user()->role == 'producer'){
        return redirect(url('/producer/products'));
      }else{
        return redirect(route('admin-orders'));
      }

//        return view('home');
    }
}
