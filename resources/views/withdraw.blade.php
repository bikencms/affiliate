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
    <section class="content">
        <section class="content-header">
            <h4>
                THÔNG TIN NGƯỜI DÙNG
            </h4>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
                <li class="active">Thông Tin</li>
            </ol>
        </section>
        <div class="content">
            <!-- Thống kê use -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="fa fa-recycle"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Gói robot</span>
                            <span class="info-box-number">{{ $packageQuantity }}</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                    Đang Hoạt động
                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="fa fa-share-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Lợi Nhuận Trên sàn</span>
                            <span class="info-box-number">#</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                    Đang Cập nhật
                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="fa fa-money"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Hoa Hồng</span>
                            <span class="info-box-number">{{ $affiliateSum }}$</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                    Lợi tức trọn đời
                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Đã Thanh toán</span>
                            <span class="info-box-number">41,410$</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                    Số liệu Toàn hệ thống
                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
            <!-- Phần avatar và thông tin  -->
            <div class="row">
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-yellow">
                            <div class="widget-user-image">
                                <img class="img-circle" src="{{ 'vendor/adminlte/dist/img/user4-128x128.jpg' }}"
                                     alt="User profile picture">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">{{Auth::user()->name}}</h3>
                            <h6 class="widget-user-desc">THÀNH VIÊN MỚI</h6>
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                <li><a href="#"><b>Số dư hiện có: </b> <span class="badge bg-blue">{{ \Auth::user()->point }}
                                            $</span></a></li>
                                <li><a href="#"><b>Rút tiền : </b> <span
                                                class="badge bg-green"> Đang hoạt động</span></a></li>
                                <li><a href="#"><b>Giới hạn rút: </b> <span class="badge bg-red">50$</span></a></li>
                                <li><a href="#"><b>Link giới thiệu: </b>
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#modal-warning">
                                            Lấy Link
                                        </button>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal modal-warning fade" id="modal-warning">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Link giới thiệu của bạn</h4>
                                </div>
                                <div class="modal-body">
                                    <p class="text-success text-center">
                                        {{ URL::to('/register?email_referral='.Auth::user()->email) }}
                                        <br><br>
                                        <button onclick="copyTextToClipboard('{{url('/')}}/register?email_referral={{ Auth::user()->email }}');"
                                                class="btn btn-success btn-min-width btn-glow mr-1 mb-0">{{__('Copy clipboard')}}</button>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
                                    </button>
                                    <button type="button" class="btn btn-outline">Xem Thêm</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <!-- /.widget-user -->
                </div>
                <!-- /.Phần avatar và thông tin  -->

                <!-- Phần Thông báo Admin  -->
                <div class="col-md-8">
                    <p>
                        <a href="https://www.exness.com/a/ukc699pc">
                            <img src="https://www.exness.com/media/banners/vi/static/728x90_VI_Withdrawal_Instant_Wallet_StandardBlue.png"
                                 width="100%" height="auto"/>
                        </a>
                    </p>
                    <!-- Box Comment -->
                    <div class="box box-widget">
                        <div class="box-header with-border">
                            <div class="user-block">
                                <h2>hông tin tài khoản</h2>
                            </div>
                            <!-- /.user-block -->
                            <div class="box-tools">
                                <button type="button" class="btn btn-box-tool" data-toggle="tooltip"
                                        title="Mark as read">
                                    <i class="fa fa-circle-o"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                        </div>
                    </div>
                    <!-- /.Phần Thông báo Admin  -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Lịch sử Rút Tiền</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-striped table-vcenter table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Ngày Tháng</th>
                                    <th>Số Tiền</th>
                                    <th>Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="font-w600">08/2019</td>
                                    <td class="font-w600">300$</td>
                                    <td class="font-w600">
                                        Đang chờ...
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
            </div>
    </section>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('.data-table').DataTable({"responsive": true});
    });
</script>
@endpush
