<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('include.head')
</head>
<body class="rtl">
<div class="mt-5 ">
    <table class="m-auto response-table bg-light" border="1">
        <thead class="">
        <tr>
            <th class="py-3 text-center " scope="col" colspan="2">{{$description}}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th class="p-2" scope="row">مبلغ(ریال)</th>
            <td class="text-center">{{number_format($amount)}}</td>
        </tr>
        <tr>
            <th class="p-2" scope="row">شماره مرجع تراکنش</th>
            <td class="text-center">{{$retrival_ref_no}}</td>
        </tr>
        <tr>
            <th class="p-2" scope="row"> شماره پیگیری</th>
            <td class="text-center">{{$system_trace_no}}</td>
        </tr>
        <tr>
            <th class="p-2" scope="row"> کد خرید</th>
            <td class="text-center">{{$buy_code}}</td>
        </tr>
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-12 col-md-6 text-center m-auto ">
            <div class="alert alert-danger p-1 p-sm-2 mt-4">
                <p>
                    توجه: در صورتی که گزینه خرید حضوری را انتخاب کرده اید با در دست داشتن "کد خرید" به انتشارات
                    دانشگاه واقع در طبقه اول کتابخانه مرکزی مراجعه فرمایید.
                    در غیر این صورت مرسوله خود را از پست رهگیری نمایید.
                </p>
            </div>
        </div>
    </div>
    <div class="text-center mt-2">
        <a href="{{route('user-cart')}}" class="m-auto btn btn-sm btn-blue">بازگشت به پنل کاربری</a>
    </div>
</div>
</body>
</html>