@extends('layouts.front.master')

@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">
        <ul class="checkout-progress-bar">
            <li class="active">
                <span>Shipping</span>
            </li>
            <li>
                <span>Payments</span>
            </li>
        </ul>

        @if(session('message'))
            <div class="text-center" style="margin: 0 0 20px 0">
                <span class="alert alert-danger">{{ session('message') }}</span>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-8">
                <ul class="checkout-steps">
                    <li>
                        <h2 class="step-title">Shipping Address</h2>

                        <form action="#">
                            <div class="form-group required-field">
                                <label>Email Address </label>
                                <div class="form-control-tooltip">
                                    <input type="email" class="form-control" required>
                                    <span class="input-tooltip" data-toggle="tooltip" title="We'll send your order confirmation here." data-placement="right"><i class="icon-question-circle"></i></span>
                                </div><!-- End .form-control-tooltip -->
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>Password </label>
                                <input type="password" class="form-control" required>
                            </div><!-- End .form-group -->

                            <p>You already have an account with us. Sign in or continue as guest.</p>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary">LOGIN</button>
                                <a href="forgot-password.html" class="forget-pass"> Forgot your password?</a>
                            </div><!-- End .form-footer -->
                        </form>

                        <form action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data">
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


                            <div class="checkout-step-shipping">
                                <h2 class="step-title">Shipping Method</h2>

                                <table class="table table-step-shipping">
                                    <tbody>
                                    <tr>
                                        <td><input type="radio" name="shipping-method" value="normal" checked></td>
                                        <td>Flat Rate</td>
                                        <td><strong>৳ 30.00</strong></td>
                                        <td>Best Way</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <span class="text-danger">Make Sure, Your contact and address is correct before Place Order !!</span>
                            <br><!-- End .checkout-step-shipping -->
                            <br>

                            <div class="checkout-steps-action">
                                        <button type="submit" class="btn btn-primary float-right">Place Order</button>
                            </div><!-- End .checkout-steps-action -->

                        </form>
                    </li>
                </ul>
            </div><!-- End .col-lg-8 -->

            <div class="col-lg-4">
                <div class="order-summary">
                    <h3>Summary</h3>

                    <h4>
                        <a data-toggle="collapse" href="#order-cart-section" class="collapsed" role="button" aria-expanded="false" aria-controls="order-cart-section">{{ $cart!= null ?count($cart):'No' }} products in Cart</a>
                    </h4>

                    <div class="collapse" id="order-cart-section">
                        <table class="table table-mini-cart">
                            <tbody>

                            @php
                                $total = 0;
                                $shipping = 0;
                            @endphp


                            @if($cart != null)
                                @foreach($cart as $item)

                            <tr>
                                <td class="product-col">
                                    <figure class="product-image-container">
                                        <a href="{{ route('product.details',$item['product_id']) }}" class="product-image">
                                            <img src="{{ asset($item['image']) }}" style="max-width: 73px; max-height: 73px"  alt="product">
                                        </a>
                                    </figure>
                                    <div>
                                        <h2 class="product-title">
                                            <a href="{{ route('product.details',$item['product_id']) }}">{{ $item['name'] }}</a>
                                        </h2>

                                        <span class="product-qty">Qty: {{ $item['quantity'] }}</span>
                                    </div>
                                </td>
                                <td class="price-col"> {{ $item['quantity'] * $item['price'] }}/-</td>
                            </tr>

                            @php
                                $shipping += $item['quantity'] * 30 ;
                                $total += $item['quantity'] * $item['price'] ;
                            @endphp

                                @endforeach
                            @endif
                            <tr>
                                <td>Shipping</td>
                                <td>{{ $shipping }}/-</td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- End #order-cart-section -->
                    <div class="dropdown-cart-total">
                        <span>Total</span>

                        <span class="cart-total-price">৳ {{ $total+$shipping }}/-</span>
                    </div>
                </div><!-- End .order-summary -->
            </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->

    </div><!-- End .container -->

    <div class="mb-6"></div><!-- margin -->
@endsection




@push('library-css')

@endpush



@push('custom-css')

@endpush



@push('library-js')

@endpush



@push('custom-js')

@endpush
