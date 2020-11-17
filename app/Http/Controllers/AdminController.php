<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Discount;
use App\Http\Controllers\Util\Pdate;
use App\Http\Controllers\Util\Pnum;
use App\Order;
use App\OrderContent;
use App\Setting;
use App\Settlement;
use App\Slider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('admin');
  }


  public function orders(){
    $new_orders = Order::orderBy('id', 'desc')->where('is_sent', '=', 0)->get();
    $old_orders = Order::orderBy('id', 'desc')->where('is_sent', '=', 1)->paginate(20);
    return view('admin.orders', compact(['old_orders', 'new_orders']));
  }


  public function ordersSearch(Request $request){
    $text = $request->text;
    $new_orders = Order::orderBy('id', 'desc')->where('is_sent', '=', 0)->get();
    $users = User::where('name', 'like', '%'.$text.'%')->orWhere('email', 'like', '%'.$text.'%')->orWhere('phone', 'like', '%'.$text.'%')->get();
    $ids = array();
    foreach ($users as $user){
      $ids [] = $user->id;
    }
    $old_orders = Order::orderBy('id', 'desc')->where('is_sent', '=', 1)->whereIn('user_id', $ids)->paginate(20);
    return view('admin.orders', compact(['old_orders', 'new_orders']))->with('search', $text);
  }

  public function sendOrder(Request $request){
    $this->validate($request, [
      'order_id' => 'required|numeric',
    ]);

    $order = Order::find($request->order_id);
    $trace_no = $request->trace_no;
    $letter_number = $request->letter_number;
    if($trace_no == null) $trace_no = ' ';
    if($letter_number == null) $letter_number = ' ';
    $order->trace_no = $trace_no;
    $order->letter_number = $letter_number;
    $order->sended_at = date('Y-m-d H:i:s');
    $order->is_sent = 1;
    $order->save();
    return redirect(route('admin-orders'));
  }


  public function site(){
    $sliders = Slider::all();
    $users = User::where('role', '=', 'user')->get();
    $address = Setting::get(Setting::KEY_ADDRESS)->value;
    $manager = Setting::get(Setting::KEY_MANAGER_NAME)->value;
    $email = Setting::get(Setting::KEY_MANAGER_EMAIL)->value;
    $direct_phone = Setting::get(Setting::KEY_DIRECT_PHONE)->value;
    $internal_phone = Setting::get(Setting::KEY_INTERNAL_PHONE)->value;
    $link1_title = Setting::get(Setting::KEY_LINK1_TITLE)->value;
    $link1 = Setting::get(Setting::KEY_LINK1)->value;
    $link2_title = Setting::get(Setting::KEY_LINK2_TITLE)->value;
    $link2 = Setting::get(Setting::KEY_LINK2)->value;
    $link3_title = Setting::get(Setting::KEY_LINK3_TITLE)->value;
    $link3 = Setting::get(Setting::KEY_LINK3)->value;
    return view('admin.site', compact('sliders', 'users', 'address', 'manager', 'email', 'direct_phone', 'internal_phone',
      'link1_title', 'link1', 'link2_title', 'link2', 'link3_title', 'link3'));
  }

  public function updateFooter(Request $request){
    $address = Setting::get(Setting::KEY_ADDRESS);
    $manager = Setting::get(Setting::KEY_MANAGER_NAME);
    $email = Setting::get(Setting::KEY_MANAGER_EMAIL);
    $direct_phone = Setting::get(Setting::KEY_DIRECT_PHONE);
    $internal_phone = Setting::get(Setting::KEY_INTERNAL_PHONE);
    $link1 = Setting::get(Setting::KEY_LINK1);
    $link2 = Setting::get(Setting::KEY_LINK2);
    $link3 = Setting::get(Setting::KEY_LINK3);
    $link1_title = Setting::get(Setting::KEY_LINK1_TITLE);
    $link2_title = Setting::get(Setting::KEY_LINK2_TITLE);
    $link3_title = Setting::get(Setting::KEY_LINK3_TITLE);

    $address->value = $request->address;
    $address->save();
    $manager->value = $request->manager;
    $manager->save();
    $email->value = $request->email;
    $email->save();
    $direct_phone->value = $request->direct_phone;
    $direct_phone->save();
    $internal_phone->value = $request->internal_phone;
    $internal_phone->save();
    $link1->value = $request->link1;
    $link1->save();
    $link2->value = $request->link2;
    $link2->save();
    $link3->value = $request->link3;
    $link3->save();

    $link1_title->value = $request->link1_title;
    $link1_title->save();
    $link2_title->value = $request->link2_title;
    $link2_title->save();
    $link3_title->value = $request->link3_title;
    $link3_title->save();

    return back();
  }

  public function sliderRemove(Request $request){
    $this->validate($request, [
      'slider_id' => 'required|numeric',
    ]);

    $slider = Slider::find($request->slider_id);
    $slider->delete();

    return redirect(route('admin-site'));
  }


  public function insertSlider(Request $request){
    $this->validate($request, [
      'image' => 'required|image',
    ]);

    $image = $request->file('image');

    $file_extension = $image->getClientOriginalExtension();
    $dir = FileHelper::getFileDirName('images/sliders');
    $file_name = FileHelper::getFileNewName();
    $image_name = $file_name . '.' . $file_extension;
    $file_path = $dir . '/' . $file_name . '.'.$file_extension;
    $image->move($dir, $image_name);

    $slider = Slider::create([
      'image_path' => $file_path,
    ]);

    return redirect(route('admin-site'));

  }


  public function books(){
    $books = Book::orderBy('id', 'desc')->where('status', '=', Book::KEY_STATUS_ACCEPTED)->paginate(20);
    $categories = Category::all();
    $producers = User::where('role', '=', 'producer')->get();
    return view('admin.products', compact(['books', 'categories', 'producers']));
  }

  public function booksNew(){
    $books = Book::orderBy('id', 'desc')->where('status', '=', Book::KEY_STATUS_PENDING)->paginate(20);
    return view('admin.received-products', compact(['books']));
  }

  public function booksNewAccept($id){
    $book = Book::find($id);
    $book->status = Book::KEY_STATUS_ACCEPTED;
    $book->save();
    return back();
  }

  public function booksNewReject($id){
    $book = Book::find($id);
    $book->status = Book::KEY_STATUS_REJECTED;
    $book->save();
    return back();
  }


  public function bookSearch(Request $request){
    $search = $request->text;
    $books =Book::where('name', 'like', '%'.$search.'%')->where('status', '=', Book::KEY_STATUS_ACCEPTED)->paginate(20);
    $categories = Category::all();
    $producers = User::where('role', '=', 'producer')->get();
    return view('admin.products', compact(['books', 'categories', 'producers']))->with('search', $search);
  }


  public function bookInsert(Request $request){
    $this->validate($request, [
      'producer_id' => 'numeric',
      'category_id' => 'numeric',
      'name' => 'required|min:1|max:200|string',
      'description' => 'required|min:1|max:6000|string',
      'price' => 'required|min:0|max:20000000|numeric',
      'discount_percent' => 'required|min:0|max:100|numeric',
      'stock' => 'required|min:0|max:200000|numeric',
      'image' => 'required|image',
    ]);

    $is_important = 0;
    if($request->is_important !== null) $is_important = 1;

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
      'producer_id' => $request->producer_id,
      'category_id' => $request->category_id,
      'name' => $request->name,
      'description' => $request->description,
      'price' => $request->price,
      'discount_percent' => $request->discount_percent,
      'stock' => $request->stock,
      'image_path' => $file_path,
      'is_important' => $is_important,
      'demo_file' => $file_path2,
      'status' => Book::KEY_STATUS_ACCEPTED,
    ]);

    return redirect(route('admin-books'));
  }


  public function book($id){
    $book = Book::find($id);
    $categories = Category::all();
    $producers = User::where('role', '=', 'producer')->get();

    return view('admin.product-edit', compact(['book', 'categories', 'producers']));
  }


  public function bookEdit(Request $request){
    $is_important = 0;
    if($request->is_important !== null) $is_important = 1;

    $book = Book::find($request->book_id);

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


    $book->producer_id = $request->producer_id;
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

    return redirect(route('admin-books'));
  }


  public function bookRemove(Request $request){
    $this->validate($request, [
      'book_id' => 'required|numeric',
    ]);

    $book = Book::find($request->book_id);
    $book->delete();
    return redirect(route('admin-books'));
  }


  public function changePasswordPage(){
    $message = Session::get('message');
    return view('admin.change_password', compact('message'));
  }


  public function changePassword(Request $request){
//    $this->validate($request, [
//      'old_password' => 'required|min:6',
//      'new_password' => 'required|min:6',
//      'new_password_repeat' => 'required|min:6',
//    ]);

    $user = Auth::user();
    $message = null;

    if (strlen($request->new_password) < 6){
      $message = 'رمز جدید حداقل باید 6 کاراکتر باشد';
      return view('admin.change_password', compact('message'));
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


    return view('admin.change_password', compact('message'));
  }


  public function userRemove($id){
    $user = User::find($id);
    $user->delete();
    return back();
  }




  public function discounts(){
    $discounts = Discount::orderBy('id', 'desc')->get();
    return view('admin.discounts', compact('discounts'));
  }

  public function discountAdd(Request $request){
    $discount = Discount::create([
      'code' => $request->code,
      'percent' => $request->percent,
    ]);

    return back();
  }

  public function discountRemove($id){
    $discount = Discount::find($id);
    $discount->delete();
    return back();
  }



  public function salesReport(){
    $from_date = date('Y-m-d');
    $to_date =  date('Y-m-d');
    $date = new \DateTime($from_date);
    $date->setTime(0, 0, 0);
    $from_date = $date->format('Y-m-d H:i:s');
    $date = new \DateTime($to_date);
    $date->setTime(23, 59, 59);
    $to_date = $date->format('Y-m-d H:i:s');

    $books = Book::withTrashed()->get();
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

    return view('admin.report', compact('books', 'from_date', 'to_date', 'total'));
  }

  public function salesReportResult(Request $request){
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



    $books = Book::withTrashed()->get();
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

    return view('admin.report', compact('books', 'from_date', 'to_date', 'total'));

  }


//------------------------------------------------------------categories------------------------------------------------------------
  public function categories(){
    $categories = Category::orderBy('id', 'desc')->get();
    return view('admin.category', compact('categories'));
  }

  public function categoryAdd(Request $request){
    $category = Category::create([
      'name' => $request->name
    ]);
    return redirect(url('/admin/category'));
  }

  public function categoryEdit($id){
    $category = Category::find($id);
    return view('admin.category-edit', compact('category'));
  }

  public function categoryUpdate(Request $request){
    $category = Category::find($request->id);
    $category->name = $request->name;
    $category->save();
    return redirect(url('/admin/category'));
  }

  public function categoryRemove(Request $request){
    $category = Category::find($request->id);
    $category->delete();
    return back();
  }



  //------------------------------------------------------------producers------------------------------------------------------------
 public function producers(){
    $producers = User::orderBy('id', 'desc')->where('role', '=', 'producer')->get();
   return view('admin.producers', compact('producers'));
 }

 public function producerAdd(Request $request){
    $producer = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'role' => 'producer',
      'bank' => $request->bank,
      'bank_account' => $request->bank_account,
      'bank_shba' => $request->bank_shba,
      'bank_account_owner' => $request->bank_account_owner,
      'password' => Hash::make($request->password),
    ]);

    return back();
 }

 public function producerEdit($id){
    $producer = User::find($id);
    if ($producer->role != 'producer')
      return back();

   return view('admin.producer-edit', compact('producer'));
 }

 public function producerUpdate(Request $request){
   $producer = User::find($request->id);
   $producer->name = $request->name;
   $producer->email = $request->email;
   $producer->phone = $request->phone;
   $producer->bank = $request->bank;
   $producer->bank_account = $request->bank_account;
   $producer->bank_shba = $request->bank_shba;
   $producer->bank_account_owner = $request->bank_account_owner;
   $producer->password = Hash::make($request->password);
   $producer->save();
   return back();
 }

 public function producerRemove(Request $request){
    $producer = User::find($request->id);
    $producer->delete();
    return back();
 }



  //------------------------------------------------------------producers------------------------------------------------------------
  public function checkout(){
    //do settled for admin products
    $books = Book::where('producer_id', '=', '0')->get();
    foreach ($books as $book){
      $unsettleds = $book->orderContents()->where('is_settled', '=', 0)->get();
      foreach ($unsettleds as $unsettled){
        $unsettled->is_settled = 1;
        $unsettled->save();
      }
    }


    $unsettleds = OrderContent::where('is_settled', '=', 0)->get();
    return view('admin.checkout', compact('unsettleds'));
  }

  public function checkoutDone($id){
    $unsettled = OrderContent::find($id);
    $unsettled->is_settled = 1;
    $unsettled->save();
    return back();
  }

  public function settlement(){
    $settlements = Settlement::orderBy('id', 'desc')->get();
    $producers = User::where('role', '=', 'producer')->get();

    foreach ($producers as $producer) {
      $sum = 0;
      $unsettled_sells = $producer->producerSells()->where('is_settled', '=', 0)->get();
      foreach ($unsettled_sells as $sell){
        $sum += $sell->count * $sell->price;
      }

      $producer->sum = $sum;
    }

    $time = date('Y-m-d H:i:s');
    return view('admin.settlement', compact('settlements', 'producers', 'time'));
  }


  public function settlementDo(Request $request){
    $producer = User::find($request->user_id);
    $time = $request->time;

    $document = $request->file('document');


    $file_path2 = null;
    if($document !== null) {
      $file_extension2 = $document->getClientOriginalExtension();
      $dir2 = FileHelper::getFileDirName('producers/settlement');
      $file_name2 = FileHelper::getFileNewName();
      $demo_name = $file_name2 . '.' . $file_extension2;
      $file_path2 = $dir2 . '/' . $file_name2 . '.' . $file_extension2;
      $document->move($dir2, $demo_name);
    }

    $settlement = Settlement::create([
      'producer_id' => $producer->id,
      'amount' => $request->amount,
      'bank' => $producer->bank,
      'bank_account' => $producer->bank_account,
      'bank_shba' => $producer->bank_shba,
      'bank_account_owner' => $producer->bank_account_owner,
      'document' => $file_path2,
    ]);


    $unsettled_sells = $producer->producerSells()->where('is_settled', '=', 0)->where('created_at', '<', $time)->get();
    foreach ($unsettled_sells as $sell){
      $sell->is_settled = 1;
      $sell->save();
    }


    return back();
  }


}
