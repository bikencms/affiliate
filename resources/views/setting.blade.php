@extends('layouts.app')
@section('content')
    <section class="content">
        <section class="content-header">
            <h1>
                Setting
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Setting</li>
            </ol>
        </section>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
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
                            <form action="{{ route('setting') }}" method="post">
                                @csrf
                                <div class="form-group has-feedback @error('email') has-error @enderror">
                                    @error('email')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input
                                        with
                                        error</label>
                                    @enderror
                                    <div class="input-group">
                                        <span class="input-group-addon" style="width: 40px"><i class="fa fa-envelope-o"></i></span>
                                        <input type="email" class="form-control" placeholder="{{ __('Email') }}" name="name" required autocomplete="email" value="{{ Auth::user()->email }}" disabled>
                                    </div>
                                    @error('email')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group has-feedback @error('name') has-error @enderror">
                                    @error('name')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input
                                        with
                                        error</label>
                                    @enderror
                                    <div class="input-group">
                                        <span class="input-group-addon" style="width: 40px"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" placeholder="{{ __('Full name') }}" name="name" required autocomplete="name" value="{{ Auth::user()->name }}">
                                    </div>
                                    @error('name')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group has-feedback @error('phone') has-error @enderror">
                                    @error('phone')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input
                                        with
                                        error</label>
                                    @enderror
                                    <div class="input-group">
                                        <span class="input-group-addon" style="width: 40px"><i class="fa fa-mobile-phone"></i></span>
                                        <input type="number" class="form-control" placeholder="{{ __('Phone') }}" name="phone" required autocomplete="phone" value="{{ Auth::user()->phone }}">
                                    </div>
                                    @error('phone')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group has-feedback @error('bank_account') has-error @enderror">
                                    @error('bank_account')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input
                                        with
                                        error</label>
                                    @enderror
                                    <div class="input-group">
                                        <span class="input-group-addon" style="width: 40px"><i class="fa fa-bank"></i></span>
                                        <input type="number" class="form-control" placeholder="{{ __('Bank Account') }}" name="bank_account" required autocomplete="bank_account" value="{{ Auth::user()->bank_account }}">
                                    </div>
                                    @error('bank_account')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group has-feedback @error('password') has-error @enderror">
                                    @error('password')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input
                                        with
                                        error</label>
                                    @enderror
                                    <div class="input-group">
                                        <span class="input-group-addon" style="width: 40px"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="password" class="form-control" placeholder="{{ __('Password') }}" name="password" required @error('password') id="inputError" @enderror
                                        autocomplete="new-password">
                                    </div>
                                    @error('password')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <button type="submit" class="btn btn-info pull-left btn-confirm" title="Save">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
