<?php session()->keep(['flash_point', 'flash_user_bank', 'flash_name_bank', 'flash_account_bank']); ?>
@extends('layouts.app')
@section('content')
    <style>
        @media only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px) {
            .table {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch !important;
            }

            .row {
                width: 100%;
                display: block;
                margin-right: 0;
                margin-left: 0;
            }

            .container {
                padding-right: 0;
                padding-left: 0;
            }

            .col-sm-12 {
                padding-right: 0;
                padding-left: 0;
            }

            .content {
                padding-left: 0;
                padding-right: 0;
            }
        }
    </style>
    @if(Session::has('flash_withdraw_message'))
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Hoàn tất rút tiền Inc.
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    Người Nhận Thanh Toán
                    <address>
                        <strong>{{ Session::get('flash_user_bank') }}</strong><br>
                        Số tài khoản: {{ Session::get('flash_account_bank') }}<br>
                        Chi Nhánh: {{ Session::get('flash_name_bank') }}<br>
                        Số tiền: {{ Session::get('flash_point') }}$<br>
                        Nội Dung: Rút tiền hoa hồng.
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Số tiền: {{ Session::get('flash_point') }}$</b><br>
                    <br>
                    <b>Thông tin tài khoản:</b> <br>
                    <address>
                        <strong>{{Auth::user()->name}}</strong><br>
                        Phone: {{Auth::user()->phone}}<br>
                        Email: {{Auth::user()->email}}
                    </address>
                </div>
                <!-- /.col -->
            </div>
            <!-- this row will not appear when printing -->

            <div class="row">
                <div class="col-sm-12">
                    @if (\Session::has('flash_withdraw_message'))
                        <p class="text-success">Khớp lệnh thành công!</p>
                    @endif
                </div>
            </div>
            <div class="row no-print">
                <div class="col-xs-12">
                    <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> In</a>
                    <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Cảm ơn !
                    </button>
                    <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                        <i class="fa fa-download"></i> Xem Độ tin cậy
                    </button>
                </div>
            </div>
    </section>
    @endif
    <!-- /.content -->
@endsection
