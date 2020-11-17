@extends('admin.dashboard')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class=" col-md-10 m-auto">
                <h6 class="mb-3">ویرایش تامین کننده </h6>
                <form action="{{url('/admin/producer/update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$producer->id}}">
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-2 col-form-label">نام*</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="postTitle"
                                   name="name"
                                   placeholder="نام  تامین کننده را وارد کنید" value="{{$producer->name}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-2 col-form-label">ایمیل*</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="postTitle"
                                   name="email"
                                   placeholder="ایمیل  تامین کننده را وارد کنید" value="{{$producer->email}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-2 col-form-label">شماره تلفن*</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="postTitle"
                                   name="phone"
                                   placeholder="شماره تلفن  تامین کننده را وارد کنید" value="{{$producer->phone}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-2 col-form-label">رمز عبور</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" id="postTitle"
                                   name="password"
                                   placeholder="رمز عبور  تامین کننده را وارد کنید" value="" >
                        </div>
                    </div>



                    <br>
                    <h7 class="mb-3">اطلاعات مالی</h7>
                    <hr>
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-2 col-form-label">نام بانک</label>
                        <div class="col-sm-7">
                            <input type="" class="form-control" id="postTitle"
                                   name="bank"
                                   placeholder="نام بانک را وارد کنید" value="{{$producer->bank}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-2 col-form-label">شماره حساب</label>
                        <div class="col-sm-7">
                            <input type="" class="form-control" id="postTitle"
                                   name="bank_account"
                                   placeholder="شماره حساب را وارد کنید" value="{{$producer->bank_account}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-2 col-form-label">شبا</label>
                        <div class="col-sm-7">
                            <input type="" class="form-control" id="postTitle"
                                   name="bank_shba"
                                   placeholder="شبا را وارد کنید" value="{{$producer->bank_shba}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-2 col-form-label">نام دارنده حساب</label>
                        <div class="col-sm-7">
                            <input type="" class="form-control" id="postTitle"
                                   name="bank_account_owner"
                                   placeholder="نام دارنده حساب را وارد کنید" value="{{$producer->bank_account_owner}}" required>
                        </div>
                    </div>




                    <input type="hidden" name="book_id" value="">
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-blue">ثبت</button>

                        </div>
                    </div>
                </form>
                <hr>



                <h4 class="mt-5">فروش های تامین کننده</h4>

                <div class="row mt-4" >
                    <h4 class="text-dark" style="font-family: Vazir; ">
                    </h4>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped text-center"  id="فروش">
                                <thead>
                                <tr>
                                    <th scope="col">ردیف</th>
                                    <th scope="col">نام محصول</th>
                                    <th scope="col">تعداد خرید شده</th>
                                    <th scope="col">قیمت کل</th>
                                    <th scope="col">تاریخ خرید</th>
                                    <th scope="col">وضعیت تسویه</th>
                                </tr>
                                </thead>
                                <tbody>

                                @php($i = 0)
                                @foreach($producer->producerSells()->orderBy('id','desc')->get() as $order)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <th>{{$order->book->name}}</th>
                                        <th>{{$order->count}}</th>
                                        <th>{{number_format($order->price)}}  تومان </th>
                                        @php($date = new \App\Http\Controllers\Util\Pdate())
                                        <th>{{$date->toPersian($order->created_at, 'Y/m/d')}}</th>
                                        @if($order->is_settled == 0)
                                        <th class="text-warning">تسویه حساب انجام نشده</th>
                                        @else
                                            <th class="text-success">تسویه حساب شده</th>
                                        @endif
                                    <tr>

                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>




            </div>

        </div>
    </div>
@endsection
