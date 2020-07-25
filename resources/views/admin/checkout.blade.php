@extends('admin.dashboard')
@section('admin_content')

    <!--MESSAGE MODAL-->
    <div class="container-fluid p-1 p-sm-2">

        <br>

        <h6 class="alert alert-success mt-5"><i class="fa fa-check mr-1"></i>لیست سفارشات تسویه نشده</h6>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ردیف</th>
                    <th scope="col">محصول</th>
                    <th scope="col">تعداد</th>
                    <th scope="col">قیمت کل</th>
                    <th scope="col">اطلاعات فروشنده</th>
                    <th scope="col">زمان ثبت سفارش</th>
                    <th scope="col" style="width: 140px">تسویه با فروشنده</th>


                </tr>
                </thead>
                <tbody>
                @php($i=0)
                @foreach($unsettleds as $unsettled)
                    @if($unsettled->book->producer_id == 0)
                        @continue
                    @endif
                    <tr>
                        <th scope="row">{{++$i}}</th>

                        <td class="d-flex flex-column">
                                    {{$unsettled->book->name}}
                        </td>
                        <td >
                            {{$unsettled->count}}
                        </td>
                        <td class="">
                           {{number_format($unsettled->price)}} تومان
                        </td>


                        <td>
                            <a href="{{url('/admin/producer-edit', $unsettled->book->producer->id)}}"> {{$unsettled->book->producer->name}} </a>
                        </td>


                        @php($date = new \App\Http\Controllers\Util\Pdate())
                        @php($d = explode(' ', $unsettled->created_at)[0])
                        @php($time = explode(' ', $unsettled->created_at)[1])
                        <td class="text-black" > {{$date->toPersian($d, 'Y/m/d')}} <br> {{$time}}  </td>


                        <td>
                            <a href="{{url('/admin/checkout/do', $unsettled->id)}}" class="btn btn-sm btn-warning float-md-right"> تایید </a>
                        </td>

                    </tr>
                    @endforeach

                </tbody>



            </table>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

@endsection
