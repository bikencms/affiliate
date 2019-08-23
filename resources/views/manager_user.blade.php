@extends('layouts.app')
@section('content')
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
                <table class="table table-striped table-vcenter table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Email Referral</th>
                        <th>Point</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="font-w600">{{ $user->id }}</td>
                            <td class="font-w600">{{ $user->name }} </td>
                            <td class="font-w600">{{ $user->email }}</td>
                            <td class="font-w600">{{ $user->email_referral }}</td>
                            <td class="font-w600 text-success">{{ $user->point }}</td>
                            <td>
                                <a href="" class="btn btn-success">Show Tree</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div id="treeBroker"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </section>
@endsection
{{--@push('styles')--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.7/themes/default/style.min.css" />--}}
{{--@endpush--}}
{{--@push('scripts')--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.7/jstree.min.js"></script>--}}
{{--<script>--}}
    {{--var data = [--}}
        {{--{--}}
            {{--"id": "{{ $users[0]->email }}",--}}
            {{--"parent": "#",--}}
            {{--"text": "{{ $users[0]->name }}",--}}
            {{--"icon": "{{ asset('assets/media/avatars/avatar0.png') }}"--}}
        {{--},--}}
    {{--@foreach ($users as $user)--}}
        {{--@if( $user->id > 1 )--}}
        {{--{--}}
            {{--"id": "{{ $user->email }}",--}}
            {{--"parent": "{{ $user->email_referral }}",--}}
            {{--"text": "{{ $user->email }}",--}}
            {{--"icon": "{{ asset('assets/media/avatars/avatar0.png') }}"--}}
        {{--},--}}
        {{--@endif--}}
    {{--@endforeach--}}
    {{--];--}}
    {{--$('#treeBroker').jstree({--}}
        {{--'core': {--}}
            {{--'data': data--}}
        {{--}--}}
    {{--});--}}

{{--</script>--}}
{{--@endpush--}}