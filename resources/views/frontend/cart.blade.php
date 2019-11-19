@extends('layouts.front.master')

@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-1">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    @if(session('message'))
        <div class="text-center" style="margin: 20px 0 20px 0">
            <span class="alert alert-danger">{{ session('message') }}</span>
        </div>
    @endif


    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table-container">
                    <table class="table table-cart">
                        <thead>
                        <tr>
                            <th class="product-col">Product</th>
                            <th class="price-col">Price</th>
                            <th class="qty-col">Qty</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>

                        @php
                            $total = 0;
                            $shipping = 0;
                        @endphp

                        @if($cart != null)
                        @foreach($cart as $item)
                               <tr class="product-row">
                                   <td class="product-col">
                                       <figure class="product-image-container">
                                           <a href="{{ route('product.details',$item['product_id']) }}" class="product-image">
                                               <img src="{{ asset($item['image']) }}" style="max-width: 120px; max-height: 120px" alt="product">
                                           </a>
                                       </figure>
                                       <h2 class="product-title">
                                           <a href="{{ route('product.details',$item['product_id']) }}">{{ $item['name'] }}</a>
                                       </h2>
                                   </td>
                                   <td>৳ {{ $item['price'] }}</td>
                                   <td>
                                       <input class="vertical-quantity form-control" type="text">
                                   </td>
                                   <td>৳ {{ $item['price']*$item['quantity'] }}</td>
                               </tr>
                               <tr class="product-action-row">
                                   <td colspan="4" class="clearfix">
                                       <div class="float-left">
                                           {{-- <a href="#" class="btn-move">Move to Wishlist</a>--}}
                                       </div><!-- End .float-left -->

                                       <div class="float-right">
                                           <a href="{{ route('remove.cart',$item['product_id']) }}" title="Remove product" class="btn-remove"><span class="sr-only">Remove</span></a>
                                       </div><!-- End .float-right -->
                                   </td>
                               </tr>

                               @php
                                   $shipping += $item['quantity'] * 30 ;
                                   $total += $item['quantity'] * $item['price'] ;
                               @endphp
                           @endforeach
                            @endif
                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="4" class="clearfix">
                                <div class="float-left">
                                    <a href="{{ route('front.product.index') }}" class="btn btn-outline-secondary">Continue Shopping</a>
                                </div><!-- End .float-left -->

                                <div class="float-right">
                                    <a href="{{ route('clear.cart') }}" class="btn btn-outline-secondary btn-clear-cart">Clear Shopping Cart</a>
                                    {{--<a href="#" class="btn btn-outline-secondary btn-update-cart">Update Shopping Cart</a>--}}
                                </div><!-- End .float-right -->
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- End .cart-table-container -->

                <div class="cart-discount">
                    <h4>Apply Discount Code</h4>
                    <form action="#">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Enter discount code"  required>
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-primary" type="submit">Apply Discount</button>
                            </div>
                        </div><!-- End .input-group -->
                    </form>
                </div><!-- End .cart-discount -->
            </div><!-- End .col-lg-8 -->

            <div class="col-lg-4">
                <div class="cart-summary">
                    <h3>Summary</h3>


                    <table class="table table-totals">
                        <tbody>
                        <tr>
                            <td>Subtotal</td>
                            <td>৳ {{ $total }}</td>
                        </tr>

                        <tr>
                            <td>Tax</td>
                            <td>৳ 0.00</td>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td>৳ {{ $shipping }}</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>Order Total</td>
                            <td>৳ {{ $total+$shipping }}</td>
                        </tr>
                        </tfoot>
                    </table>

                    <div class="checkout-methods">
                        <a href="{{route('checkout')}}" class="btn btn-block btn-sm btn-primary">Go to Checkout</a>
                        {{--<a href="#" class="btn btn-link btn-block">Check Out with Multiple Addresses</a>--}}
                    </div><!-- End .checkout-methods -->
                </div><!-- End .cart-summary -->
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
