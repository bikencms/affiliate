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

    <title>Robot-rfx.com | Dashboard Control panel</title>

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
    </style>
    @stack('styles')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>Affiliate</b> Website</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Affiliate</b> Website</span>
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
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('vendor/adminlte/dist/img/avatar5.png') }}" class="user-image"
                                     alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->email }} | <span class="text-success">{{ Auth::user()->point }}
                                        point</span></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <p class="text-success">{{ Auth::user()->point }} point</p>
                                    <p class="text-success">{{ URL::to('/register?email_referral='.Auth::user()->email) }}</p>
                                    <button onclick="copyTextToClipboard('{{url('/')}}/register?email_referral={{ Auth::user()->email }}');"
                                            class="btn btn-success btn-min-width btn-glow mr-1 mb-0">{{__('Copy clipboard')}}</button>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
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
                <li>
                    <a href="{{ route('profile') }}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                @if(!$isAdmin)
                    <li>
                        <a href="{{ route('package') }}">
                            <i class="fa fa-cubes"></i> <span>Package</span>
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
                            <i class="fa fa-support"></i> <span>Support</span>
                        </a>
                    </li>
                @else
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
                        <a href="{{ route('faq') }}">
                            <i class="fa fa-commenting"></i> <span>FAQ</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('support') }}">
                            <i class="fa fa-support"></i> <span>Support</span>
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
        <strong>Copyright &copy; 2019 <a href="/">Affiliate</b> Website</a>.</strong> All rights
        reserved.
    </footer>
</div>
<script src="{{ asset('vendor/adminlte/bower_components/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/dist/js/demo.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<!-- Data Table -->
<link rel="stylesheet"
      href="//adminlte.io/themes/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Data Table -->
<script type="text/javascript"
        src="//adminlte.io/themes/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"
        src="//adminlte.io/themes/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".alert-success").delay(2000).slideUp(200, function () {
            $(this).alert('close');
        });
        $(".alert-warning").delay(2000).slideUp(200, function () {
            $(this).alert('close');
        });
        $(".alert-info").delay(2000).slideUp(200, function () {
            $(this).alert('close');
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
