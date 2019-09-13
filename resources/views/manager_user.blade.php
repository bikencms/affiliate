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
            <li class="active">User manager</li>
        </ol>
        <br>
        <h1>
            User manager
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Account Bank</th>
                        <th>Point</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="font-w600">{{ $user->id }}</td>
                            <td class="font-w600">{{ $user->name }} </td>
                            <td class="font-w600">{{ $user->email }}</td>
                            <td class="font-w600">{{ $user->phone }}</td>
                            <td class="font-w600 text-info">
                                <address>
                                    <strong>Thông tin tài khoản: <br></strong>
                                    Tên tài khoản: {{ $user->user_bank }} <br>
                                    Số tài khoản: {{ $user->account_bank }}<br>
                                    Chi Nhánh: {{ $user->name_bank }}<br>
                                </address>

                            </td>
                            <td class="font-w600 text-success">{{ $user->point }}</td>
                            <td>
                                <a href="{{route('show-tree', ['id' => $user->id])}}" class="btn bg-olive">Show tree</a>
                                <form action="{{ route('user-delete', ['id' => $user->id ]) }}" method="POST" style="display: inline-block" class="deleteForm{{$user->id}}">
                                    @csrf
                                    <button class="btn bg-maroon btn-confirm" type="submit" form-value="deleteForm{{$user->id}}" title="Delete"><i class="fa fa-trash"></i> Delete</button>
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
        $('.data-table').DataTable({"responsive": true});
    });
</script>
@endpush
