@extends('layouts.back.master')


@section('content')

    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="btn btn-outline-dark float-left" href="{{ route('category.create') }}">Add New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td>{{ ucfirst($category->name) }}</td>

                                <td><span class="{{ ($category->status == 'active')?'text-success':'text-danger'}}"> {{ ucfirst($category->status)  }} </span></td>
                                <td>
                                    @if($category->deleted_at == null)
                                    <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('category.destroy',$category->id) }}" method="post" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                     @else
                                        <form action="{{ route('category.restore',$category->id) }}" method="post" style="display: inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Do you want this back?')"><i class="fa fa-undo"></i></button>
                                        </form>

                                        <form action="{{ route('category.delete',$category->id) }}" method="post" style="display: inline">
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
                <span class="float-right">{{ $categories->render() }}</span>
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
