@extends('producer.dashboard')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class=" col-md-12">
                <h6 class="mb-5">محصول جدید</h6>
                <form action="{{route('admin-book-insert')}}"  method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-4 col-form-label">عنوان محصول یا خدمت</label>
                        <div class="col-sm-7">
                            <input name="name" value="{{$product->name}}" type="text" class="form-control" id="postTitle"
                                   placeholder="عنوان  را وارد کنید" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-4   pt-0">تصویر </legend>
                            <div class="col-sm-7">
                                <input type="file" name="image" accept="image/*" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="category" class="col-form-label col-sm-4 pt-0">دسته بندی</label>

                            <div class="col-sm-7">
                                <select class="form-control" name="category_id" id="category">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($product->category_id == $category->id) selected @endif>{{$category->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-4 pt-0">قیمت</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="قیمت را به تومان وارد کنید" type="number" name="price" value="{{$product->price}}" required/>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-4 pt-0">درصد تخفیف</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="درصد تخفیف را وارد کنید" type="number" name="discount_percent" value="{{$product->discount_percent}}" required/>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-4 pt-0">تعداد</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="تعداد موجودی" type="number" name="stock" value="{{$product->stock}}" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4">توضیحات </div>
                        <div class="col-sm-7">
                            <textarea name="description" class="form-control rtl "
                                      placeholder="توضیحات  را وارد کنید"
                                      rows="5" required>{{$product->description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-4 pt-0">   ضمیمه</legend>
                            <div class="col-sm-7">
                                <input type="file" name="demo_file" accept="application/pdf" />
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-lg btn-success">ثبت </button>
                        </div>
                    </div>
                </form>


                <form action="{{url('/producer/product-remove')}}" method="post" onsubmit="return confirm('آیا از حذف  محصول مطمئن هستید؟')">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-lg btn-danger">حذف </button>
                        </div>
                    </div>
                </form>


            </div>
        </div>

    </div>


@endsection
