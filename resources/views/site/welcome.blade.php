
@extends('layouts.app')
@section('content')

    <div class=" bg-light books-container">

        <div class="d-flex flex-wrap align-content-center m-1 p-2" style="border-radius: 0.45rem;background-color: #1d7b8a ">
            <span class="mt-2 mr-1 text-white">دسته بندی ها : </span>
{{--            <a href="{{route('site-home')}}" class="btn btn-light m-1  mx-2  @if(\Illuminate\Support\Facades\Request::path() == '/')bg-warning border-0 @endif"></a>--}}
            @foreach($categories as $category)
                <a href="{{route('category-books', $category->id)}}"
                   style=""
                   class="btn btn-light m-1 mx-2 category-hover
                    @if(\Illuminate\Support\Facades\Request::path() == 'category/'.$category->id.'/books')
                        bg-warning border-0
                    @endif">{{$category->name}}
                </a>
            @endforeach
        </div>
        <div id="allBooks" class="d-flex flex-row flex-wrap m-0 p-1 p-sm-3 justify-content-center">
            @foreach($books as $book)
                <a href="{{route('detail', $book->id)}}" class="d-block text-center book-link">
                    <div class="book-container d-flex flex-column align-items-center m-3" style="min-height: 300px !important;">
                        <img src="{{asset($book->image_path)}}" class="book-img mb-2"/>
                        <div class="d-flex flex-column align-self-stretch ">
                            <span class="mb-1" style="min-height: 50px;max-height: 80px;overflow: hidden">{{$book->name}}</span>
                            {{--<span class="mb-2" style="min-height: 25px;max-height: 25px;overflow: hidden">{{$book->author}}</span>--}}
                            @if($book->discount_percent > 0)
                            <span class="book-price mb-2 bg-danger" style="border-radius: 0.25rem;text-decoration: line-through">{{number_format($book->price)}} تومان </span>
                            <span class="book-price" style="border-radius: 0.25rem">{{number_format( (int)($book->price - ($book->price * $book->discount_percent/100)))}} تومان </span>
                            @else
                                <span class="book-price" style="border-radius: 0.25rem"> {{number_format($book->price)}} تومان </span>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="container" >
            <div class="d-flex justify-content-center">
                <div class="flex-item text-center mt-2" style="">
                    <nav aria-label="Page navigation example"  >
                        <ul class="pagination" >
                            {{$books->links()}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
@stop
