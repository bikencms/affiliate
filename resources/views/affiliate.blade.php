@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Affiliate
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Affiliate</li>
        </ol>
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
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Select month</label>
                        <?php $current_year = date('Y');  ?>
                        <form action="{{route('affiliate')}}" method="GET">
                            <select class="form-control" onchange="form.submit()" name="month">
                                <option value="">#</option>
                                <?php for($i = 1; $i <= 12; $i++): ?>
                                <?php if($i > 9) : ?>
                                <option value="<?php echo "$current_year-$i" ?>" <?php if(app('request')->input('month') == "$current_year-$i" ) echo 'selected' ?>><?php echo "$i/$current_year" ?></option>
                                <?php else : ?>
                                <option value="<?php echo "$current_year-0$i" ?>" <?php if(app('request')->input('month') == "$current_year-0$i" ) echo 'selected' ?>><?php echo "0$i/$current_year" ?></option>
                                <?php endif; ?>
                                <?php endfor; ?>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            @if(app('request')->input('month') && $packages->count() > 0 )
            <form action="{{route('affiliate-bonus')}}" method="post">
                <input type="hidden" name="month" value="{{app('request')->input('month')}}">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group @error('id_package') has-error @enderror">
                        @error('id_package')
                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input
                            with
                            error</label>
                        @enderror
                        <label>Select package</label>
                        <select class="form-control" name="package_id">
                            @foreach( $packages as $package )
                            <option value="{{$package->id_package}}">{{ $package->package->name }}</option>
                            @endforeach
                        </select>
                        @error('id_package')
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group @error('f1') has-error @enderror">
                        @error('f1')
                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input
                            with
                            error</label>
                        @enderror
                        <label>Bonus F1</label>
                        <input type="number" name="f1" placeholder="Bonus F1" class="form-control" value="{{ old('f1') }}">
                        @error('f1')
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group @error('f2') has-error @enderror">
                        @error('f2')
                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input
                            with
                            error</label>
                        @enderror
                        <label>Bonus F2</label>
                        <input type="number" name="f2" placeholder="Bonus F2" class="form-control" value="{{ old('f2') }}">
                        @error('f2')
                        <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-info pull-left btn-confirm" data-toggle="tooltip" title="Save">Save</button>
                    </div>
                </div>
            </div>
            </form>
            @endif
        </div>
    </section>
@endsection

