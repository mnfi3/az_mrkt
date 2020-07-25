@extends('admin.dashboard')
@section('admin_content')

    <!--MESSAGE MODAL-->
    <div class="container-fluid p-1 p-sm-2">

        <br>

        <h6 class="alert alert-success mt-5"><i class="fa fa-check mr-1"></i>لیست سفارشات تسویه نشده</h6>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ردیف</th>
                    <th scope="col">لیست محصولات</th>
                    <th scope="col">تعداد</th>
                    <th scope="col">قیمت کل</th>
                    <th scope="col">اطلاعات فروشنده</th>
                    <th scope="col" style="width: 140px">شماره حساب فروشنده</th>
                    <th scope="col" style="width: 140px">تسویه با فروشنده</th>


                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>

                        <td class="d-flex flex-column">

                                    macbook pro

                        </td>
                        <td >
                            1
                        </td>
                        <td class="">
                           10000
                        </td>
                        <td>
                            دانشگاه شهید مدنی
                        </td>



                        <td>
                            <h5 href="#" class="text-black text-center"> 768384949397 </h5>
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning float-md-right"> تایید </a>
                        </td>

                    </tr>

                </tbody>



            </table>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

@endsection
