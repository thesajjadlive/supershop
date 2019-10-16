@extends('layouts.back.master')


@section('content')

    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="btn btn-outline-dark float-left" href="{{ route('brand.create') }}">Add New</a>
                <div class="search-container float-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <select class="form-control" name="status" id="">
                                <option value="">Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Search.." name="search">
                        </div>
                        <button class="btn btn-outline-dark" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Brand Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($brands as $brand)
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td>{{ ucfirst($brand->name) }}</td>
                                <td><span class="{{ ($brand->status == 'active')?'text-success':'text-danger'}}"> {{ ucfirst($brand->status)  }} </span></td>
                                <td>
                                    @if($brand->deleted_at == null)
                                        <a href="{{ route('brand.edit',$brand->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('brand.destroy',$brand->id) }}" method="post" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></button>
                                        </form>
                                    @else
                                        <form action="{{ route('brand.restore',$brand->id) }}" method="post" style="display: inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Do you want this back?')"><i class="fa fa-undo"></i></button>
                                        </form>

                                        <form action="{{ route('brand.delete',$brand->id) }}" method="post" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirm to permanently remove?')"><i class="fa fa-trash"></i></button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <span class="float-right">{{ $brands->render() }}</span>
            </div>
        </div>

    </div>

@endsection




@push('library-css')

@endpush



@push('custom-css')

@endpush



@push('library-js')

@endpush



@push('custom-js')

@endpush
