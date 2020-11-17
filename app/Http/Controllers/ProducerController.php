<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
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
    $categories = Category::all();
    return view('producer.products', compact('products', 'categories'));
  }

  public function productAdd(Request $request){
    $user = Auth::user();

    $is_important = 0;

    $image = $request->file('image');
    $demo = $request->file('demo_file');

    $file_extension = $image->getClientOriginalExtension();
    $dir = FileHelper::getFileDirName('images/books');
    $file_name = FileHelper::getFileNewName();
    $image_name = $file_name . '.' . $file_extension;
    $file_path = $dir . '/' . $file_name . '.'.$file_extension;
    $image->move($dir, $image_name);


    $file_path2 = null;
    if($demo !== null) {
      $file_extension2 = $demo->getClientOriginalExtension();
      $dir2 = FileHelper::getFileDirName('demo/books');
      $file_name2 = FileHelper::getFileNewName();
      $demo_name = $file_name2 . '.' . $file_extension2;
      $file_path2 = $dir2 . '/' . $file_name2 . '.' . $file_extension2;
      $demo->move($dir2, $demo_name);
    }

    $book = Book::create([
      'producer_id' => $user->id,
      'category_id' => $request->category_id,
      'name' => $request->name,
      'description' => $request->description,
      'price' => $request->price,
      'discount_percent' => $request->discount_percent,
      'stock' => $request->stock,
      'image_path' => $file_path,
      'is_important' => $is_important,
      'demo_file' => $file_path2,
      'status' => Book::KEY_STATUS_PENDING,
    ]);

    return redirect(url('/producer/products'));
  }


  public function productEdit($id){
    $user = Auth::user();
    $product = Book::find($id);
    $categories = Category::all();
    if ($product->producer_id != $user->id) return back();

    return view('producer.product-edit', compact('product', 'categories'));
  }

  public function productRemove(Request $request){
    $user = Auth::user();
    $product = Book::find($request->id);
    if ($product->producer_id != $user->id) return back();

    $product->delete();
    return redirect(url('/producer/products'));
  }

  public function productUpdate(Request $request){
    $user = Auth::user();
    $is_important = 0;

    $book = Book::find($request->book_id);

    if ($book->producer_id != $user->id) return back();

    $image = $request->file('image');
    if ($image !== null) {
      $file_extension = $image->getClientOriginalExtension();
      $dir = FileHelper::getFileDirName('images/books');
      $file_name = FileHelper::getFileNewName();
      $image_name = $file_name . '.' . $file_extension;
      $file_path = $dir . '/' . $file_name . '.' . $file_extension;
      $image->move($dir, $image_name);
    }else{
      $file_path = $book->image_path;
    }



    $file_path2 = $book->demo_file;
    $demo = $request->file('demo_file');
    if($demo !== null) {
      $file_extension2 = $demo->getClientOriginalExtension();
      $dir2 = FileHelper::getFileDirName('demo/books');
      $file_name2 = FileHelper::getFileNewName();
      $demo_name = $file_name2 . '.' . $file_extension2;
      $file_path2 = $dir2 . '/' . $file_name2 . '.' . $file_extension2;
      $demo->move($dir2, $demo_name);
    }


    $book->producer_id = $user->id;
    $book->category_id = $request->category_id;
    $book->name = $request->name;
    $book->description = $request->description;
    $book->price = $request->price;
    $book->discount_percent = $request->discount_percent;
    $book->stock = $request->stock;
    $book->image_path = $file_path;
    $book->is_important = $is_important;
    $book->demo_file = $file_path2;
    $book->save();

    return redirect(url('/producer/products'));
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


  public function settlement(){
    $user = Auth::user();
    $sum = 0;
    $sells = $user->producerSells()->where('is_settled', '=', 0)->get();
    foreach ($sells as $sell){
      $sum += $sell->count * $sell->price;
    }
    $settlements = $user->producerSettlements()->orderBy('id', 'desc')->get();
    return view('producer.checkout', compact('settlements', 'sum'));
  }
}
