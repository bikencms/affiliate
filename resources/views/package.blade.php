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
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>100$</h3>

                            <p>ROBOT 1</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-rocket"></i>
                        </div>
                        <a href="{{ route('add-package', [ 'id_package' => 1 ]) }}" class="small-box-footer">
                            BUY
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>200$</h3>

                            <p>ROBOT 2</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-slideshare"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            BUY
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
