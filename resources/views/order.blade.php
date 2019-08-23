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
                <table class="table table-striped table-vcenter table-bordered data-table table-responsive">
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
                            <td class="font-w600 text-center">
                                @if( $order->status == 0 )
                                    <span class="label pull-left bg-red">Pending</span>
                                @else
                                    <span class="label pull-left bg-green">Active</span>
                                @endif
                            </td>
                            <td>
                                @if( $order->status == 0 )
                                    <form action="{{ url('order/active') }}" method="POST" onsubmit="return confirm('Do you continue?');">
                                        @csrf
                                        <input type="hidden" name="id_order" value="{{$order->id}}">
                                        <button type="submit" class="btn btn-block btn-success">Active</button>
                                    </form>
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
