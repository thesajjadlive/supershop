@extends('layouts.back.master')



@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-1"></div>

                <div class="col-lg-10">
                    <div class="p-5">
                        <div class=" ">
                            <h1 class="h4 text-gray-900 mb-4">{{ $title }}!</h1>
                        </div>

                        <table class="table table-bordered table-hover table-striped">
                            <thead class="text-center">
                            <tr>
                                <th width="30%">Parameter</th>
                                <th>Value</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Product Name</td>
                                <td>{{ ucfirst($product->name) }}</td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td>
                                    <div>
                                        @if(count($product->product_image))
                                            @foreach($product->product_image as $image)
                                                <div class="d-inline"><img style="max-height: 130px; max-width: 28%;" src="{{ asset($image->file_path) }}" alt=""></div>
                                            @endforeach
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>{{ ucfirst($product->category->name) }}</td>
                            </tr>
                            <tr>
                                <td>Brand</td>
                                <td>{{ ucfirst($product->brand->name) }}</td>
                            </tr>
                            <tr>
                                <td>Size</td>
                                <td>
                                    @if($product->size!=null)
                                        {{ $product->size }}
                                        @else
                                        Not Available
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Color</td>
                                <td>
                                    @if($product->color!=null)
                                        {{ ucfirst($product->color) }}
                                    @else
                                        Not Available
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>{{ $product->price }}</td>
                            </tr>
                            <tr>
                                <td>Stock</td>
                                <td>{{ $product->stock }}</td>
                            </tr>
                            <tr>
                                <td>Is Featured?</td>
                                <td>@if($product->is_featured == 1) Yes @else No @endif</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ ucfirst($product->status) }}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>
                                    @if($product->description!=null)
                                        {{ ucfirst($product->description) }}
                                    @else
                                        Not Available
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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
