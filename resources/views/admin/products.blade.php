@extends('admin.dashboard')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class=" col-md-12">
                <h6 class="mb-5">محصول جدید</h6>
                <form action="{{route('admin-book-insert')}}"  method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-4 col-form-label">عنوان محصول یا خدمت*</label>
                        <div class="col-sm-7">
                            <input name="name" type="text" class="form-control" id="postTitle"
                                   placeholder="عنوان محصول را وارد کنید" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-4   pt-0">تصویر* </legend>
                            <div class="col-sm-7">
                                <input type="file" name="image" accept="image/*" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="important" class="col-form-label col-sm-4 pt-0">انتخاب به عنوان مهم</label>
                            <div class="col-sm-7">
                                <input id="important" type="checkbox" name="is_important" style="width: 15px;height: 15px"  />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="category" class="col-form-label col-sm-4 pt-0">دسته بندی*</label>

                            <div class="col-sm-7">
                                <select class="form-control" name="category_id" id="category" required>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" >{{$category->name}}</option>
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
                                    <option value="0">دانشگاه شهید مدنی</option>
                                    @foreach($producers as $producer)
                                        <option value="{{$producer->id}}" >{{$producer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-4 pt-0">قیمت*</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="قیمت محصول را به تومان وارد کنید" type="number" name="price" required/>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-4 pt-0">درصد تخفیف*</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="درصد تخفیف را وارد کنید" type="number" value="0" name="discount_percent" required/>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-4 pt-0">تعداد*</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="تعداد موجودی" type="number" name="stock" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4">توضیحات محصول*</div>
                        <div class="col-sm-7">
                            <textarea name="description" class="form-control rtl "
                                      placeholder="توضیحات  را وارد کنید"
                                      rows="5" required></textarea>
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

            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="red-divider bg-danger" style="height: 2px"></div>
        <h3 class="mt-4">همه محصولات</h3>

        <form action="{{route('admin-books-search')}}" method="get" class="mt-2 text-center col-md-6  col-sm-12">
            @csrf
            <div class="form-group row mr-5 ">
                <div class="col-sm-8">
                    <input  name="text" type="text" class="form-control"
                            style="border: 1px solid green"
                            @if(!empty($search))
                            value="{{$search}}"
                            @endif
                            placeholder="بخشی از نام محصول را وارد کنید" >
                </div>
                <button type="submit" class="btn col-4 justify-content-center mr-4" style="background: #1c7430;color: white;max-width: 90px">جستجو</button>
            </div>
        </form>


        <div class="mt-1 d-flex flex-wrap">


            @foreach($books as $book)
                <div class="m-1 admin-book-container d-flex flex-column">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="admin-book-img-container">
                                <img src="{{asset($book->image_path)}}" alt="">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex justify-content-between align-items-center admin-book-card-header my-md-0">
                                <h6>{{$book->name}}</h6>
                                <span class="btn-sm course-price align-self-start ">{{number_format($book->price)}} تومان</span>
                            </div>
                            <p class="mt-2">
                            </p>
                        </div>
                    </div>
                    <div class="d-flex mt-3 justify-content-between align-items-center flex-wrap">
                        <span><i class="fal fa-books"></i> {{$book->stock}}</span>
                        @if($book->producer_id == 0)
                            <span><i class="fal fa-user"></i> دانشگاه شهید مدنی</span>
                        @else
                            <span><i class="fal fa-user"></i> {{$book->producer->name}}</span>
                        @endif
                        <a href="{{route('admin-book', $book->id)}}" class="btn btn-sm btn-blue"><i class="fal fa-cog mr-1 "></i>ویرایش محصول</a>
                    </div>
                </div>
            @endforeach





        </div>

        <div class="container" >
            <div class="d-flex justify-content-center">
                <div class="flex-item text-center mt-2" style="">
                    <nav aria-label="Page navigation example"  >
                        <ul class="pagination" >
                            {{$books->links()}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>


    </div>
@endsection
