@extends('layouts.app')
@section('content')
    <style>
        @media
        only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px) {
            .table {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch !important;
            }
            .row {
                width: 100%;
                display: block;
                margin-right: 0;
                margin-left: 0;
            }
            .container {
                padding-right: 0;
                padding-left: 0;
            }
            .col-sm-12 {
                padding-right: 0;
                padding-left: 0;
            }
            .content {
                padding-left: 0;
                padding-right: 0;
            }
        }
    </style>
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- AREA CHART -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Lợi nhuận toàn hệ thống</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="revenue-chart" style="height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="300" version="1.1" width="675" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="49.21875" y="261" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.71875,261H650" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.21875" y="202" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">7,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.71875,202H650" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.21875" y="143" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.71875,143H650" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.21875" y="84.00000000000003" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.250000000000028" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">22,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.71875,84.00000000000003H650" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.21875" y="25.00000000000003" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.250000000000028" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.71875,25.00000000000003H650" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="542.0650440461726" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan></text><text x="280.4478660388821" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><path fill="#74a5c2" stroke="none" d="M61.71875,219.05493333333334C78.1591737545565,219.56626666666668,111.0400212636695,222.62345,127.480445018226,221.10026666666667C143.9208687727825,219.57708333333335,176.80171628189552,209.13558251366123,193.242140036452,206.86946666666668C209.5038635328068,204.6279825136612,242.0273105255164,204.88215,258.2890340218712,203.06986666666666C274.550757518226,201.25758333333332,307.0742045109356,194.9129178506375,323.3359280072904,192.3712C339.7763517618469,189.80155118397084,372.65719927095995,182.51721666666668,389.09762302551644,182.6244C405.53804678007293,182.73158333333333,438.41889428918597,204.18057122040074,454.85931804374246,193.22866666666667C471.1210415400973,182.39580455373408,503.64448853280686,101.94395359116025,519.9062120291617,95.48533333333336C535.9892352673148,89.09768692449359,568.1552817436209,135.13802307692308,584.238304981774,141.8436C600.6787287363305,148.69818974358975,633.5595762454435,147.7554,650,149.726L650,261L61.71875,261Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#3c8dbc" d="M61.71875,219.05493333333334C78.1591737545565,219.56626666666668,111.0400212636695,222.62345,127.480445018226,221.10026666666667C143.9208687727825,219.57708333333335,176.80171628189552,209.13558251366123,193.242140036452,206.86946666666668C209.5038635328068,204.6279825136612,242.0273105255164,204.88215,258.2890340218712,203.06986666666666C274.550757518226,201.25758333333332,307.0742045109356,194.9129178506375,323.3359280072904,192.3712C339.7763517618469,189.80155118397084,372.65719927095995,182.51721666666668,389.09762302551644,182.6244C405.53804678007293,182.73158333333333,438.41889428918597,204.18057122040074,454.85931804374246,193.22866666666667C471.1210415400973,182.39580455373408,503.64448853280686,101.94395359116025,519.9062120291617,95.48533333333336C535.9892352673148,89.09768692449359,568.1552817436209,135.13802307692308,584.238304981774,141.8436C600.6787287363305,148.69818974358975,633.5595762454435,147.7554,650,149.726" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="61.71875" cy="219.05493333333334" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="127.480445018226" cy="221.10026666666667" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="193.242140036452" cy="206.86946666666668" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="258.2890340218712" cy="203.06986666666666" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="323.3359280072904" cy="192.3712" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="389.09762302551644" cy="182.6244" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="454.85931804374246" cy="193.22866666666667" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="519.9062120291617" cy="95.48533333333336" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="584.238304981774" cy="141.8436" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="650" cy="149.726" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><path fill="#eaf3f6" stroke="none" d="M61.71875,240.02746666666667C78.1591737545565,239.8072,111.0400212636695,241.35496666666666,127.480445018226,239.1464C143.9208687727825,236.93783333333334,176.80171628189552,223.33676429872497,193.242140036452,222.35893333333334C209.5038635328068,221.39173096539162,242.0273105255164,233.23263333333333,258.2890340218712,231.36626666666666C274.550757518226,229.4999,307.0742045109356,209.2890577413479,323.3359280072904,207.428C339.7763517618469,205.54649107468123,372.65719927095995,214.43916666666667,389.09762302551644,216.39600000000002C405.53804678007293,218.35283333333336,438.41889428918597,232.37947613843352,454.85931804374246,223.08266666666668C471.1210415400973,213.88690947176687,503.64448853280686,148.22682412523022,519.9062120291617,142.42573333333334C535.9892352673148,136.6883907918969,568.1552817436209,170.47037838827842,584.238304981774,176.92893333333336C600.6787287363305,183.53101172161175,633.5595762454435,190.23343333333335,650,194.66826666666668L650,261L61.71875,261Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#a0d0e0" d="M61.71875,240.02746666666667C78.1591737545565,239.8072,111.0400212636695,241.35496666666666,127.480445018226,239.1464C143.9208687727825,236.93783333333334,176.80171628189552,223.33676429872497,193.242140036452,222.35893333333334C209.5038635328068,221.39173096539162,242.0273105255164,233.23263333333333,258.2890340218712,231.36626666666666C274.550757518226,229.4999,307.0742045109356,209.2890577413479,323.3359280072904,207.428C339.7763517618469,205.54649107468123,372.65719927095995,214.43916666666667,389.09762302551644,216.39600000000002C405.53804678007293,218.35283333333336,438.41889428918597,232.37947613843352,454.85931804374246,223.08266666666668C471.1210415400973,213.88690947176687,503.64448853280686,148.22682412523022,519.9062120291617,142.42573333333334C535.9892352673148,136.6883907918969,568.1552817436209,170.47037838827842,584.238304981774,176.92893333333336C600.6787287363305,183.53101172161175,633.5595762454435,190.23343333333335,650,194.66826666666668" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="61.71875" cy="240.02746666666667" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="127.480445018226" cy="239.1464" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="193.242140036452" cy="222.35893333333334" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="258.2890340218712" cy="231.36626666666666" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="323.3359280072904" cy="207.428" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="389.09762302551644" cy="216.39600000000002" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="454.85931804374246" cy="223.08266666666668" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="519.9062120291617" cy="142.42573333333334" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="584.238304981774" cy="176.92893333333336" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="650" cy="194.66826666666668" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 84.457px; top: 153px; display: none;"><div class="morris-hover-row-label">2011 Q2</div><div class="morris-hover-point" style="color: #a0d0e0">
                                    Item 1:
                                    2,778
                                </div><div class="morris-hover-point" style="color: #3c8dbc">
                                    Item 2:
                                    2,294
                                </div></div></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- DONUT CHART -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Affiliate </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="sales-chart" style="height: 300px; position: relative;"><svg height="300" version="1.1" width="675" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#3c8dbc" d="M337.5,243.33333333333331A93.33333333333333,93.33333333333333,0,0,0,425.7277551949771,180.44625304313007" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#3c8dbc" stroke="#ffffff" d="M337.5,246.33333333333331A96.33333333333333,96.33333333333333,0,0,0,428.56364732624417,181.4248826052307L465.1151459070204,194.03833029452744A135,135,0,0,1,337.5,285Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#f56954" d="M425.7277551949771,180.44625304313007A93.33333333333333,93.33333333333333,0,0,0,253.78484627831412,108.73398312817662" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#f56954" stroke="#ffffff" d="M428.56364732624417,181.4248826052307A96.33333333333333,96.33333333333333,0,0,0,251.09400205154566,107.40757544301087L211.92726941747117,88.10097469226493A140,140,0,0,1,469.8416327924656,195.6693795646951Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#00a65a" d="M253.78484627831412,108.73398312817662A93.33333333333333,93.33333333333333,0,0,0,337.47067846904883,243.333328727518" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#00a65a" stroke="#ffffff" d="M251.09400205154566,107.40757544301087A96.33333333333333,96.33333333333333,0,0,0,337.46973599126824,246.3333285794739L337.4575884998742,284.9999933380171A135,135,0,0,1,216.4120097954186,90.31165416754118Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="337.5" y="140" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;" font-weight="800" transform="matrix(1.679,0,0,1.679,-229.1458,-100.6544)" stroke-width="0.5956101190476191"><tspan dy="5.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">In-Store Sales</tspan></text><text x="337.5" y="160" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;" transform="matrix(2.0072,0,0,2.0072,-339.9194,-153.3414)" stroke-width="0.4982142857142858"><tspan dy="4.75" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30</tspan></text></svg></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col (LEFT) -->
            <div class="col-md-6">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Hoa hồng toàn hệ thống</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="line-chart" style="height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="300" version="1.1" width="675" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="49.21875" y="261" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.71875,261H650" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.21875" y="202" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">5,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.71875,202H650" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.21875" y="143" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">10,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.71875,143H650" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.21875" y="84" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.71875,84H650" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.21875" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">20,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M61.71875,25H650" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="542.0650440461726" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan></text><text x="280.4478660388821" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><path fill="none" stroke="#3c8dbc" d="M61.71875,229.5412C78.1591737545565,229.2108,111.0400212636695,231.53245,127.480445018226,228.2196C143.9208687727825,224.90675000000002,176.80171628189552,204.50514644808743,193.242140036452,203.0384C209.5038635328068,201.58759644808742,242.0273105255164,219.34895,258.2890340218712,216.5494C274.550757518226,213.74984999999998,307.0742045109356,183.43358661202186,323.3359280072904,180.642C339.7763517618469,177.81973661202184,372.65719927095995,191.15875,389.09762302551644,194.094C405.53804678007293,197.02925,438.41889428918597,218.06921420765028,454.85931804374246,204.124C471.1210415400973,190.33036420765026,503.64448853280686,91.8402361878453,519.9062120291617,83.1386C535.9892352673148,74.53258618784531,568.1552817436209,125.20556758241756,584.238304981774,134.89339999999999C600.6787287363305,144.79651758241758,633.5595762454435,154.85015,650,161.50240000000002" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="61.71875" cy="229.5412" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="127.480445018226" cy="228.2196" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="193.242140036452" cy="203.0384" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="258.2890340218712" cy="216.5494" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="323.3359280072904" cy="180.642" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="389.09762302551644" cy="194.094" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="454.85931804374246" cy="204.124" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="519.9062120291617" cy="83.1386" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="584.238304981774" cy="134.89339999999999" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="650" cy="161.50240000000002" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 90.9179px; top: 161px; display: none;"><div class="morris-hover-row-label">2011 Q2</div><div class="morris-hover-point" style="color: #3c8dbc">
                                    Item 1:
                                    2,778
                                </div></div></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- BAR CHART -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Số user</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="bar-chart" style="height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="300" version="1.1" width="675" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="32.53125" y="261" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.03125,261H650" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.53125" y="202" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">25</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.03125,202H650" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.53125" y="143" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">50</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.03125,143H650" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.53125" y="84" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">75</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.03125,84H650" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.53125" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">100</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.03125,25H650" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="606.7879464285714" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><text x="520.3638392857142" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011</tspan></text><text x="433.93973214285717" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010</tspan></text><text x="347.515625" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2009</tspan></text><text x="261.0915178571429" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2008</tspan></text><text x="174.66741071428572" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2007</tspan></text><text x="88.24330357142857" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2006</tspan></text><rect x="55.83426339285714" y="25" width="30.90904017857143" height="236" rx="0" ry="0" fill="#00a65a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="89.74330357142857" y="48.60000000000002" width="30.90904017857143" height="212.39999999999998" rx="0" ry="0" fill="#f56954" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="142.25837053571428" y="84" width="30.90904017857143" height="177" rx="0" ry="0" fill="#00a65a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="176.16741071428572" y="107.6" width="30.90904017857143" height="153.4" rx="0" ry="0" fill="#f56954" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="228.68247767857142" y="143" width="30.90904017857143" height="118" rx="0" ry="0" fill="#00a65a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="262.59151785714283" y="166.60000000000002" width="30.90904017857143" height="94.39999999999998" rx="0" ry="0" fill="#f56954" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="315.10658482142856" y="84" width="30.90904017857143" height="177" rx="0" ry="0" fill="#00a65a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="349.015625" y="107.6" width="30.90904017857143" height="153.4" rx="0" ry="0" fill="#f56954" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="401.53069196428567" y="143" width="30.90904017857143" height="118" rx="0" ry="0" fill="#00a65a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="435.4397321428571" y="166.60000000000002" width="30.90904017857143" height="94.39999999999998" rx="0" ry="0" fill="#f56954" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="487.9547991071428" y="84" width="30.90904017857143" height="177" rx="0" ry="0" fill="#00a65a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="521.8638392857142" y="107.6" width="30.90904017857143" height="153.4" rx="0" ry="0" fill="#f56954" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="574.37890625" y="25" width="30.90904017857143" height="236" rx="0" ry="0" fill="#00a65a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="608.2879464285714" y="48.60000000000002" width="30.90904017857143" height="212.39999999999998" rx="0" ry="0" fill="#f56954" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect></svg><div class="morris-hover morris-default-style" style="left: 242.99px; top: 112px; display: none;"><div class="morris-hover-row-label">2008</div><div class="morris-hover-point" style="color: #00a65a">
                                    CPU:
                                    50
                                </div><div class="morris-hover-point" style="color: #f56954">
                                    DISK:
                                    40
                                </div></div></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->

    </section>
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/morris.js/morris.css') }}">
@endpush
@push('scripts')
<script type="text/javascript" src="{{ asset('vendor/adminlte/bower_components/raphael/raphael.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/adminlte/bower_components/morris.js/morris.min.js') }}"></script>
<script type="text/javascript">
    $(function () {
        "use strict";

        // AREA CHART
        var area = new Morris.Area({
            element: 'revenue-chart',
            resize: true,
            data: [
                {y: '2011 Q1', item1: 2666, item2: 2666},
                {y: '2011 Q2', item1: 2778, item2: 2294},
                {y: '2011 Q3', item1: 4912, item2: 1969},
                {y: '2011 Q4', item1: 3767, item2: 3597},
                {y: '2012 Q1', item1: 6810, item2: 1914},
                {y: '2012 Q2', item1: 5670, item2: 4293},
                {y: '2012 Q3', item1: 4820, item2: 3795},
                {y: '2012 Q4', item1: 15073, item2: 5967},
                {y: '2013 Q1', item1: 10687, item2: 4460},
                {y: '2013 Q2', item1: 8432, item2: 5713}
            ],
            xkey: 'y',
            ykeys: ['item1', 'item2'],
            labels: ['Item 1', 'Item 2'],
            lineColors: ['#a0d0e0', '#3c8dbc'],
            hideHover: 'auto'
        });

        // LINE CHART
        var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: [
                {y: '2011 Q1', item1: 2666},
                {y: '2011 Q2', item1: 2778},
                {y: '2011 Q3', item1: 4912},
                {y: '2011 Q4', item1: 3767},
                {y: '2012 Q1', item1: 6810},
                {y: '2012 Q2', item1: 5670},
                {y: '2012 Q3', item1: 4820},
                {y: '2012 Q4', item1: 15073},
                {y: '2013 Q1', item1: 10687},
                {y: '2013 Q2', item1: 8432}
            ],
            xkey: 'y',
            ykeys: ['item1'],
            labels: ['Item 1'],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto'
        });

        //DONUT CHART
        var donut = new Morris.Donut({
            element: 'sales-chart',
            resize: true,
            colors: ["#3c8dbc", "#f56954", "#00a65a"],
            data: [
                {label: "Số gói", value: 30},
                {label: "Số gói chưa kích hoạt", value: 22},
                {label: "Số gói đã kích hoạt", value: 8}
            ],
            hideHover: 'auto'
        });
        //BAR CHART
        var bar = new Morris.Bar({
            element: 'bar-chart',
            resize: true,
            data: [
                {y: '2006', a: 100, b: 90},
                {y: '2007', a: 75, b: 65},
                {y: '2008', a: 50, b: 40},
                {y: '2009', a: 75, b: 65},
                {y: '2010', a: 50, b: 40},
                {y: '2011', a: 75, b: 65},
                {y: '2012', a: 100, b: 90}
            ],
            barColors: ['#00a65a', '#f56954'],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['CPU', 'DISK'],
            hideHover: 'auto'
        });
    });
</script>
@endpush


