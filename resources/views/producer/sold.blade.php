@include('producer.dashboard')
@section('admin_content')

    <div class="container-fluid p-1 p-sm-2">
        <h6 class="alert alert-warning"><i class="fa fa-hourglass mr-1"></i>لیست سفارشات ارسال نشده</h6>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ردیف</th>
                    <th scope="col"> محصولات</th>
                    <th scope="col">تعداد</th>
                    <th scope="col">قیمت کل</th>
{{--                    <th scope="col">درخواست تسویه حساب</th>--}}
                </tr>
                </thead>
                <tbody>
                    <tr style="font-size: 0.9rem">
                        <th scope="row">1</th>

                        <td class="d-flex flex-column">
                            سانتریفیوژ نیروگاه هسته ای
                        </td>
                        <td >
                            ۵۰۰۰
                        </td>
                        <td class="">
                            ۵۰۰۰۰۰
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <hr>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

@endsection
