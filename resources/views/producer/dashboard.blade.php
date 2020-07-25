@extends('layouts.app')
@section('content')
    <div class="container-fluid py-4 my-2">
        <div class="card">
            <div class="card-header pb-3" style="background-color: #1d7b8a">
                <ul class="nav nav-tabs card-header-tabs d-flex justify-content-between">
                    <li  class="nav-item "><a id="adminCardNavOrders" class="nav-link text-white" href="{{url('/producer/sold')}}">
                            <i class="fa fa-list mr-1"></i>
                            لیست فروش
                        </a>
                    </li>

                    <li class="nav-item"><a  id="adminCardNavPass"  class="nav-link text-white " href="{{url('/producer/change-pass')}}">
                            <i class="fa fa-key mr-1"></i>
                            تغییر رمز
                        </a></li>
                    <li class="nav-item"><a  id="adminCardNavSite"  class="nav-link text-white " href="{{url('/producer/report')}}">
                            <i class="fa fa-print mr-1"></i>
                            گزارش فروش
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
