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
            <div class="row">
                @if(Session::has('flash_order_message'))
                    <h2 class="page-header text-success">Bạn vui lòng chuyển tiền vào tài khoản bên dưới để chúng tôi kích hoạt dịch vụ cho bạn.</h2>
                    <div class="col-md-8">
                        <div class="box box-widget widget-user-2">
                            <div class="widget-user-header bg-yellow">
                                <h3 class="widget-user-username">Ngân hàng Vietcombank</h3>
                                <h3 class="widget-user-username">Tên tài khoản: Phạm Công Minh</h3>
                                <h3 class="widget-user-username">Số tài khoản: 0071000716482</h3>
                                <h3 class="widget-user-username">Chi nhánh: Hồ Chí Minh</h3>
                            </div>
                        </div>
                    </div>
                @endif
                @php
                    Session::forget('flash_order_message');
                @endphp
            </div>
        </div>
    </section>
@endsection
