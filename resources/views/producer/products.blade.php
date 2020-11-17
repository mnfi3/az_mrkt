@extends('producer.dashboard')
@section('admin_content')

    <div class="container-fluid p-1 p-sm-2">
        <h6 class="alert">لیست محصولات </h6>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ردیف</th>
                    <th scope="col"> محصول</th>
                    <th scope="col">تعداد موجودی</th>
                    <th scope="col">قیمت</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">ویرایش</th>
                </tr>
                </thead>
                <tbody>
                @php($i=0)
                @foreach($products as $product)
                    <tr style="font-size: 0.9rem">
                        <th scope="row">{{++$i}}</th>

                        <td class="d-flex flex-column">
                            {{$product->name}}
                        </td>
                        <td >
                            {{$product->stock}}
                        </td>
                        <td class="">
                            {{number_format($product->price)}} تومان
                        </td>

                        <td>
                            @if($product->status == \App\Book::KEY_STATUS_PENDING)
                                در انتظار بررسی توسط مدیریت
                            @elseif($product->status == \App\Book::KEY_STATUS_ACCEPTED)
                                تایید شده توسط مدیریت
                            @elseif($product->status == \App\Book::KEY_STATUS_REJECTED)
                                رد شده توسط مدیریت
                            @else
                                نا مشخص
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{url('/producer/product-edit', $product->id)}}">ویرایش</a>
                        </td>



                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <hr>





        <div class="row">
            <div class=" col-md-12">
                <h6 class="mb-5">محصول جدید</h6>
                <form action="{{url('/producer/product-add')}}"  method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-4 col-form-label">عنوان محصول </label>
                        <div class="col-sm-7">
                            <input name="name" type="text" class="form-control" id="postTitle"
                                   placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-4   pt-0">تصویر </legend>
                            <div class="col-sm-7">
                                <input type="file" name="image" accept="image/*" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="category" class="col-form-label col-sm-4 pt-0">دسته بندی</label>

                            <div class="col-sm-7">
                                <select class="form-control" name="category_id" id="category">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-4 pt-0">قیمت</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="قیمت را به تومان وارد کنید" type="number" name="price" required/>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-4 pt-0">درصد تخفیف</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="درصد تخفیف را وارد کنید" type="number" name="discount_percent" value="0" required/>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-4 pt-0">تعداد</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="تعداد موجودی" type="number" name="stock" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4">توضیحات </div>
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








    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

@endsection
