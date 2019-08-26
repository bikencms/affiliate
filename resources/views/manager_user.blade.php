@extends('layouts.app')
@section('content')
    <style>
        @media
        only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px) {
            .table {
                max-width: none;
                -webkit-overflow-scrolling: touch !important;
            }
        }
    </style>
    <section class="content-header">
        <h1>
            User manager
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">User manager</li>
        </ol>
    </section>
    <section class="content">
        <div class="container">
            <div class="row">
                <table class="table table-striped table-vcenter table-bordered data-table table-responsive">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Email Referral</th>
                        <th>Point</th>
                        {{--<th>#</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="font-w600">{{ $user->id }}</td>
                            <td class="font-w600">{{ $user->name }} </td>
                            <td class="font-w600">{{ $user->email }}</td>
                            <td class="font-w600">{{ isset($user->email_referral) ? $user->email_referral : '#' }}</td>
                            <td class="font-w600 text-success">{{ $user->point }}</td>
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
