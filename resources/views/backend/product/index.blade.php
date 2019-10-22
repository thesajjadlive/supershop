@extends('layouts.back.master')


@section('content')

    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="btn btn-outline-dark float-left" href="{{ route('product.create') }}">Add New</a>
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
                            <th>Product Name</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $product)
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td>{{ ucfirst($product->name) }}</td>
                                <td>{{ $product->size }}</td>
                                <td>{{ ucfirst($product->color) }}</td>
                                <td>{{ ucfirst($product->description) }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                                <td><span class="{{ ($product->status == 'active')?'text-success':'text-danger'}}"> {{ ucfirst($product->status)  }} </span></td>
                                <td>
                                    @if($product->deleted_at == null)
                                        <a href="{{ route('product.edit',$product->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('product.destroy',$product->id) }}" method="post" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></button>
                                        </form>
                                    @else
                                        <form action="{{ route('product.restore',$product->id) }}" method="post" style="display: inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Do you want this back?')"><i class="fa fa-undo"></i></button>
                                        </form>

                                        <form action="{{ route('product.delete',$product->id) }}" method="post" style="display: inline">
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
                <span class="float-right">{{ $products->render() }}</span>
            </div>
        </div>
        {{--<label class="switch">
            <input type="checkbox" checked>
            <span class="slider round"></span>
        </label>--}}
    </div>

@endsection




@push('library-css')

@endpush



@push('custom-css')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 30px;
            height: 17px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 13px;
            width: 13px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(13px);
            -ms-transform: translateX(13px);
            transform: translateX(13px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endpush



@push('library-js')

@endpush



@push('custom-js')

@endpush
