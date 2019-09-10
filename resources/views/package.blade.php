@extends('layouts.app')
@section('content')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li class="active">Thuê Robot</li>
        </ol>
        <br>
        <h4>
            Các Gói Robot
            <small>hot</small>
        </h4>
    </section>
    <?php
    $robotFee = [
        0 => ['bg' => 'bg-orange', 'icon' => 'fa-bicycle'],
        1 => ['bg' => 'bg-maroon', 'icon' => 'fa-bell'],
        2 => ['bg' => 'bg-purple', 'icon' => 'fa-gamepad'],
        3 => ['bg' => 'bg-light-blue', 'icon' => 'fa-heartbeat'],
        4 => ['bg' => 'bg-teal', 'icon' => 'fa-lightbulb-o'],
    ];
    ?>

    <section class="content">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> LƯU Ý!</h4>
            <p><b> * Người dùng</b> có thể đầu tư giao dịch với tối đa 50 gói trên 50 ID giao dịch MT4 tùy theo mình lựa
                chọn.</p>
            <p><b>* Khi Thuê Robot</b>, sẽ được cấp VPS (máy chủ ảo) hoàn toàn miễn phí để đảm bảo rằng MT4 cũng như
                Robot được chạy liên tục 24/24 không ngừng nghỉ.</p>

        </div>
        <div class="box-body">
            @foreach( $packageFee  as $key => $packageF)
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box @if(isset($packageFee[$key])) {{ $robotFee[$key]['bg'] }} @else bg-green @endif ">
                        <div class="inner">
                            <h3>{{ $packageF->price == 0 ? 'Đang cập nhập' : $packageF->price . '$' }}</h3>
                            <p>{{ $packageF->name }}</p>
                            <p><?= $packageF->description ?></p>
                        </div>
                        <div class="icon">
                            <i class="fa @if(isset($packageFee[$key])) {{ $robotFee[$key]['icon'] }} @else fa-rocket @endif "></i>
                        </div>
                        <a href="{{ route('add-package', [ 'id_package' => $packageF->id ]) }}"
                           class="small-box-footer">
                            ĐĂNG KÝ NGAY
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- /.box-body --
</section>
@endsection
