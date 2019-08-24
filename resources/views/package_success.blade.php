@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Package
            <small>Thank you</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li>Package</li>
            <li class="active">Thank you</li>
        </ol>
    </section>
    <section class="content">
        <div class="container">
            @if(Session::has('flash_order_message'))
            <?php
            $package = json_decode(Session::get('flash_package'));
            ?>
            <div class="callout callout-info">
                <h4>Chúc mừng tài khoản {{ Auth::user()->name }} đã mua thành công!</h4>
                <p>Tên sản phẩm : {{ $package->name }}</p>
                <p>Giá : {{ $package->price }}$</p>
                <p>Mã đơn hàng: {{ Session::get('flash_order_id') }}</p>
                <p>Bạn vui lòng chuyển tiền vào tài khoản bên dưới để chúng tôi kích hoạt dịch vụ cho bạn.</p>
                <ul>
                    <li>Ngân hàng: &nbsp;&nbsp;&nbsp; <strong>Vietcombank</strong></li>
                    <li>Tên tài khoản: <strong>Phạm Công Minh</strong></li>
                    <li>Số tài khoản: &nbsp; <strong>0071000716482</strong></li>
                    <li>Chi nhánh: &nbsp;&nbsp;&nbsp;&nbsp; <strong>Hồ Chí Minh</strong></li>
                </ul>
            </div>
            @endif
            @php
                Session::forget('flash_order_message');
                Session::forget('flash_package');
                Session::forget('flash_order_id');
            @endphp
        </div>
    </section>
@endsection
