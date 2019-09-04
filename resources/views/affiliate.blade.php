@extends('layouts.app')
@section('content')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Affiliate</li>
        </ol>
        <br>
        <h1>
            Affiliate
        </h1>
    </section>
    <section class="content">
        <div class="container">
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
            @if (\Session::has('info'))
                <div class="alert alert-info">
                    <p>{{ \Session::get('info') }}</p>
                </div><br/>
            @endif
            @if($order->count() > 0 )
                <form action="{{ route('affiliate-bonus') }}" method="post">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <div class="row">
                        <div class="callout callout-info col-sm-12">
                            <p>Thông tin gói {{ $order->id }} được hoa hồng</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-rocket"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">{{ $order->package->name }}</span>
                                    <span class="info-box-number">{{ $order->package->price }}$</span>
                                    <span>{{ $order->user->email }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Select month</label>
                                <?php $current_year = date('Y'); $current_month = date('Y-m'); ?>
                                <select class="form-control" onchange="form.submit()" name="month">
                                    <?php for($i = 1; $i <= 12; $i++): ?>
                                    <?php if($i > 9) : ?>
                                    <option value="<?php echo "$current_year-$i" ?>" <?= $current_month == "$current_year-$i" ? 'selected' : '' ?> ><?php echo "$i/$current_year" ?></option>
                                    <?php else : ?>
                                    <option value="<?php echo "$current_year-0$i" ?>" <?= $current_month == "$current_year-0$i" ? 'selected' : '' ?> ><?php echo "0$i/$current_year" ?></option>
                                    <?php endif; ?>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group @error('bonus') has-error @enderror">
                                <label>Bonus</label>
                                @error('bonus')
                                <br>
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input
                                    with
                                    error</label>
                                @enderror
                                <input type="number" class="form-control" placeholder="Bonus" name="bonus" value="{{ old('bonus') }}" required autocomplete="f1">
                                @error('bonus')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info pull-left btn-confirm" data-toggle="tooltip"
                                        title="Save">Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </section>
@endsection

