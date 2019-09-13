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
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Order</li>
        </ol>
        <br>
        <h1>
            Order
            <small>List</small>
        </h1>
    </section>
    <section class="content">
        <div class="container">
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
                <table class="table table-striped table-vcenter table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Ngày Tháng Năm</th>
                        <th>Số Tiền</th>
                        <th>Lý do</th>
                        <th>Trạng thái</th>
                        <th>Ngày khớp lệnh</th>
                        <th>Hoạt động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($withdraws as $withdraw)
                        <tr>
                            <td>{{ date_format($withdraw->created_at,"d-m-Y") }}</td>
                            <td>{{ $withdraw->point }}$</td>
                            <td>
                                <address>
                                    <strong>Thông tin tài khoản: <br></strong>
                                    Tên tài khoản: {{ $withdraw->user_bank }} <br>
                                    Số tài khoản: {{ $withdraw->account_bank }}<br>
                                    Chi Nhánh: {{ $withdraw->name_bank }}<br>
                                    Số tiền: {{ $withdraw->point }}$<br>
                                    Nội Dung: {{ $withdraw->reason }}
                                </address>
                            </td>
                            <td>
                                {{ $withdraw->status == 0 ? 'Đang chờ...' : 'Rút thành công' }}
                            </td>
                            <td>{{ date_format($withdraw->created_at, 'd/m/Y') }}</td>
                            <td>
                                @if( $withdraw->status == 0 )
                                    <form action="{{ url('manager-withdraw/active') }}" method="POST" class="activeForm{{$withdraw->id}}">
                                        @csrf
                                        <input type="hidden" name="withdraw_id" value="{{$withdraw->id}}">
                                        <button type="submit" class="btn btn-block btn-success btn-confirm" form-value="activeForm{{$withdraw->id}}">Active</button>
                                    </form>
                                @endif
                                <form
                                      action="{{ url('manager-withdraw/delete/' . $withdraw->id) }}" method="POST" class="deleteForm{{$withdraw->id}}">
                                    @csrf
                                    @method('POST')
                                    <button class="btn btn-block btn-secondary btn-confirm" form-value="deleteForm{{$withdraw->id}}" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('.data-table').DataTable({
            "order": [[ 4, "desc" ], [ 1, "asc" ]],
            "responsive": true
        });
    });
</script>
@endpush
