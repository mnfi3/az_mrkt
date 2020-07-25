@extends('admin.dashboard')
@section('admin_content')
    <div class="container pb-5">
        <br>
        <div style="background-color: #721c24; width: 100%; height: 1px" class="mt-3"></div>
        <div class="row mt-4" >
            <h4 class="text-dark" style="font-family: Vazir; ">
                لیست کدهای تخفیف :
            </h4>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ردیف</th>
                            <th scope="col">کد</th>
                            <th scope="col">درصد</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=0)
                        @foreach($discounts as $discount)
                            <tr>
                                <th>{{++$i}}</th>
                                <td>{{$discount->code}} </td>
                                <td>{{$discount->percent}}</td>
                                <td><a href="{{route('admin-discount-remove', $discount->id)}}" class="btn btn-sm btn-danger">حذف</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <div class="col-xl-6">
            <h6>افزودن کد تخفیف</h6>
            <form class="mt-5" method="post" action="{{route('admin-discount-add')}}" onsubmit="return confirm('آیا از افزودن کد تخفیف مطمئن هستید؟')">
                @csrf
                <div class="form-group row">
                    <label for="oldPassword" class="col-sm-4 col-form-label">کد</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="oldPassword" name="code"
                               placeholder="مثال:norouz" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="oldPassword" class="col-sm-4 col-form-label">درصد تخفیف</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="oldPassword" name="percent"
                               placeholder="مثال:20" required>
                    </div>
                </div>


                <input type="submit" class="btn btn-info" value="ثبت">
            </form>

        </div>



    </div>
@endsection