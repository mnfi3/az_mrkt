<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SiteController extends Controller
{


  public function index(){
    $sliders = Slider::all();
    $books = Book::orderBy('is_important', 'desc')->orderBy('id', 'desc')->paginate(24);
//    $best_seller_ids = DB::select("SELECT book_id,count(book_id) as total FROM `order_contents`  group by(book_id) order by total desc limit 10");
//    $best_sellers = array();
//    foreach ($best_seller_ids as $id) {
//      $book = Book::find($id->book_id);
//      if ($book !== null){
//        $best_sellers [] = $book;
//      }
//    }
//    if(sizeof($best_sellers) < 1){
//      $best_sellers = Book::orderBy('is_important', 'desc')->orderBy('id', 'desc')->take(10)->get();
//    }
    $categories = Category::orderby('id', 'desc')->get();
    return view('site.welcome', compact(['sliders', 'books', 'categories']));
  }

  public function bookSearch(Request $request){
    $search = $request->text;
    $books =Book::where('name', 'like', '%'.$search.'%')->paginate(24);
    $sliders = Slider::all();
    $categories = Category::orderby('id', 'desc')->get();
    return view('site.welcome', compact(['sliders', 'books', 'categories']))->with('search', $search);
  }



  public function bookDetail($id){
    $message = Session::get('message');
//    $best_seller_ids = DB::select("SELECT book_id,count(book_id) as total FROM `order_contents`  group by(book_id) order by total desc limit 10");
//    $best_sellers = array();
//    foreach ($best_seller_ids as $book_id) {
//      $book = Book::find($book_id->book_id);
//      if ($book !== null){
//        $best_sellers [] = $book;
//      }
//    }
//
//    if(sizeof($best_sellers) < 1){
//      $best_sellers = Book::orderBy('is_important', 'desc')->orderBy('id', 'desc')->take(10)->get();
//    }
    $category = Category::find($id);
    $categories = Category::orderby('id', 'desc')->get();
    $book = Book::find($id);

    return view('site.detail', compact(['book', 'message', 'categories']));
  }



  public function categoryBooks($id){
    $category = Category::find($id);
    $books = $category->books()->orderBy('is_important', 'desc')->orderBy('id', 'desc')->paginate(24);
    $sliders = Slider::all();
    $categories = Category::orderby('id', 'desc')->get();

    return view('site.welcome', compact(['sliders', 'books', 'categories']));
  }

}
