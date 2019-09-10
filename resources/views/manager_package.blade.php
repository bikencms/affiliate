@extends('layouts.app')
@section('content')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Package manager</li>
        </ol>
        <br>
        <h1>
            Package manager
        </h1>
    </section>
    <section class="content">
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
        <div class="row">
            <form method="post" action="{{ route('package-create') }}" class="formSave">
                @csrf
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Package add</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group has-feedback @error('name') has-error @enderror">
                                @error('name')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input
                                    with
                                    error</label>
                                @enderror
                                <div class="input-group">
                                    <span class="input-group-addon">#</span>
                                    <input type="text" class="form-control" placeholder="{{ __('Name') }}" name="name" required autocomplete="name">
                                </div>
                                @error('name')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback @error('price') has-error @enderror">
                                @error('price')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input
                                    with
                                    error</label>
                                @enderror
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                    <input type="number" class="form-control" placeholder="{{ __('Price') }}" name="price" required autocomplete="price">
                                </div>
                                @error('price')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="Description" name="description"></textarea>
                            </div>
                            <div class="input-group">
                                <button type="submit" class="btn btn-info pull-left btn-confirm-save" title="Save">Save</button>
                            </div>
                            <!-- /input-group -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </form>
            <div class="col-md-9">
                <table class="table table-striped table-vcenter table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($packages as $package)
                        <tr>
                            <td class="font-w600">{{ $package->id }}</td>
                            <td class="font-w600">{{ $package->name }} </td>
                            <td class="font-w600">{{ $package->price }}$</td>
                            <td class="font-w600">
                                <a href="{{ route('package-edit', [ 'id' => $package->id ]) }}" class="btn bg-olive" data-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <form action="{{ route('package-delete', ['id' => $package->id ]) }}" method="POST" style="display: inline-block" class="deleteForm{{$package->id}}">
                                    @csrf
                                    <button class="btn bg-maroon btn-confirm" form-value="deleteForm{{$package->id}}" type="submit" title="Delete"><i class="fa fa-trash"></i> Delete</button>
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
