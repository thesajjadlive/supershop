@extends('layouts.back.master')



@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-2"></div>

                <div class="col-lg-7">
                    <div class="p-5">
                        <div class=" ">
                            <h1 class="h4 text-gray-900 mb-4">{{ $title }}!</h1>
                        </div>
                        <form class="user" action="{{ route('user.update',$user->id) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')


                            @include('backend.user._form')

                            <button type="submit"  class="btn btn-primary float-right">Update</button>


                        </form>
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
