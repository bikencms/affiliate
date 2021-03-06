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
                        <th>ID</th>
                        <th>User</th>
                        <th>Package</th>
                        <th>Created at</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="font-w600">{{ $order->id }}</td>
                            <td class="font-w600">{{ $order->user->email }} </td>
                            <td class="font-w600">{{ $order->package->name }}</td>
                            <td class="font-w600">{{ date_format($order->package->created_at, 'd/m/Y') }}</td>
                            <td class="font-w600">
                                @if( $order->status == 0 )
                                    <span class="text-red">Pending</span>
                                @elseif( $order->status == 1 )
                                    <span class="text-green">Active</span>
                                @else
                                    <span class="text-blue">Rewarded</span>
                                @endif
                            </td>
                            <td>
                                @if( $order->status == 0 )
                                    <form action="{{ url('order/active') }}" method="POST" class="activeForm{{$order->id}}">
                                        @csrf
                                        <input type="hidden" name="id_order" value="{{$order->id}}">
                                        <button type="submit" class="btn btn-block btn-success btn-confirm-active" form-value="activeForm{{$order->id}}">Active</button>
                                    </form>
                                @elseif( $order->status == 1 )
                                    <a href="{{ route('affiliate', [ 'id' => $order->id ]) }}" class="btn btn-block bg-olive" data-toggle="tooltip" title="Affiliate bonus">
                                        Affiliate bonus
                                    </a>
                                @endif
                                    <form action="{{ url('order/delete/' . $order->id) }}" method="POST" class="deleteForm{{$order->id}}">
                                        @csrf
                                        @method('POST')
                                        <button class="btn btn-block btn-secondary btn-confirm" form-value="deleteForm{{$order->id}}" type="submit">Delete</button>
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
