@extends('layouts.app')
@section('content')
    <div class="container-fluid py-4 my-2">
        <div class="card">
            <div class="card-header pb-3" style="background-color: #1d7b8a">
                <ul class="nav nav-tabs card-header-tabs d-flex justify-content-between">
                    <li  class="nav-item "><a id="adminCardNavOrders" class="nav-link text-white" href="{{route('admin-orders')}}">
                            <i class="fa fa-list mr-1"></i>
                            لیست سفارشات
                        </a>
                    </li>

                    <li  class="nav-item "><a id="adminCardNavBooks"  class="nav-link text-white" href="{{url('/admin/checkout')}}">
                            <i class="fa fa-money-bill  mr-1"></i>تسویه نشده ها
                        </a>
                    </li>





                    <li  class="nav-item "><a id="adminCardNavBooks"  class="nav-link text-white" href="{{route('admin-books')}}">
                            <i class="fa fa-books  mr-1"></i>محصولات
                        </a>
                    </li>

                    <li  class="nav-item "><a id="adminCardNavBooks"  class="nav-link text-white" href="{{route('admin-books-new')}}">
                            <i class="fa fa-books  mr-1"></i>محصولات جدید
                        </a>
                    </li>

                    <li  class="nav-item "><a id="adminCardNavBooks"  class="nav-link text-white" href="{{url('/admin/category')}}">
                            <i class="fa fa-badge  mr-1"></i> دسته بندی ها
                        </a>
                    </li>

                    <li  class="nav-item "><a id="adminCardNavBooks"  class="nav-link text-white" href="{{route('admin-discounts')}}">
                            <i class="fa fa-code  mr-1"></i>
                            کدهای تخفیف
                        </a>
                    </li>



                    <li class="nav-item"><a  id="adminCardNavSite"  class="nav-link text-white " href="{{url('/admin/producers')}}">
                            <i class="fa fa-person-dolly mr-1"></i>
                            فروشندگان
                        </a>
                    </li>


                    <li  class="nav-item "><a id="adminCardNavOrders" class="nav-link text-white" href="{{route('admin-orders-settlement')}}">
                            <i class="fa fa-coins mr-1"></i>
                            تسویه حساب
                        </a>
                    </li>





                    <li class="nav-item"><a  id="adminCardNavSite"  class="nav-link text-white " href="{{url('/admin/sales/report')}}">
                            <i class="fa fa-print mr-1"></i>
                            گزارش فروش
                        </a>
                    </li>

                    <li class="nav-item"><a  id="adminCardNavSite"  class="nav-link text-white " href="{{route('admin-site')}}">
                            <i class="fa fa-info mr-1"></i>
                            اطلاعات سیستم
                        </a>
                    </li>


                    <li class="nav-item"><a  id="adminCardNavPass"  class="nav-link text-white " href="{{route('admin-change-password-page')}}">
                            <i class="fa fa-key mr-1"></i>
                            تغییر رمز
                        </a>
                    </li>




                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content bg-white">
                    <div id="info" class="tab-pane fade in active show">
                        @yield('admin_content')
                    </div>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
@endsection
