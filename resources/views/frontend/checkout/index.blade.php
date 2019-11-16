@extends('layouts.front.master')

@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
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
                <span>Review &amp; Payments</span>
            </li>
        </ul>
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

                        <form action="{{ route('customer.store') }}" method="post">
                            @csrf
                            <div class="form-group required-field">
                                <label>First Name </label>
                                <input name="first_name" type="text" class="form-control" required>
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>Last Name </label>
                                <input name="last_name" type="text" class="form-control" required>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label>Company </label>
                                <input name="company" type="text" class="form-control">
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>Email  </label>
                                <input name="email" type="email" class="form-control" required>
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>Phone Number </label>
                                <div class="form-control-tooltip">
                                    <input name="phone" type="tel" class="form-control" required>
                                    <span class="input-tooltip" data-toggle="tooltip" title="For delivery questions." data-placement="right"><i class="icon-question-circle"></i></span>
                                </div><!-- End .form-control-tooltip -->
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>Street Address </label>
                                <input name="street_address" type="text" class="form-control" required>
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>District  </label>
                                <input name="district" type="text" class="form-control" required>
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>Zip/Postal Code </label>
                                <input name="zip" type="text" class="form-control" required>
                            </div><!-- End .form-group -->

                        </form>
                    </li>

                    <li>
                        <div class="checkout-step-shipping">
                            <h2 class="step-title">Shipping Methods</h2>

                            <table class="table table-step-shipping">
                                <tbody>
                                <tr>
                                    <td><input type="radio" name="shipping-method" value="fast"></td>
                                    <td>Fast</td>
                                    <td><strong>৳ 50.00</strong></td>
                                    <td>1-3 Days</td>
                                </tr>

                                <tr>
                                    <td><input type="radio" name="shipping-method" value="normal"></td>
                                    <td>Normal</td>
                                    <td><strong>৳ 30.00</strong></td>
                                    <td>3-7 Days</td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!-- End .checkout-step-shipping -->
                    </li>
                </ul>
            </div><!-- End .col-lg-8 -->

            <div class="col-lg-4">
                <div class="order-summary">
                    <h3>Summary</h3>

                    <h4>
                        <a data-toggle="collapse" href="#order-cart-section" class="collapsed" role="button" aria-expanded="false" aria-controls="order-cart-section">{{ count($cart) }} products in Cart</a>
                    </h4>

                    <div class="collapse" id="order-cart-section">
                        <table class="table table-mini-cart">
                            <tbody>

                            @php
                                $total = 0;
                            @endphp


                            @if($cart != null)
                                @foreach($cart as $item)

                            <tr>
                                <td class="product-col">
                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
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
                                $total += $item['quantity'] * $item['price'] ;
                            @endphp

                                @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div><!-- End #order-cart-section -->
                    <div class="dropdown-cart-total">
                        <span>Total</span>

                        <span class="cart-total-price">৳ {{ $total }}/-</span>
                    </div>
                </div><!-- End .order-summary -->
            </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->

        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-steps-action">
                    <a href="checkout-review.html" class="btn btn-primary float-right">Place Order</a>
                </div><!-- End .checkout-steps-action -->
            </div><!-- End .col-lg-8 -->
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
