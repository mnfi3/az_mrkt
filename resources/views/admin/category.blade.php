@extends('admin.dashboard')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class=" col-md-10 m-auto">
                <h6 class="mb-3">ثبت دسته بندی جدید</h6>
                <form action="{{url('/admin/category/add')}}" method="post" >
                    @csrf
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-2 col-form-label">عنوان</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="postTitle"
                                   name="name"
                                   placeholder="عنوان دسته بندی را وارد کنید" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-blue">ثبت</button>

                        </div>
                    </div>
                </form>



                <h4 class="mt-5">همه دسته بندی ها</h4>

                <div class="row mt-4" >
                    <h4 class="text-dark" style="font-family: Vazir; ">
                    </h4>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped text-center"  id="فروش">
                                <thead>
                                <tr>
                                    <th scope="col">ردیف</th>
                                    <th scope="col">نام دسته بندی</th>
                                    <th scope="col">ویرایش</th>
                                    <th scope="col"> حذف</th>
                                </tr>
                                </thead>
                                <tbody>

                                @php($i=0)
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <th>{{$category->name}}</th>

                                        <td><a href="{{url('/admin/category/edit', $category->id)}}"> <button class="btn btn-warning float-md-right" >ویرایش</button> </a></td>
                                        <td>
                                            <form class="text-center float-right" action="{{url('/admin/category/remove')}}" method="post" onsubmit="return confirm('آیا از حذف  دسته بندی مطمئن هستید؟')">
                                                <input type="hidden" name="id" value="{{$category->id}}">
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
