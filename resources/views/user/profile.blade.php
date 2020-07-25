@extends('user.dashboard')
@section('user_content')
    <div class="container p-1 p-sm-3">
        <h6 class="alert alert-info">کاربر گرامی مشخصات دقیق آدرس خود را یکبار ثبت کنید.</h6>
    <form action="">
        <h6></h6>
        <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">آدرس: </label>
            <div class="col-sm-8">
                                    <textarea type="text" class="form-control" rows="5" id="address"
                                              placeholder="آدرس دقیق خود را وارد کنید" required></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">شماره تلفن همراه: </label>
            <div class="col-sm-8">
                <input type="number" class="form-control" rows="5" id="address"
                       placeholder="مثال: 09140000000" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">کد پستی:</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" rows="5" id="address"
                       placeholder="مثال: 00000-11111" required>
            </div>
        </div>

        <div class="form-group row">
            <button type="submit" class="btn btn-info mt-2 ml-2 col-sm-2">ویرایش</button>
            <div class="col-sm-8">

            </div>
        </div>


    </form>
    </div>
@endsection