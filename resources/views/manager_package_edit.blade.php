@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Package manager
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Package manager</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
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
            <form method="post" action="{{ route('package-update', [ 'id' => $package->id ]) }}">
                @csrf
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Package edit</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group has-feedback @error('name') has-error @enderror">
                                @error('name')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input
                                    with
                                    error</label>
                                @enderror
                                <div class="input-group">
                                    <span class="input-group-addon">#</span>
                                    <input type="text" class="form-control" placeholder="{{ __('Name') }}" name="name" required autocomplete="name" value="{{ $package->name }}">
                                </div>
                                @error('name')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback @error('price') has-error @enderror">
                                @error('price')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input
                                    with
                                    error</label>
                                @enderror
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                    <input type="number" class="form-control" placeholder="{{ __('Price') }}" name="price" required autocomplete="price" value="{{ $package->price }}">
                                </div>
                                @error('price')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="Description" name="description">{{ $package->description }}</textarea>
                            </div>
                            <div class="input-group">
                                <button type="submit" class="btn btn-info pull-right" data-toggle="tooltip" title="Save">Save</button>
                            </div>
                            <!-- /input-group -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection