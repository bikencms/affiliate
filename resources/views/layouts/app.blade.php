<?php
use App\Models\RoleUser;
$isAdmin = 0;
if (isset(\Auth::user()->id)) {
    $role_user = RoleUser::where([['user_id', '=', \Auth::user()->id], ['role_id', '=', 1]])->first();
    if (count((array)$role_user) > 0) {
        $isAdmin = 1;
    }
}
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Hệ Thống Robot giao dịch ngoại hối | Robox-rfx.com</title>
    <link rel="shortcut icon" href="{{ asset('assets/image/logo.png') }}" type="image/x-icon" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/bower_components/bootstrap/less/component-animations.less') }}">
    <!-- Data Table -->
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- Data Table -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <style>
        #DataTables_Table_0_wrapper, #DataTables_Table_0_wrapper .row {
            display: inherit;
            flex-flow: inherit;
            align-items: inherit;
            width: 100%;
        }
        #DataTables_Table_1_wrapper, #DataTables_Table_1_wrapper .row {
            display: inherit;
            flex-flow: inherit;
            align-items: inherit;
            width: 100%;
        }
        .modal-confirm {
            color: #636363;
            width: 400px;
        }
        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 14px;
        }
        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }
        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -10px;
        }
        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -2px;
        }
        .modal-confirm .modal-body {
            color: #999;
        }
        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
            padding: 10px 15px 25px;
        }
        .modal-confirm .modal-footer a {
            color: #999;
        }
        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 9;
            text-align: center;
            border: 3px solid #82ce34;
        }
        .modal-confirm .icon-box i {
            color: #82ce34;
            font-size: 46px;
            display: inline-block;
            margin-top: 13px;
        }
        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #82ce34;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            min-width: 120px;
            border: none;
            min-height: 40px;
            border-radius: 3px;
            margin: 0 5px;
            outline: none !important;
        }
        .modal-confirm .btn-info {
            background: #c1c1c1;
        }
        .modal-confirm .btn-info:hover, .modal-confirm .btn-info:focus {
            background: #a8a8a8;
        }
        .modal-confirm .btn-success {
            background: #82ce34;
        }
        .modal-confirm .btn-success:hover, .modal-confirm .btn-danger:focus {
            background: #82ce34;
        }
        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>
    @stack('styles')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><img src="{{ asset('assets/image/logo.png') }}" alt="Logo" width="100%"></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><img src="{{ asset('assets/image/logo.png') }}" alt="Logo" width="50%"></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            @guest
            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
            @else
            <!-- Sidebar toggle button-->
                <div class="navbar-custom-menu">
                    <a href="{{ route('logout') }}" class="btn btn-flat text-white btn-warning" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </div>
            @endguest
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                @if(!$isAdmin)
                    <li>
                        <a href="{{ route('profile') }}">
                            <i class="fa fa-suitcase"></i> <span>Trang Chủ</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile-show-tree') }}">
                            <i class="fa fa-tree"></i> <span>Mạng Lưới</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('package') }}">
                            <i class="fa fa-cubes"></i> <span>Gói Robot</span>
                            <span class="pull-right-container"><small
                                        class="label pull-right bg-green">Hot</small></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('faq') }}">
                            <i class="fa fa-commenting"></i> <span>FAQ</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('support') }}">
                            <i class="fa fa-support"></i> <span>Hỗ Trợ</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('setting') }}">
                            <i class="fa fa-gears"></i> <span>Cài Đặt</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                    <li class="treeview active menu-open">
                        <a href="#">
                            <i class="fa fa-cubes"></i>
                            <span>Package</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('package') }}"><i class="fa fa-circle-o"></i> Buy <span class="pull-right-container"><small
                                                class="label pull-right bg-green">Hot</small></span></a></li>
                            <li><a href="{{ route('package-manager') }}"><i class="fa fa-circle-o"></i> Manager</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('profile') }}">
                            <i class="fa fa-suitcase"></i> <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile-show-tree') }}">
                            <i class="fa fa-tree"></i> <span>Show Tree</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user-manager') }}">
                            <i class="fa fa-user"></i> <span>User</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('order') }}">
                            <i class="fa fa-money"></i> <span>Order</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('manager-withdraw') }}">
                            <i class="fa fa-tachometer"></i> <span>Quản lý rút tiền</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('faq') }}">
                            <i class="fa fa-commenting"></i> <span>FAQ</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('support') }}">
                            <i class="fa fa-support"></i> <span>Support</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('setting') }}">
                            <i class="fa fa-gears"></i> <span>Setting</span>
                        </a>
                    </li>
                @endif
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2019 <a href="/">Hệ Thống</b> Robot-rfx.com</a>.</strong> All rights
        reserved.
    </footer>
</div>
<div id="confirm" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="fa fa-calendar-check-o"></i>
                </div>
                <h4 class="modal-title">Xác nhận thông tin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn tiếp tục?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-success btn-continue">Tiếp tục</button>
            </div>
        </div>
    </div>
</div>
<div id="confirmSave" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="fa fa-calendar-check-o"></i>
                </div>
                <h4 class="modal-title">Xác nhận thông tin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn tiếp tục?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-success btn-continue-save">Tiếp tục</button>
            </div>
        </div>
    </div>
</div>
<div id="activeO" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="fa fa-calendar-check-o"></i>
                </div>
                <h4 class="modal-title">Xác nhận thông tin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn tiếp tục?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-success btn-continue-active">Tiếp tục</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('vendor/adminlte/bower_components/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/dist/js/demo.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('vendor/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('vendor/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var deleteForm = '';
        var activeForm = '';
        $(".alert-success").delay(2000).slideUp(200, function () {
            $(this).alert('close');
        });
        $(".alert-warning").delay(2000).slideUp(200, function () {
            $(this).alert('close');
        });
        $(".alert-info").delay(2000).slideUp(200, function () {
            $(this).alert('close');
        });
        $(".btn-confirm-save").click(function() {
            $("#confirmSave").modal("show");
            return false;
        });
        $(".btn-confirm-active").click(function() {
            activeForm = $(this).attr('form-value');
            $("#activeO").modal("show");
            return false;
        });
        $(".btn-continue-save").click(function() {
            $("form.formSave").submit();
            return true;
        });
        $(".btn-confirm").click(function() {
            deleteForm = $(this).attr('form-value');
            $("#confirm").modal("show");
            return false;
        });
        $(".btn-continue").click(function() {
            if ( $( "."+deleteForm+"" ).length ) {
                $( "."+deleteForm+"" ).submit();
            } else {
                $("form").submit();
            }
            return true;
        });
        $(".btn-continue-active").click(function() {
            $( "."+activeForm+"" ).submit();
            return true;
        });
    });
    function fallbackCopyTextToClipboard(text) {
        var textArea = document.createElement("textarea");
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();

        try {
            document.execCommand("copy");
        } catch (err) {
            console.error("Fallback: Oops, unable to copy", err);
        }

        document.body.removeChild(textArea);
    }
    function copyTextToClipboard(text) {
        if (!navigator.clipboard) {
            fallbackCopyTextToClipboard(text);
            return;
        }
        navigator.clipboard.writeText(text).then(
            function () {
                console.log("Async: Copying to clipboard was successful!");
            },
            function (err) {
                console.error("Async: Could not copy text: ", err);
            }
        );
    }
</script>
@stack('scripts')
</body>
</html>
