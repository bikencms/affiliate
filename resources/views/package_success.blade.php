@extends('layouts.app')
@section('content')
    <style>
        table thead tr th {
            background: #00c0ef;
        }
    </style>
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ </a></li>
            <li>Thuê robot</li>
            <li class="active">Hoàn tất đơn hàng</li>
        </ol>
        <br>
        <h4>
            HOÀN TẤT ĐƠN HÀNG
            <small>Thanh toán</small>
        </h4>
    </section>
    
    <!-- Main content -->
    <section class="invoice">
         @if(Session::has('flash_order_message'))
                <?php
                $package = json_decode(Session::get('flash_package'));
                ?>
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Hoàn tất đơn hàng Inc.
            <small class="pull-right">Vừa xong</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Người Thanh Toán
          <address>
            <strong>{{Auth::user()->name}}</strong><br>
            Phone: (804) 123-5432<br>
            Email: info@almasaeedstudio.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Người Nhận Thanh Toán
          <address>
            <strong>Nguyễn Văn Phú</strong><br>
            số tài khoản: 0091000598211<br>
            Chi Nhánh: Vietcombank Hà nội<br>
            Nội Dung: {{ Auth::user()->name }} thue {{$package->name}}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Mã Đơn hàng:  {{ Session::get('flash_order_id') }}</b><br>
          <br>
          <b>Tên gói:</b> {{ $package->name }} <br>
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12">
          <table class="table table-striped">
            <thead>
            <tr>
            <th>Tt</th>
              <th>Mã đơn hàng</th>
              <th>Tên Gói</th>
              <th> Giá Tiền</th>
              
            </tr>
            </thead>
            <tbody>
            <tr>
                         <td class="font-w600"> 01</td>
                         <td class="font-w600">{{ Session::get('flash_order_id') }}</td>
                        <td class="font-w600">{{ $package->name }} </td>
                        <td class="font-w600">{{ $package->price }}$</td>
            </tr>
            
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">CHÚ Ý THANH TOÁN:</p>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            NHẬN ĐƯỢC THANH TOÁN Chúng tôi sẽ kích hoạt gói cước của bạn sau 5 - 10 phút. Đội kỹ thuật sẽ chủ động liên hệ với bạn trong 30 phút để hỗ trợ bạn vui lòng chú ý điện thoại và bảo đảm số điện thoại  bạn cung cấp ở  phẩn thông tin là chỉnh xác										
          </p>
         
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">TỔNG ĐƠN HÀNG</p>
          <div class="margin">
            <table class="table">
              <tr>
                <th style="width:50%">Giá Thuê:</th>
                <td>{{ $package->price }}$</td>
              </tr>
              <tr>
                <th>Tax</th>
                <td>$0.00</td>
              </tr>
              <tr>
                <th>Phí Phát sinh:</th>
                <td>$0.00</td>
              </tr>
              <tr>
                <th>Phải Thanh toán:</th>
                <td><b>{{ $package->price }}$<b></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> In</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i>  Cảm ơn !
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Xem Độ tin cậy 
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    
    
        </div>
    </section>
@endsection
@endif
            @php
                Session::forget('flash_order_message');
                Session::forget('flash_package');
                Session::forget('flash_order_id');
            @endphp
