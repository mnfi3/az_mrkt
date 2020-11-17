@extends('admin.dashboard')
@section('admin_content')
    <div class="container pb-5">
       <div class="row ">
           <div class="col-md-12 ">
               <h4 class="text-dark" style="font-family: Vazir; ">
                   پشتیبان گیری از سیستم :
               </h4>
               <br>
               <a href="{{route('admin-backup')}}" class="btn btn-danger"> دریافت فایل پشتیبان </a>
                   <span class="text-dark mr-2" style="font-family: Vazir; font-size: 1.0rem">
                                (توجه : ممکن است لحظاتی طول بکشد!)
                   </span>
           </div>

       </div>

        <br>
        <hr>


        <div class="row mt-4">
            <div class="col-md-4">
                <h5 class="mt-2">آدرس :</h5>
                <form action="{{url('/admin-site/update-footer')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-11">
                            <textarea type="text" style="width: 290px;height: 190px" class="form-control" id="postTitle"
                                      name="address"
                                      placeholder="آدرس را وارد کنید" value="" required>{{$address}}</textarea>
                        </div>
                    </div>


                <h5 class="mt-2">اطلاعات کارشناس :</h5>
                    <div class="form-group row">
                        <div class="col-sm-11">
                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="manager"
                                   placeholder="نام کارشناس" value="{{$manager}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-11">
                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="direct_phone"
                                   placeholder="شماره تماس مستقیم" value="{{$direct_phone}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-11">
                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="internal_phone"
                                   placeholder="شماره تماس داخلی" value="{{$internal_phone}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-11">
                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="email"
                                   placeholder="ایمیل" value="{{$email}}" required>
                        </div>
                    </div>


                <h5 class="mt-2"> لینک های مفید :</h5>
                    <div class="form-group row">
                        <div class="col-sm-11">
                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="link1_title"
                                   placeholder="نام لینک اول" value="{{$link1_title}}" required>

                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="link1"
                                   placeholder="لینک اول" value="{{$link1}}" required>

                        </div>


                    </div>
                    <div class="form-group row">
                        <div class="col-sm-11">
                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="link2_title"
                                   placeholder="نام لینک دوم" value="{{$link2_title}}" required>

                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="link2"
                                   placeholder="لینک دوم" value="{{$link2}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-11">
                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="link3_title"
                                   placeholder="نام لینک سوم" value="{{$link3_title}}" required>

                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="link3"
                                   placeholder="لینک سوم" value="{{$link3}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-blue">ثبت</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <br>
        <div style="width: 100%;height: 2px;background-color: #1b9abd;margin-top: 10px" class=""></div>



        <div class="row mt-4" >
            <h4 class="text-dark" style="font-family: Vazir; ">
                لیست همه کاربران :
            </h4>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ردیف</th>
                            <th scope="col">نام</th>
                            <th scope="col">ایمیل</th>
                            <th scope="col">شماره تلفن</th>
                            <th scope="col">حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=0)
                        @foreach($users as $user)
                            <tr>
                                <th>{{++$i}}</th>
                                <td>{{$user->name}} </td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td><a href="{{route('admin-user-remove', $user->id)}}" class="btn btn-sm btn-danger">حذف</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection