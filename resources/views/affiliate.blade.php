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
            <div class="row">
                <div class="form-group">
                    <label>Select month</label>
                    <?php
                    $current_year = date('Y');  ?>
                    <form action="{{route('affiliate')}}" method="GET">
                        <select class="form-control" onchange="form.submit()" name="month">
                            <option value="">#</option>
                            <?php for($i = 1; $i <= 12; $i++): ?>
                            <option value="<?php echo "$i/$current_year" ?>" <?php if(app('request')->input('month') == "$i/$current_year" ) echo 'selected' ?>><?php echo "$i/$current_year" ?></option>
                            <?php endfor; ?>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
