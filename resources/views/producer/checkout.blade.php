@extends('producer.dashboard')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class=" col-md-12">
                <h4>در حال حاضر موجودی حساب شما {{number_format($sum)}} تومان میباشد.</h4>

            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="red-divider"></div>
        <h6 class="mt-4">لیست تسویه حساب : </h6>
        <div class="row mt-4" >

            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped"  id="فروش">
                        <thead>
                        <tr>
                            <th scope="col">ردیف</th>
                            <th scope="col">مبلغ(تومان) </th>
                            <th scope="col">بانک </th>
                            <th scope="col">شماره حساب </th>
                            <th scope="col">شبا </th>
                            <th scope="col">نام دارنده حساب </th>
                            <th scope="col">مستندات </th>
                            <th scope="col">تاریخ </th>

                        </tr>
                        </thead>
                        <tbody>


                        @php($i=0)
                        @foreach($settlements as $settlement)
                        <tr>
                            <th>{{++$i}}</th>

                            <td> {{number_format($settlement->amount)}}</td>
                            <td>{{$settlement->bank}}</td>
                            <td>{{$settlement->bank_account}}</td>
                            <td>{{$settlement->bank_shba}}</td>
                            <td>{{$settlement->bank_account_owner}}</td>
                            <td>
                                @if(strlen($settlement->document) > 0)
                                    <a class="btn btn-primary" href="{{url('/').'/'.$$settlement->document}}" download="">دانلود مستندات</a>
                                @endif
                            </td>

                            @php($date = new \App\Http\Controllers\Util\Pdate())
                            <th>{{$date->toPersian($settlement->created_at, 'Y/m/d')}}</th>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
