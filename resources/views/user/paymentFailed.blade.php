<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('include.head')
</head>
<body class="rtl">
<div class="mt-5 text-center ">
    <h6 class="m-auto alert alert-danger p-3 fail-message">{{$description}}</h6>
    <div class="mt-3">
        <a  href="{{route('user-cart')}}" class="m-auto btn btn-sm btn-blue">بازگشت به پنل کاربری</a>
    </div>
</div>
</body>
</html>