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
            <h1>
                User Profile
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">User profile</li>
            </ol>
        </section>
        <div class="content">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="{{ 'vendor/adminlte/dist/img/user4-128x128.jpg' }}" alt="User profile picture">
                            <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
                            <p class="text-muted text-center text-red">{{Auth::user()->point}}$</p>
                            <p class="text-success text-center">
                                {{ URL::to('/register?email_referral='.Auth::user()->email) }}
                                <br><br>
                                <button onclick="copyTextToClipboard('{{url('/')}}/register?email_referral={{ Auth::user()->email }}');"
                                        class="btn btn-success btn-min-width btn-glow mr-1 mb-0">{{__('Copy clipboard')}}</button>
                            </p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#activity" data-toggle="tab">Packages</a></li>
                            <li><a href="#timeline" data-toggle="tab">History</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-green"><i class="fa fa-rocket"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Các gói robot</span>
                                                <span class="info-box-number">{{ $packageQuantity }}</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-yellow"><i class="fa fa-slideshare"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Lợi Nhuận Gói</span>
                                                <span class="info-box-number">{{ $packageSumBonus }}$</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-red"><i class="fa fa-cube"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Hoa Hồng affiliate</span>
                                                <span class="info-box-number">{{ $affiliateSum }}$</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="timeline">
                                <div class="content">
                                    <table class="table table-striped table-vcenter table-bordered data-table">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Price</th>
                                            <th>Reason</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $histories as $history )
                                            <tr>
                                                <td class="font-w600">{{ $history->created_at->format('d/m/Y') }}</td>
                                                <td class="font-w600">{{ $history->price == 0 ? '#' : '+'.$history->price }}</td>
                                                <td class="font-w600">{{ $history->reason }} {{ $history->user_ref_id == 0 ? '' : 'từ ' . $history->userRef->email }} </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-info btn-min-width btn-glow mr-1 mb-0" style="height: 60px;width: 100%">{{__('RÚT TIỀN')}}</button>
                </div>
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
