@extends('admin.dashboard')
@section('admin_content')

    <!--MESSAGE MODAL-->
    <div class="container-fluid p-1 p-sm-2">
        <h6 class="alert alert-warning"><i class="fa fa-hourglass mr-1"></i>لیست تسویه های انجام نشده</h6>
        <div class="table-responsive"‍>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ردیف</th>
                    <th scope="col">اطلاعات فروشنده</th>
                    <th scope="col">اعتبار فعلی (تومان)</th>
                    <th scope="col" style="width: 140px">شماره حساب </th>
                    <th scope="col" style="width: 140px">شماره شبا</th>
                    <th scope="col" style="width: 140px">بانک</th>
                    <th scope="col" style="width: 140px">نام دارنده حساب</th>
                    <th scope="col" style="width: 140px">تسویه با فروشنده</th>
                </tr>
                </thead>
                <tbody>

                @php($i=0)
                @foreach($producers as $producer)
                    @if($producer->sum == 0)
                        @continue
                    @endif
                <tr>
                    <th scope="row">{{++$i}}</th>

                    <td class="">
                       {{$producer->name}}
                    </td>
                    <td>{{number_format($producer->sum)}}</td>

                    <td>
                        {{$producer->bank_account}}
                    </td>
                    <td>
                        {{$producer->bank_shba}}
                    </td>
                    <td>{{$producer->bank}}</td>
                    <td>{{$producer->bank_account_owner}}</td>
                    <td class="d-flex flex-row justify-content-around">
                        <form action="{{url('/admin-settlement/do')}}" method="post" enctype="multipart/form-data" onsubmit="return confirm('آیا از مبلغ واریزی مطمئن هستید؟')">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$producer->id}}">
                            <input type="hidden" name="amount" value="{{$producer->sum}}">
                            <input type="hidden" name="time" value="{{$time}}">

                            <div class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-4 pt-0">   مستندات</legend>
                                    <div class="col-sm-7">
                                        <input type="file" name="document"  />
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-sm btn-warning float-md-right"> ثبت واریزی </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <h6 class="alert alert-success mt-5"><i class="fa fa-thumbs-up mr-1"></i>لیست تسویه های انجام شده</h6>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ردیف</th>
                    <th scope="col">اطلاعات فروشنده</th>
                    <th scope="col">مبلغ واریز شده (تومان)</th>
                    <th scope="col">تاریخ واریز</th>
                    <th scope="col" style="width: 140px">شماره حساب </th>
                    <th scope="col" style="width: 140px">شماره شبا</th>
                    <th scope="col" style="width: 140px">بانک</th>
                    <th scope="col" style="width: 140px">نام صاحب حساب</th>
                    <th scope="col" style="width: 140px">مستندات</th>
                </tr>
                </thead>
                <tbody>

                @php($i=0)
                @foreach($settlements as $settlement)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td class="">
                        {{$settlement->producer->name}}
                    </td>
                    <td>
                        {{number_format($settlement->amount)}}
                    </td>
                    @php($date = new \App\Http\Controllers\Util\Pdate())
                    <td class="">
                       {{$date->toPersian($settlement->created_at, 'Y/m/d')}}
                    </td>
                    <td>
                        {{$settlement->bank_account}}
                    </td>
                    <td>
                        {{$settlement->bank_shba}}
                    </td>
                    <td>{{$settlement->bank}}</td>
                    <td>{{$settlement->bank_account_owner}}</td>

                    <td>
                        @if(strlen($settlement->document) > 0)
                            <a class="btn btn-primary" href="{{url('/').'/'.$settlement->document}}">دانلود</a>
                        @endif
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
