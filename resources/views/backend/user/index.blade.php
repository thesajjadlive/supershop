@extends('layouts.back.master')


@section('content')

    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="btn btn-outline-dark float-left" href="{{ route('user.create') }}">Add New</a>
                <div class="search-container float-right">
                    <form class="form-inline">
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
                            <th>User Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td>{{ ucfirst($user->name) }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td ><img style="max-height: 80px; max-width: 80px;" src="{{ asset($user->image) }}" alt=""></td>
                                <td>{{ ucfirst($user->type) }}</td>
                                <td>

                                    @if($user->deleted_at == null)
                                        <a href="{{ route('user.edit',$user->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('user.destroy',$user->id) }}" method="post" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></button>
                                        </form>
                                    @else
                                        <form action="{{ route('user.restore',$user->id) }}" method="post" style="display: inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Do you want this back?')"><i class="fa fa-undo"></i></button>
                                        </form>

                                        <form action="{{ route('user.delete',$user->id) }}" method="post" style="display: inline">
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
                <span class="float-right">{{ $users->render() }}</span>
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
