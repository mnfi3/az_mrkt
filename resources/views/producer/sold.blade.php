@extends('producer.dashboard')
@section('admin_content')

    <div class="container-fluid p-1 p-sm-2">
        <h6 class="alert">لیست فروش محصولات </h6>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ردیف</th>
                    <th scope="col"> محصول</th>
                    <th scope="col">تعداد</th>
                    <th scope="col">قیمت کل</th>
                    <th scope="col">وضعیت تسویه حساب</th>
                    <th scope="col"> زمان ثبت فروش</th>
                </tr>
                </thead>
                <tbody>
                @php($i=0)
                @foreach($sells as $sell)
                    <tr style="font-size: 0.9rem">
                        <th scope="row">{{++$i}}</th>

                        <td class="d-flex flex-column">
                            {{$sell->book->name}}
                        </td>
                        <td >
                            {{$sell->count}}
                        </td>
                        <td class="">
                            {{number_format($sell->price)}} تومان
                        </td>

                        @if($sell->is_settled == 1)
                        <td class="text-success">
                            تسویه حساب شده
                        </td>
                        @else
                            <td class="text-warning">
                                تسویه حساب نشده
                            </td>
                        @endif

                        @php($date = new \App\Http\Controllers\Util\Pdate())
                        @php($d = explode(' ', $sell->created_at)[0])
                        @php($time = explode(' ', $sell->created_at)[1])
                        <td class="text-black" > {{$date->toPersian($d, 'Y/m/d')}} <br> {{$time}}  </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <hr>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

@endsection
