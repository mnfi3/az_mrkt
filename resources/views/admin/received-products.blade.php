@extends('admin.dashboard')
@section('admin_content')

    <!--MESSAGE MODAL-->
    <div class="container-fluid p-1 p-sm-2">
        <h6 class="alert alert-warning"><i class="fa fa-hourglass mr-1"></i>لیست محصولات در انتظار بررسی</h6>
        <div class="table-responsive"‍>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ردیف</th>
                    <th scope="col">عنوان</th>
                    <th scope="col">دسته بنده</th>
                    <th scope="col">تصویر</th>
                    <th scope="col">اطلاعات فروشنده</th>
                    <th scope="col">قیمت(تومان)</th>
                    <th scope="col">درصد تخفیف</th>
                    <th scope="col">تعداد</th>
                    <th scope="col">توضیحات</th>
                    <th scope="col" style="width: 140px">بررسی</th>
                </tr>
                </thead>
                <tbody>

                @php($i=0)
                @foreach($books as $book)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{$book->name}}</td>
                    <td>{{$book->category->name}}</td>
                    <td><a href="{{url('/').'/'.$book->image_path}}">مشاهده</a></td>
                    <td class="">
                        {{$book->producer->name}}
                    </td>
                    <td>{{number_format($book->price)}}</td>
                    <td>{{$book->discount_percent}}</td>
                    <td>{{$book->stock}}</td>
                    <td>{{$book->description}}</td>

                    <td class="d-flex flex-row justify-content-around">
                        <a href="{{url('/admin-books-new/accept', $book->id)}}" class="btn btn-sm btn-warning float-md-right"> تایید </a>
                        <a href="{{url('/admin-books-new/reject', $book->id)}}" class="btn btn-sm btn-danger mr-2"> رد </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

@endsection
