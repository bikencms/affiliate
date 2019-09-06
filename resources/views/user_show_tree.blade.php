@extends('layouts.app')
@section('content')
    <style>
        @media
        only screen and (max-width: 760px),
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
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li>Quản lý người dùng</li>
            <li class="active">Quản lý mạng lưới</li>
        </ol>
        <br>
        <h4>
            QUẢN LÝ MẠNG LƯỚI
        </h4>
    </section>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-11">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <i class="fa fa-group"></i>

                            <h5 class="box-title"> DANH SÁCH CẤP DƯỚI CỦA BẠN</h5>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    <p>{{ \Session::get('success') }}</p>
                                </div><br/>
                            @endif
                            @if (\Session::has('warning'))
                                <div class="alert alert-warning">
                                    <p>{{ \Session::get('warning') }}</p>
                                </div><br/>
                            @endif

                        </div>
                        <div class="row">
                            <div id="treeBroker"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.7/themes/default/style.min.css" />
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.7/jstree.min.js"></script>
<script>

    var data = [

        @foreach($trees as $key => $tree)
        {
            "id": "{{$tree->email}}",
            "parent": "{{ $key == 0 ? '#' : $tree->email_referral }}",
            "text": "{{ $tree->email }}",
            "icon": "http://onichub.local/avatar/default_avatar_tree.png",
            'state' : {'opened': true, {{ ($tree->email == $user->email ? "selected: true" : "") }}}
        },
        @endforeach
    ];
    $('#treeBroker').jstree({
        'core': {
            'data': data
        }
    });
</script>
@endpush
