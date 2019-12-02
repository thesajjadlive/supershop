@extends('layouts.front.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registration') }}</div>

                <div class="card-body">

                    <form action="{{ route('user.register.submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group required-field">
                            <label>First Name </label>
                            <input name="first_name" type="text" class="form-control" value="{{ old('first_name') }}" required>
                        </div><!-- End .form-group -->
                        @error('first_name')
                        <div class="p1-1 text-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group required-field">
                            <label>Last Name </label>
                            <input name="last_name" type="text" class="form-control" value="{{ old('last_name') }}" required>
                        </div><!-- End .form-group -->
                        @error('last_name')
                        <div class="p1-1 text-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label>Company </label>
                            <input name="company" type="text" class="form-control" value="{{ old('company') }}">
                        </div><!-- End .form-group -->


                        <div class="form-group required-field">
                            <label>Email  </label>
                            <input name="email" type="email" class="form-control" value="{{ old('email') }}" required>
                        </div><!-- End .form-group -->
                        @error('email')
                        <div class="p1-1 text-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group required-field">
                            <label>Phone Number </label>
                            <div class="form-control-tooltip">
                                <input name="phone" type="tel" class="form-control" value="{{ old('phone') }}" required>
                                <span class="input-tooltip" data-toggle="tooltip" title="For delivery questions." data-placement="right"><i class="icon-question-circle"></i></span>
                            </div><!-- End .form-control-tooltip -->
                        </div><!-- End .form-group -->
                        @error('phone')
                        <div class="p1-1 text-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group required-field">
                            <label>Street Address </label>
                            <input name="street_address" type="text" class="form-control" value="{{ old('street_address') }}" required>
                        </div><!-- End .form-group -->
                        @error('street_address')
                        <div class="p1-1 text-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group required-field">
                            <label>District  </label>
                            <input name="district" type="text" class="form-control" value="{{ old('district') }}" required>
                        </div><!-- End .form-group -->
                        @error('district')
                        <div class="p1-1 text-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group required-field">
                            <label>Zip/Postal Code </label>
                            <input name="zip" type="text" class="form-control" value="{{ old('zip') }}" required>
                        </div><!-- End .form-group -->
                        @error('zip')
                        <div class="p1-1 text-danger">{{ $message }}</div>
                        @enderror

                        <div class="checkout-steps-action">
                            <button type="submit" class="btn btn-primary float-right">Register</button>
                        </div><!-- End .checkout-steps-action -->

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
