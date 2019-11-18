@extends('layouts.front.master')

@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Payment</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">
        <ul class="checkout-progress-bar">
            <li>
                <span>Shipping</span>
            </li>
            <li class="active">
                <span>Payments</span>
            </li>
        </ul>
        <div class="row">
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


                <div class="checkout-info-box">
                    <h3 class="step-title">Shipping Method:
                    </h3>

                    <p>Flat Rate - Fixed</p>
                </div><!-- End .checkout-info-box -->
            </div><!-- End .col-lg-4 -->

            <div class="col-lg-8 order-lg-first">
                <div class="checkout-payment">
                    <h2 class="step-title">Ship To:</h2>

                    <div class="checkout-info-box">

                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th>Order Number</th>
                                <td>{{ $order->order_number }}</td>
                            </tr>
                            <tr>
                                <th>Customer Name</th>
                                <td>{{ $customer->first_name.' '.$customer->last_name }}</td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>{{ $customer->phone }}</td>
                            </tr>
                            <tr>
                                <th>E-mail</th>
                                <td>{{ $customer->email }}</td>
                            </tr>
                            <tr>
                                <th>Shipping Address</th>
                                <td>{{ $customer->street_address }}</td>
                            </tr>
                            <tr>
                                <th> </th>
                                <td>{{ $customer->district.'  '.$customer->zip }}</td>
                            </tr>
                            <tr>
                                <th>Payable Amount</th>
                                <td>{{ $order->total_price }}/-</td>
                            </tr>
                            <tr>
                                <th> </th>
                                <td><button class="btn btn-sm btn-outline-secondary">Pay Now</button></td>
                            </tr>
                            </tbody>
                        </table>


                    </div><!-- End .checkout-info-box -->

                </div><!-- End .checkout-payment -->

                <div class="checkout-discount">
                    <h4>
                        <a data-toggle="collapse" href="#checkout-discount-section" class="collapsed" role="button" aria-expanded="false" aria-controls="checkout-discount-section">Apply Discount Code</a>
                    </h4>

                    <div class="collapse" id="checkout-discount-section">
                        <form action="#">
                            <input type="text" class="form-control form-control-sm" placeholder="Enter discount code"  required>
                            <button class="btn btn-sm btn-outline-secondary" type="submit">Apply Discount</button>
                        </form>
                    </div><!-- End .collapse -->
                </div><!-- End .checkout-discount -->

            </div><!-- End .col-lg-8 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- margin -->
@endsection




@push('library-css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
@endpush



@push('custom-css')

@endpush



@push('library-js')

@endpush



@push('custom-js')

@endpush
