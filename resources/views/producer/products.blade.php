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

                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <hr>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

@endsection
