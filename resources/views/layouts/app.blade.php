<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('include.head')
</head>
<body class="rtl">
<div id="app">
    <div class='thetop'></div>
    @include('include.header')

    <main class="bg-light">
        <div class="d-flex flex-row-reverse justify-content-between align-items-center bg-light" style="width: 100%">
            <div class="text-center col-md-2 d-none d-md-block" style="">
                <span style="font-size: 1.3em" class="alert alert-success  p-1">ارسال رایگان <i class="fa fa-truck "></i></span>
            </div>
            <form action="{{route('book-search')}}" method="get" class="mt-2 text-center col-md-6  col-sm-12">
                @csrf
                <div class="form-group row mr-5 ">
                    <div class="col-sm-8">
                        <input  name="text" type="text" class="form-control"
                                style="border: 1px solid green"
                                @if(!empty($search))
                                value="{{$search}}"
                                @endif
                                placeholder="بخشی از نام محصول را وارد کنید" >
                    </div>
                    <button type="submit" class="btn col-4 justify-content-center mr-4" style="background: #1c7430;color: white;max-width: 90px">جستجو</button>
                </div>
            </form>

        </div>

        @yield('content')
    </main>
    @include('include.footer')
</div>
</body>
</html>
