@extends('layouts.app')
@section('content')
    <style>
        /*
           Label the data
           */
        @media
        only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px) {
            td:nth-of-type(1):before {
                content: "ID";
            }

            td:nth-of-type(2):before {
                content: "Name";
            }

            td:nth-of-type(3):before {
                content: "Email";
            }

            td:nth-of-type(4):before {
                content: "Email Referral";
            }

            td:nth-of-type(5):before {
                content: "Point";
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
                <table class="table table-striped table-vcenter table-bordered data-table">
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
                            {{--<td>--}}
                                {{--<a href="" class="btn btn-success">Show Tree</a>--}}
                            {{--</td>--}}
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