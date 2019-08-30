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
                <?php
                    $robot = [
                        0 => [ 'bg' => 'bg-aqua', 'icon' => 'fa-rocket' ],
                        1 => [ 'bg' => 'bg-green', 'icon' => 'fa-slideshare' ],
                        2 => [ 'bg' => 'bg-gray', 'icon' => 'fa-hourglass' ],
                        3 => [ 'bg' => 'bg-red', 'icon' => 'fa-bomb' ],
                        4 => [ 'bg' => 'bg-orange', 'icon' => 'fa-bicycle' ],
                        5 => [ 'bg' => 'bg-maroon', 'icon' => 'fa-bell' ],
                        6 => [ 'bg' => 'bg-purple', 'icon' => 'fa-gamepad' ],
                        7 => [ 'bg' => 'bg-light-blue', 'icon' => 'fa-heartbeat' ],
                        8 => [ 'bg' => 'bg-teal', 'icon' => 'fa-lightbulb-o' ],
                    ];
                ?>
                @foreach( $packages  as $key => $package)
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box @if(isset($packages[$key])) {{ $robot[$key]['bg'] }} @else bg-green @endif ">
                        <div class="inner">
                            <h3>{{ $package->price == 0 ? 'Liên hệ' : $package->price . '$' }}</h3>
                            <p>{{ $package->name }}</p>
                            <p><?= $package->description ?></p>
                        </div>
                        <div class="icon">
                            <i class="fa @if(isset($packages[$key])) {{ $robot[$key]['icon'] }} @else fa-rocket @endif "></i>
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
