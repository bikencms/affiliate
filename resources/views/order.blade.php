@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Order
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Order</li>
        </ol>
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
                            <td class="font-w600">
                                @if( $order->status == 0 )
                                    <span class="text-red">Pending</span>
                                @else
                                    <span class="text-green">Active</span>
                                @endif
                            </td>
                            <td>
                                @if( $order->status == 0 )
                                    <form action="{{ url('order/active') }}" method="POST" onsubmit="return confirm('Do you continue?');">
                                        @csrf
                                        <input type="hidden" name="id_order" value="{{$order->id}}">
                                        <button type="submit" class="btn btn-block btn-success">Active</button>
                                    </form>
                                    <form onsubmit="return confirm('Do you continue?');"
                                          action="{{ url('order/delete/' . $order->id) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button class="btn btn-block btn-secondary" type="submit">Delete</button>
                                    </form>
                                @else
                                    #
                                @endif
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
