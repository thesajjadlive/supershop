@extends('layouts.front.master')

@section('content')
    <div class="container">
        <div class="row" style="height: 30px"></div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Information') }}</div>

                    <div class="card-body">

                        <form action="{{ route('user.info.update',$customer->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row required-field">
                                <label class="col-md-4 col-form-label text-md-right">First Name </label>

                                <div class="col-md-6">
                                    <input name="first_name" type="text" class="form-control" value="{{ $customer->first_name }}" required>

                                    @error('first_name')
                                    <span class="p1-1 text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- End .form-group -->
                            </div><!-- End .form-group -->


                            <div class="form-group row required-field">
                                <label class="col-md-4 col-form-label text-md-right">Last Name </label>
                                <div class="col-md-6">
                                    <input name="last_name" type="text" class="form-control" value="{{ $customer->last_name }}" required>
                                    @error('last_name')
                                    <span class="p1-1 text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- End .form-group -->
                            </div><!-- End .form-group -->


                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Company (Optional) </label>

                                <div class="col-md-6">
                                    <input name="company" type="text" class="form-control" value="{{ $customer->company }}">
                                </div><!-- End .form-group -->
                            </div><!-- End .form-group -->


                            <div class="form-group row required-field">
                                <label class="col-md-4 col-form-label text-md-right">Email  </label>

                                <div class="col-md-6">
                                    <input name="email" type="email" class="form-control" value="{{ $customer->email }}" required>
                                    @error('email')
                                    <span class="p1-1 text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- End .form-group -->
                            </div><!-- End .form-group -->


                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>


                            <div class="form-group row required-field">
                                <label class="col-md-4 col-form-label text-md-right">Phone Number </label>
                                <div class="col-md-6 form-control-tooltip">
                                    <input name="phone" type="tel" class="form-control" value="{{ $customer->phone }}" required>
                                    <span class="input-tooltip" data-toggle="tooltip" title="For delivery questions." data-placement="right"><i class="icon-question-circle"></i></span>
                                    @error('phone')
                                    <span class="p1-1 text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- End .form-control-tooltip -->
                            </div><!-- End .form-group -->


                            <div class="form-group row required-field">
                                <label class="col-md-4 col-form-label text-md-right">Street Address </label>

                                <div class="col-md-6">
                                    <input name="street_address" type="text" class="form-control" value="{{ $customer->street_address }}" required>
                                    @error('street_address')
                                    <span class="p1-1 text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- End .form-group -->
                            </div><!-- End .form-group -->


                            <div class="form-group row required-field">
                                <label class="col-md-4 col-form-label text-md-right">District  </label>

                                <div class="col-md-6">
                                    <input name="district" type="text" class="form-control" value="{{ $customer->district }}" required>
                                    @error('district')
                                    <span class="p1-1 text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- End .form-group -->
                            </div><!-- End .form-group -->


                            <div class="form-group row required-field">
                                <label class="col-md-4 col-form-label text-md-right">Zip/Postal Code </label>

                                <div class="col-md-6">
                                    <input name="zip" type="text" class="form-control" value="{{ $customer->zip }}" required>
                                    @error('zip')
                                    <span class="p1-1 text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- End .form-group -->




                            <div class="checkout-steps-action">
                                <button type="submit" class="btn btn-primary float-right">Update</button>
                            </div><!-- End .checkout-steps-action -->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
