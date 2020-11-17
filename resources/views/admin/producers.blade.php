@extends('admin.dashboard')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class=" col-md-10 m-auto">
                <h6 class="mb-3">ثبت تامین کننده جدید</h6>
                <form action="{{url('/admin/producer/add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-2 col-form-label">نام*</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="postTitle"
                                   name="name"
                                   placeholder="نام  تامین کننده را وارد کنید" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-2 col-form-label">ایمیل*</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="postTitle"
                                   name="email"
                                   placeholder="ایمیل  تامین کننده را وارد کنید" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-2 col-form-label">شماره تلفن*</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="postTitle"
                                   name="phone"
                                   placeholder="شماره تلفن  تامین کننده را وارد کنید" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-2 col-form-label">رمز عبور*</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" id="postTitle"
                                   name="password"
                                   placeholder="رمز عبور  تامین کننده را وارد کنید" value="" required>
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
                                   placeholder="نام بانک را وارد کنید" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-2 col-form-label">شماره حساب</label>
                        <div class="col-sm-7">
                            <input type="" class="form-control" id="postTitle"
                                   name="bank_account"
                                   placeholder="شماره حساب را وارد کنید" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-2 col-form-label">شبا</label>
                        <div class="col-sm-7">
                            <input type="" class="form-control" id="postTitle"
                                   name="bank_shba"
                                   placeholder="شبا را وارد کنید" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-2 col-form-label">نام دارنده حساب</label>
                        <div class="col-sm-7">
                            <input type="" class="form-control" id="postTitle"
                                   name="bank_account_owner"
                                   placeholder="نام دارنده حساب را وارد کنید" value="" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-blue">ثبت</button>

                        </div>
                    </div>
                </form>
                <hr>



                <h4 class="mt-5">همه تامین کنندگان</h4>

                <div class="row mt-4" >
                    <h4 class="text-dark" style="font-family: Vazir; ">
                    </h4>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped text-center"  id="فروش">
                                <thead>
                                <tr>
                                    <th scope="col">ردیف</th>
                                    <th scope="col">نام</th>
                                    <th scope="col">ایمیل</th>
                                    <th scope="col">شماره تلفن</th>
                                    <th scope="col">مشاهده</th>
                                    <th scope="col"> حذف</th>
                                </tr>
                                </thead>
                                <tbody>

                                @php($i = 0)
                                @foreach($producers as $producer)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <th>{{$producer->name}}</th>
                                    <th>{{$producer->email}}</th>
                                    <th>{{$producer->phone}}</th>

                                    <td><a href="{{url('/admin/producer-edit', $producer->id)}}"> <button class="btn btn-warning float-md-right" >مشاهده و ویرایش</button> </a></td>
                                    <td>
                                        <form class="text-center float-right" action="{{url('/admin/producer/remove')}}" method="post" onsubmit="return confirm('آیا از حذف  فروشنده مطمئن هستید؟')">
                                            <input type="hidden" name="id" value="{{$producer->id}}">
                                            <input type="submit" class="btn btn btn-danger" value="حذف ">
                                            @csrf
                                        </form>

                                    </td>
                                </tr>
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
