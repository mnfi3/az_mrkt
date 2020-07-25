@extends('layouts.app')
@section('content')
    <div class="container py-4 my-2">
        <div class="card">
            <div class="card-header bg-blue-one pb-3  ">
                <ul class="nav nav-tabs card-header-tabs d-flex justify-content-between">
                    {{--<li  class="nav-item "><a id="userCardNavProfile" class="nav-link text-white" href="{{route('user-profile')}}">--}}
                            {{--<i class="fa fa-user mr-1"></i>--}}
                            {{--پروفایل--}}
                        {{--</a>--}}
                    {{--</li>--}}

                    <li  class="nav-item "><a id="userCardNavCart"  class="nav-link text-white" href="{{route('user-cart')}}">
                            <i class="fa fa-shopping-basket  mr-1"></i>
                            سبد خرید من
                        </a>
                    </li>
                    <li class="nav-item"><a  id="userCardNavOrders"  class="nav-link text-white " href="{{route('user-orders')}}">
                            <i class="fa fa-shopping-cart mr-1"></i>
                                سفارشات من
                        </a>
                    </li>


                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content bg-white">
                    <div id="info" class="tab-pane fade in active show">
                        @yield('user_content')
                    </div>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
@endsection