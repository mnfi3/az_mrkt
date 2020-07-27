<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Util\Pdate;
use App\Http\Controllers\Util\Pnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProducerController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('producer');
  }


  public function products(){
    $user = Auth::user();
    $products = $user->producerBooks;
    return view('producer.products', compact('products'));
  }

  public function sold(){
    $producer = Auth::user();
    $sells = $producer->producerSells()->orderBy('id', 'desc')->get();
    return view('producer.sold', compact('sells'));
  }

  public function changePass(){
    $message = '';
    return view('producer.change-pass', compact('message'));
  }

  public function updatePass(Request $request){
    $user = Auth::user();
    $message = null;

    if (strlen($request->new_password) < 6){
      $message = 'رمز جدید حداقل باید 6 کاراکتر باشد';
      return view('producer.change-pass', compact('message'));
    }

    if(Hash::check($request->old_password, $user->password)){
      if($request->new_password === $request->new_password_repeat){
        $user->password = Hash::make($request->new_password);
        $user->save();
        $message = 'رمز شما با موفقیت تغییر یافت';
      }
    }



    if($message === null){
      $message = 'متاسفانه رمز شما تغییر نیافت.لطفا رمز قبلی و رمز جدید را با دقت وارد نمایید.';
    }


    return view('producer.change-pass', compact('message'));

  }

  public function report(){
    $from_date = date('Y-m-d');
    $to_date =  date('Y-m-d');
    $date = new \DateTime($from_date);
    $date->setTime(0, 0, 0);
    $from_date = $date->format('Y-m-d H:i:s');
    $date = new \DateTime($to_date);
    $date->setTime(23, 59, 59);
    $to_date = $date->format('Y-m-d H:i:s');

    $producer = Auth::user();
    $books = $producer->producerBooks()->withTrashed()->get();
    $total = 0;
    foreach ($books as $book) {
      $book->orders = $book->orderContents()->where('created_at', '>=', $from_date)->where('created_at', '<=', $to_date)->get();
      $count = 0;
      $sum = 0;
      foreach ($book->orders as $order){
        $count += $order->count;
        $sum += $order->price;
      }
      $book->count = $count;
      $book->sum = $sum;
      $total += $sum;
    }

    return view('producer.report', compact('books', 'from_date', 'to_date', 'total'));
  }

  public function reportResult(Request $request){
    $from_date = Pnum::toLatin($request->from_date);
    $to_date = Pnum::toLatin($request->to_date);
//    if (strlen($from_date) < 5 || strlen($to_date) < 5) {
//      $from_date = date('Y-m-d');
//      $to_date =  date('Y-m-d');
//    }else {
    $date = new Pdate();
    $from_date = $date->toGregorian($from_date);
    $to_date = $date->toGregorian($to_date);

//    }
    $date = new \DateTime($from_date);
    $date->setTime(0, 0, 0);
    $from_date = $date->format('Y-m-d H:i:s');
    $date = new \DateTime($to_date);
    $date->setTime(23, 59, 59);
    $to_date = $date->format('Y-m-d H:i:s');



    $producer = Auth::user();
    $books = $producer->producerBooks()->withTrashed()->get();
    $total = 0;
    foreach ($books as $book) {
      $book->orders = $book->orderContents()->where('created_at', '>=', $from_date)->where('created_at', '<=', $to_date)->get();
      $count = 0;
      $sum = 0;
      foreach ($book->orders as $order){
        $count += $order->count;
        $sum += $order->price;
      }
      $book->count = $count;
      $book->sum = $sum;
      $total += $sum;
    }

    return view('producer.report', compact('books', 'from_date', 'to_date', 'total'));

  }
}
