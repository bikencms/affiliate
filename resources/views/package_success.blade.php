@extends('layouts.app')
@section('content')
    <style>
        table thead tr th {
            background: #00c0ef;
        }
    </style>
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
                <h2 class="text-center text-uppercase">VUI LÒNG HOÀN TẤT GIAO DỊCH</h2>
                <h4>Chào {{ Auth::user()->name }}!</h4>
                <h4>Bạn vừa thực hiện giao dịch Thuê Robot của chúng tôi</h4>
                <h4>Thông tin gói Robot</h4>
                <table class="table table-striped table-vcenter table-bordered">
                    <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên gói</th>
                        <th>Giá</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="font-w600">{{ Session::get('flash_order_id') }}</td>
                        <td class="font-w600">{{ $package->name }} </td>
                        <td class="font-w600">{{ $package->price }}$</td>
                    </tr>
                    </tbody>
                </table>
                <h4>Tổng số tiền phải thanh toán: <strong>{{ $package->price }}$</strong></h4>
                <h4>Để Hoàn tất giao Dịch Vui Lòng Chuyển Khoản Tới Ví của chúng tôi với nội
                    dung: {{ Auth::user()->name }} thuê {{$package->name}} giá {{ $package->price }}$</h4>
                <h4>Sau 5 - 10 Phút Chúng tôi sẽ kích hoạt gói cước của bạn.
                    <span class="text-red">Đội kỹ thuật sẽ chủ động liên hệ với bạn trong 30 phút để hỗ trợ bạn vui lòng chúng ý điện thoại và bảo đảm số điện thoại  bạn cung cấp ở  phẩn thông tin là chỉnh xác</span>
                </h4>
                <h4>THÔNG TIN CHUYỂN KHOẢN</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="box box-widget widget-user-2">
                            <div class="widget-user-header bg-aqua">
                                <h3 class="text-center">VIETCOMBANK</h3>
                                <h3>STK: 0091000598211 (Nguyen Van Phú)</h3>
                                <h3>Chi nhánh: Hà Nội</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box box-widget widget-user-2">
                            <div class="widget-user-header bg-aqua">
                                <h3 class="text-center">BIDV</h3>
                                <h3>STK: 31410002475090 (Nguyen Van Phu)</h3>
                                <h3>Chi nhánh: Hà Nội</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box box-widget widget-user-2">
                            <div class="widget-user-header bg-aqua">
                                <h3 class="text-center">ACB</h3>
                                <h3>STK: 259675979 (Nguyen Van Phu)</h3>
                                <h3>Chi nhánh: Hà Nội</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <h5>Cám ơn quý khách đã sử dụng dịch vụ.</h5>
                <h5>Thông tin hỗ trợ dịch vụ:</h5>
                <h5>Email: support@gmail.com  Hotline: 1900-xxx  (ext 1)</h5>
            @endif
            @php
                Session::forget('flash_order_message');
                Session::forget('flash_package');
                Session::forget('flash_order_id');
            @endphp
        </div>
    </section>
@endsection
