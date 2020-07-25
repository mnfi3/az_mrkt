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
        <div style="background-color: #721c24; width: 100%; height: 1px" class="mt-3"></div>
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