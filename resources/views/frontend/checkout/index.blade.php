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
                                <label>Password </label>
                                <input type="password" class="form-control" required>
                            </div><!-- End .form-group -->

                            <div class="checkout-step-shipping">
                                <h2 class="step-title">Shipping Method</h2>

                                <table class="table tablel">
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
                        </form>


                        <form action="#">

                            <div class="checkout-step-shipping">
                                <h2 class="step-title">Payment Method</h2>

                                <table class="table table-step-shipping">
                                    <tbody>
                                    <tr>
                                        <td><input type="radio" name="shipping-method" value="normal" checked></td>
                                        <td>Cash On Delivery</td>
                                        <td></td>
                                        <td>Available</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="shipping-method" value="normal"></td>
                                        <td>Online</td>
                                        <td>Bkash/Card</td>
                                        <td>UpComing</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>

                        <form action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div>
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
                                <td class="price-col text-right"> {{ $item['quantity'] * $item['price'] }}/-</td>
                            </tr>

                            @php
                                $shipping += $item['quantity'] * 30 ;
                                $total += $item['quantity'] * $item['price'] ;
                            @endphp

                                @endforeach
                            @endif
                            <tr>
                                <td>Shipping</td>
                                <td class="text-right">{{ $shipping }}/-</td>
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
