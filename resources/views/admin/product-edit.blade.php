@extends('admin.dashboard')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class=" col-md-12">
                <h6 class="mb-5">ویرایش محصول </h6>
                <form action="{{route('admin-book-edit')}}"  method="post"  enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="book_id" value="{{$book->id}}">
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-4 col-form-label">عنوان محصول یا خدمت*</label>
                        <div class="col-sm-7">
                            <input name="name" type="text" class="form-control" id="postTitle"
                                   placeholder="عنوان محصول را وارد کنید" value="{{$book->name}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <img src="{{asset($book->image_path)}}" style="height: 100px;width: 100px">
                        <div class="row">
                            <legend class="col-form-label col-sm-4   pt-0">تصویر* </legend>
                            <div class="col-sm-7">
                                <input type="file" name="image" accept="image/*" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="important" class="col-form-label col-sm-4 pt-0">انتخاب به عنوان مهم</label>
                            <div class="col-sm-7">
                                <input id="important" type="checkbox" name="is_important" @if($book->is_important == 1) checked @endif style="width: 15px;height: 15px"  />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="category" class="col-form-label col-sm-4 pt-0">دسته بندی*</label>

                            <div class="col-sm-7">
                                <select class="form-control" name="category_id" id="category" required>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($category->id == $book->category_id) selected @endif >{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="category" class="col-form-label col-sm-4 pt-0">فروشنده*</label>

                            <div class="col-sm-7">
                                <select class="form-control" name="producer_id" id="producer" required>
                                    <option value="0" @if($book->producer_id == 0)  selected @endif>دانشگاه شهید مدنی</option>
                                    @foreach($producers as $producer)
                                        <option value="{{$producer->id}}" @if($producer->id == $book->producer_id)  selected @endif> {{$producer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-4 pt-0">قیمت*</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="قیمت محصول را به تومان وارد کنید" type="number" value="{{$book->price}}" name="price" required/>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-4 pt-0">درصد تخفیف*</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="درصد تخفیف را وارد کنید" type="number" value="{{$book->discount_percent}}" name="discount_percent" required/>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-4 pt-0">تعداد*</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="تعداد موجودی" type="number" value="{{$book->stock}}" name="stock" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4">توضیحات محصول*</div>
                        <div class="col-sm-7">
                            <textarea name="description" class="form-control rtl "
                                      placeholder="توضیحات  را وارد کنید"
                                      rows="5" required>{{$book->description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        @if(strlen($book->demo_file) > 5)
                            <a href="{{$book->demo_file}}" download="">دانلود فایل ضمیمه</a>
                        @endif
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

            </div>
        </div>
    </div>
@endsection
