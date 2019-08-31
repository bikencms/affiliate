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
                        <th>Point</th>
                        <th>Referral tree</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="font-w600">{{ $user->id }}</td>
                            <td class="font-w600">{{ $user->name }} </td>
                            <td class="font-w600">{{ $user->email }}</td>
                            <td class="font-w600 text-success">{{ $user->point }}</td>
                            <td class="font-w600">
                                <div id="treeBroker"></div>
                            </td>
                            <td>
                                <form onsubmit="return confirm('Do you continue?');" action="{{ route('user-delete', ['id' => $user->id ]) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    <button class="btn bg-maroon" type="submit" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i> Delete</button>
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
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.7/themes/default/style.min.css" />
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.7/jstree.min.js"></script>
<script>

    var data = [
        {
            "id": "minhbiken",
            "parent": "#",
            "text": "minhbiken@gmail.com",
            "icon": "http://onichub.local/avatar/default_avatar_tree.png",
            'state' : {'opened': true}
        },
        {
            "id": "minhbiken1",
            "parent": "minhbiken",
            "text": "minhbiken1",
            "icon": "http://onichub.local/avatar/default_avatar_tree.png",
            'state' : {'opened': true}
        },
        {
            "id": "minhbiken3",
            "parent": "minhbiken",
            "text": "minhbiken3",
            "icon": "http://onichub.local/avatar/default_avatar_tree.png",
            'state' : {'opened': true}
        },
        {
            "id": "minhbiken8",
            "parent": "minhbiken1",
            "text": "minhbiken8",
            "icon": "http://onichub.local/avatar/default_avatar_tree.png",
            'state' : {'opened': true}
        },
        {
            "id": "minhbiken4",
            "parent": "minhbiken1",
            "text": "minhbiken4",
            "icon": "http://onichub.local/avatar/default_avatar_tree.png",
            'state' : {'opened': true}
        },
        {
            "id": "minhbiken6",
            "parent": "minhbiken3",
            "text": "minhbiken6",
            "icon": "http://onichub.local/avatar/default_avatar_tree.png",
            'state' : {'opened': true}
        },
        {
            "id": "minhbiken7",
            "parent": "minhbiken4",
            "text": "minhbiken7",
            "icon": "http://onichub.local/avatar/default_avatar_tree.png",
            'state' : {'opened': true}
        },
    ];
    $('#treeBroker').jstree({
        'core': {
            'data': data
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.data-table').DataTable({"responsive": true});
    });
</script>
@endpush
