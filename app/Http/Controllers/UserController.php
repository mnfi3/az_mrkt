<?php

namespace App\Http\Controllers;

use App\BankOrder;
use App\Book;
use App\Cart;
use App\CartContent;
use App\Discount;
use App\Order;
use App\OrderContent;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
  public function __construct() {
    $this->middleware('auth', ['except' => ['cartPayVerify']]);
    $this->middleware('user', ['except' => ['cartPayVerify']]);
  }


  public function cart(){
    $message = null;
    $message = Session::get('message');
    $cart = Auth::user()->cart;
    $contents = $cart->contents;
    $sum = 0;
    foreach ($contents as $content) {
      $sum += ($content->count) * ( (int)($content->book->price - ($content->book->price * $content->book->discount_percent/100)));
    }
    return view('user.cart', compact(['contents', 'sum', 'message']));
  }

  public function cartAdd($book_id){

    $user = Auth::user();
    $book = Book::find($book_id);

    if($user->role === 'admin'){
      return redirect(route('detail', $book->id));
    }

    $cart = $user->cart;

    if($cart == null){
      $cart = Cart::create([
        'user_id' => $user->id
      ]);
    }

    if($book->stock > 0){
      $contents = $cart->contents;
      $isExist = false;
      foreach ($contents as $content){
        if($content->book_id == $book->id){
          $isExist = true;
          break;
        }
      }

      if (!$isExist) {
        $content = CartContent::create([
          'cart_id' => $cart->id,
          'book_id' => $book->id,
          'count' => 1,
        ]);
        $message = 'به سبد خرید اضافه شد.';
      }else{
        $message = 'این محصول از قبل در سبد خرید شما موجود میباشد.';
      }

    }

    return redirect(route('detail', $book->id))->with('message', $message);
  }


  public function cartRemove(Request $request){
    $this->validate($request, [
      'content_id' => 'required|numeric'
    ]);

    $content = CartContent::find($request->content_id);
    $content->delete();
    return redirect(route('user-cart'))->with('message', 'از سبد خرید شما حذف شد.');
  }


  public function cartMinus($content_id){
    $content = CartContent::find($content_id);
    if ($content->cart->user->id == Auth::user()->id   &&  $content->count > 1){
      $content->count -= 1;
      $content->save();

      $count1 = $content->count;

      $cart = Auth::user()->cart;
      $contents = $cart->contents;
      $sum = 0;
      foreach ($contents as $content) {
        $sum += ($content->count) * ( (int)($content->book->price - ($content->book->price * $content->book->discount_percent/100)) );;
      }

      $message = 'تعداد محصول بروز شد.';
      $result = ['status' => 1, 'count' => $count1, 'message' => $message, 'sum' => $sum];
      return json_encode($result);
    }else{
      $cart = Auth::user()->cart;
      $contents = $cart->contents;
      $sum = 0;
      foreach ($contents as $content) {
        $sum += ($content->count) * ( (int)($content->book->price - ($content->book->price * $content->book->discount_percent/100)) );;
      }

      $message = '';
      $result = ['status' => 0, 'count' => $content->count, 'message' => $message, 'sum' => $sum];
      return json_encode($result);
    }

//    return redirect(route('user-cart'))->with('message', $message);
  }

  public function cartPlus($content_id){
    $content = CartContent::find($content_id);
    if ($content->cart->user->id == Auth::user()->id   &&  $content->book->stock > $content->count){
      $content->count += 1;
      $content->save();

      $count1 = $content->count;

      $cart = Auth::user()->cart;
      $contents = $cart->contents;
      $sum = 0;
      foreach ($contents as $content) {
        $sum += ($content->count) * ( (int)($content->book->price - ($content->book->price * $content->book->discount_percent/100)) );;
      }

      $message = 'تعداد محصول بروز شد.';
      $result = ['status' => 1, 'count' => $count1, 'message' => $message, 'sum' => $sum];
      return json_encode($result);
    }else{
      $cart = Auth::user()->cart;
      $contents = $cart->contents;
      $sum = 0;
      foreach ($contents as $content) {
        $sum += ($content->count) * ( (int)($content->book->price - ($content->book->price * $content->book->discount_percent/100)) );;
      }

      $message = "بیشتر از $content->count عدد از این نوع محصول وجود ندارد.";
      $result = ['status' => 0, 'count' => $content->count, 'message' => $message, 'sum' => $sum];
      return json_encode($result);
    }

//    return redirect(route('user-cart'))->with('message', $message);
  }

  public function orders(){
    $user = Auth::user();
    $orders = $user->orders;
    return view('user.orders', compact('orders'));
  }






  public function cartPay(Request $request){
     $this->validate($request, [
//      'address' => 'string|max:3000',
      'phone' => 'required|string|max:20|min:5',
//      'postal_code' => 'string|max:20',
    ]);

    $cart = Auth::user()->cart;
    $contents = $cart->contents;
    $is_in_person = 0;
    if(!is_null($request->is_in_person)) $is_in_person = 1;

    $amount = 0;
    foreach ($contents as $content) {
      $amount += ($content->count) * ( (int)($content->book->price - ($content->book->price * $content->book->discount_percent/100)) );
    }

    if ($amount < 100) return redirect(route('user-cart'))->with('message', 'مبلغ قابل پرداخت بسیار کم میباشد');

    foreach ($contents as $content){
      if($content->count > $content->book->stock){
        return redirect(route('user-cart'))->with('message', 'تعداد محصولات درخواستی شما بیشتر از تعداد موجود میباشد');
      }
    }

    //set discount
    $discount_id = 0;
    if (strlen($request->discount_code) > 0){
      $discount = Discount::orderBy('id', 'desc')->where('code', '=', $request->discount_code)->first();
      if ($discount != null){
        $discount_id = $discount->id;
        $amount = (int) ($amount - ($amount * ($discount->percent / 100)));
      }
    }


    $address = 'تحویل حضوری';
    if($is_in_person == 0) $address = $request->address;

    $order = BankOrder::create([
      'cart_id' => $cart->id,
      'is_in_person' => $is_in_person,
      'address' => $address,
      'phone' => $request->phone,
      'postal_code' => $request->postal_code,
      'amount' => (int) $amount,
      'discount_id' => $discount_id,
    ]);

    $sadad = new Sadad(
      env('SADAD_MERCHANT_ID'),
      env('SADAD_TERMINAL_ID'),
      env('SADAD_TERMINAL_KEY'),
      env('SADAD_PAYMENT_IDENTITY')
    );

    $response = $sadad->request((int)($order->amount * 10), $order->id, route('user-cart-pay-verify'));

    if($response->ResCode != 0){
      $description = $response->Description;
      return view('user.paymentFailed', compact('description'));
    }else{
      return redirect($sadad->getRedirectUrl().$response->Token);
    }
  }




  public function cartPayVerify(Request $request){

    $order_id = $request->OrderId;
    $token = $request->token;
    $pay_res_code = $request->ResCode;

    $order = BankOrder::find($order_id);



    if ($pay_res_code != 0){
      $description = 'تراکنش نا موفق بود در صورت کسر مبلغ از حساب شما حداکثر پس از 72 ساعت مبلغ به حسابتان برمی گردد';
      return view('user.paymentFailed', compact('description'));
    }


    $sadad = new Sadad(
      env('SADAD_MERCHANT_ID'),
      env('SADAD_TERMINAL_ID'),
      env('SADAD_TERMINAL_KEY'),
      env('SADAD_PAYMENT_IDENTITY')
    );

    $verify_response = $sadad->verify($token);
    $res_code = $verify_response->ResCode;
    if ($res_code == 0) {
      $amount = $verify_response->Amount; //rial
      $description = $verify_response->Description;
      $retrival_ref_no = $verify_response->RetrivalRefNo;
      $system_trace_no = $verify_response->SystemTraceNo;
      $order_id = $verify_response->OrderId;
    }



    if($pay_res_code == 0 && $res_code == 0){
      //success
      $cart = $order->cart;
      $user = $cart->user;
      $contents = $cart->contents;


      $p = Payment::where('user_id', '=', $user->id)->where('retrival_ref_no', '=', $retrival_ref_no)->where('system_trace_no', '=', $system_trace_no)->get();
      if(count($p) == 0) {
        $payment = Payment::create([
          'user_id' => $user->id,
          'amount' => (int)(($order->amount)),
          'is_success' => 1,
          'retrival_ref_no' => $retrival_ref_no,
          'system_trace_no' => $system_trace_no,
        ]);

        //generate buy_code
        $buy_code = $order->id . ((int)($system_trace_no / 2));

        $new_order = Order::create([
          'user_id' => $user->id,
          'payment_id' => $payment->id,
          'discount_id' => $order->discount_id,
          'is_in_person' => $order->is_in_person,
          'buy_code' => $buy_code,
          'address' => $order->address,
          'phone' => $order->phone,
          'postal_code' => $order->postal_code,
          'is_sent' => 0,
          'trace_no' => '',
        ]);

        foreach ($contents as $content) {
          $price = ($content->count) * ( (int)($content->book->price - ($content->book->price * $content->book->discount_percent/100)) );
          $discount = Discount::find($order->discount_id);
          if ($discount != null){
            $price = (int) ($price - ($price * ($discount->percent/100)));
          }
          $order_content = OrderContent::create([
            'order_id' => $new_order->id,
            'book_id' => $content->book_id,
            'count' => $content->count,
//            'price' => $order->amount,
            'price' => $price,
          ]);

          $book = Book::find($content->book_id);
          $book->stock -= $content->count;
          $book->save();
        }

        foreach ($contents as $content) {
          $content->delete();
        }
      }




      return view('user.paymentSuccess', compact(['description', 'retrival_ref_no', 'system_trace_no', 'amount', 'buy_code']));

    }else{
      //failed
      $description = 'تراکنش نا موفق بود در صورت کسر مبلغ از حساب شما حداکثر پس از 72 ساعت مبلغ به حسابتان برمی گردد';
      return view('user.paymentFailed', compact('description'));
    }


  }






}
