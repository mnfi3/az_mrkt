@extends('admin.dashboard')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class=" col-md-10 m-auto">
                <h6 class="mb-3">ویرایش دسته بندی </h6>
                <form action="{{url('/admin/category/update')}}" method="post" >
                    @csrf
                    <input type="hidden" name="id" value="{{$category->id}}">
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-2 col-form-label">عنوان</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="postTitle"
                                   name="name"
                                   placeholder="عنوان دسته بندی را وارد کنید" value="{{$category->name}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-blue">ثبت تغییرات</button>

                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection
