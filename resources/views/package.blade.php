@extends('layouts.app')
@section('content')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Package</li>
        </ol>
        <br>
        <h1>
            Package
            <small>List</small>
        </h1>
    </section>
    <section class="content">
        <?php
            $robotFree = [
                0 => [ 'bg' => 'bg-aqua', 'icon' => 'fa-rocket' ],
                1 => [ 'bg' => 'bg-green', 'icon' => 'fa-slideshare' ],
                2 => [ 'bg' => 'bg-gray', 'icon' => 'fa-hourglass' ],
                3 => [ 'bg' => 'bg-red', 'icon' => 'fa-bomb' ],
            ];

            $robotFee = [
                0 => [ 'bg' => 'bg-orange', 'icon' => 'fa-bicycle' ],
                1 => [ 'bg' => 'bg-maroon', 'icon' => 'fa-bell' ],
                2 => [ 'bg' => 'bg-purple', 'icon' => 'fa-gamepad' ],
                3 => [ 'bg' => 'bg-light-blue', 'icon' => 'fa-heartbeat' ],
                4 => [ 'bg' => 'bg-teal', 'icon' => 'fa-lightbulb-o' ],
            ];
        ?>
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Gói Follow</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @foreach( $packageFree  as $key => $package)
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box @if(isset($packageFree[$key])) {{ $robotFree[$key]['bg'] }} @else bg-green @endif ">
                                <div class="inner">
                                    <h3>{{ $package->price == 0 ? 'Liên hệ' : $package->price . '$' }}</h3>
                                    <p>{{ $package->name }}</p>
                                    <p><?= $package->description ?></p>
                                </div>
                                <div class="icon">
                                    <i class="fa @if(isset($packageFree[$key])) {{ $robotFree[$key]['icon'] }} @else fa-rocket @endif "></i>
                                </div>
                                <a href="{{ route('add-package', [ 'id_package' => $package->id ]) }}" class="small-box-footer btn-confirm">
                                    BUY
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-12">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Gói thuê robot</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @foreach( $packageFee  as $key => $packageF)
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box @if(isset($packageFee[$key])) {{ $robotFee[$key]['bg'] }} @else bg-green @endif ">
                                <div class="inner">
                                    <h3>{{ $packageF->price == 0 ? 'Liên hệ' : $packageF->price . '$' }}</h3>
                                    <p>{{ $packageF->name }}</p>
                                    <p><?= $packageF->description ?></p>
                                </div>
                                <div class="icon">
                                    <i class="fa @if(isset($packageFee[$key])) {{ $robotFee[$key]['icon'] }} @else fa-rocket @endif "></i>
                                </div>
                                <a href="{{ route('add-package', [ 'id_package' => $packageF->id ]) }}" class="small-box-footer btn-confirm">
                                    BUY
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </section>
@endsection
