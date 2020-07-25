@extends('layouts.app')
@section('content')

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
    <section id="detail" class="w-100 bg-texture">
        <div class="container p-3">
            <div class="shadow-box p-3">
                <div class="row">
                    <div class="col-md-3 img-container">
                        <img src="{{asset($book->image_path)}}" alt="">
                    </div>
                    <div class="col-md-8 mt-2 mt-md-0">
                        <h4> نام محصول : {{$book->name}} </h4>
                        @if($book->discount_percent > 0)
                        <h5 class="mt-4" >
                            <span class="text-danger" style="text-decoration: line-through">{{number_format($book->price)}} تومان</span>
                        </h5>
                        <h5 class="mt-4">
                            <span class="text-success">{{number_format( (int)($book->price - ($book->price * $book->discount_percent/100)))}} تومان</span>
                        </h5>
                        @else
                            <h5 class="mt-4" >
                                <span > قیمت : {{number_format($book->price)}}</span>
                                <span class=" ml-2">تومان</span>
                            </h5>
                        @endif

                        <div class="mt-5">
                            <h5>توضیحات</h5>
                            <p class="mt-1">
                                {{$book->description}}
                            </p>

                            @if($book->demo_file !== null)
                                <button type="button" class="btn  btn-info " style="color: black !important;">
                                    <a class="text-white" style="text-decoration: none" href="{{Illuminate\Support\Facades\URL::to('/') .'/'.$book->demo_file}}" target="_blank">دانلود ضمایم</a>
                                </button>

                            @endif
                        </div>
                        @if(auth()->user() !== null)
                            @if(auth()->user()->role !== 'admin')

                                @if($book->stock > 0)
                                    <a href="{{route('user-cart-add', $book->id)}}">
                                        <button type="submit" class="btn btn-success mt-4 "> افزودن به سبد خرید
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                    </a>
                                @endif
                                <a href="{{route('user-cart')}}" class="btn btn-outline-info mt-4 ">مشاهده سبد خرید</a>

                            @endif
                        @else

                            @if($book->stock > 0)
                                <a href="{{route('user-cart-add', $book->id)}}">
                                    <button type="submit" class="btn btn-success mt-4 "> افزودن به سبد خرید
                                        <i class="fa fa-shopping-cart"></i>
                                    </button>
                                </a>
                            @endif
                            <a href="{{route('user-cart')}}" class="btn btn-outline-info mt-4 ">مشاهده سبد خرید</a>

                        @endif
                        @if($book->stock < 1)
                            <div class="mt-4">
                                <span class="alert alert-danger p-1 text-center alert-unavailable ">نا موجود!</span>
                            </div>
                        @endif



                    </div>
                </div>

            </div>

        </div>

        @if($message)
            <span class="server-response sr-success active">{{$message}}</span>
        @endif
    </section>
@endsection
