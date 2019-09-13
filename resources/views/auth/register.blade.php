<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Affiliate website | Register</title>
    <link rel="shortcut icon" href="{{ asset('assets/image/logo.png') }}" type="image/x-icon" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
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


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="/"><img src="{{ asset('assets/image/logo.png') }}" alt="Logo" width="100%"></a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Đăng ký thành viên mới</p>
        @error('email_referral')
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div><br/>
        @enderror
        <form method="post" action="{{ route('register') }}">
            @csrf
            <input type="hidden" name="email_referral" value="{{ app('request')->input('email_referral') }}">
            <div class="form-group has-feedback @error('name') has-error @enderror">
                @error('name')
                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input with
                    error</label>
                @enderror
                <input type="text" class="form-control" placeholder="{{ __('Full name') }}" @error('name') id="inputError" @enderror name="name"
                       value="{{ old('name') }}" required autocomplete="name" autofocus>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @error('name')
                <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group has-feedback @error('phone') has-error @enderror">
                @error('phone')
                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input with
                    error</label>
                @enderror
                <input type="number" class="form-control" placeholder="{{ __('Phone') }}" name="phone"
                       value="{{ old('phone') }}" required autocomplete="phone" maxlength="14">
                <span class="fa  fa-mobile-phone form-control-feedback"></span>
                @error('phone')
                <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group has-feedback @error('email') has-error @enderror">
                @error('email')
                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input with
                    error</label>
                @enderror
                <input type="email" class="form-control" placeholder="{{ __('Email') }}" name="email" @error('email') id="inputError" @enderror
                       value="{{ old('email') }}" required autocomplete="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @error('email')
                <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group has-feedback @error('password') has-error @enderror">
                @error('password')
                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input with
                    error</label>
                @enderror
                <input type="password" class="form-control" placeholder="{{ __('Password') }}" name="password" required @error('password') id="inputError" @enderror
                       autocomplete="new-password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @error('password')
                <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group has-feedback @error('password_confirmation') has-error @enderror">
                @error('password_confirmation')
                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input with
                    error</label>
                @enderror
                <input type="password" class="form-control" placeholder="{{ __('Retype password') }}"  @error('password_confirmation') id="inputError" @enderror
                       name="password_confirmation" required autocomplete="new-password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                @error('password_confirmation')
                <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Register') }}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <br>
        <a href="{{ route('login') }}" class="text-center">Tôi đã là thành viên</a>
    </div>
    <!-- /.form-box -->
</div>
</body>
</html>
