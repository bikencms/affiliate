@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Package
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Package</li>
        </ol>
    </section>
    <section class="content">
        <div class="container">
            <div class="row">
                @foreach( $packages  as $key => $package)
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box @if($key == 0) bg-aqua @else bg-green @endif ">
                        <div class="inner">
                            <h3>{{ $package->price }}$</h3>

                            <p>{{ $package->name }}</p>
                        </div>
                        <div class="icon">
                            <i class="fa @if($key == 0) fa-rocket @else fa-slideshare  @endif "></i>
                        </div>
                        <a href="{{ route('add-package', [ 'id_package' => $package->id ]) }}" class="small-box-footer btn-confirm">
                            BUY
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
