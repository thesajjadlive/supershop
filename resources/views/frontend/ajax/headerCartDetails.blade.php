<div class="dropdown-cart-header">
    <span>{{ count($cart) }} Items</span>

    <a href="{{ route('cart') }}">View Cart</a>
</div><!-- End .dropdown-cart-header -->
<div class="dropdown-cart-products">


    @php
        $total = 0;
    @endphp


    @if($cart != null)
    @foreach($cart as $item)
        <div class="product">
            <div class="product-details">
                <h4 class="product-title">
                    <a href="{{ route('product.details',$item['product_id']) }}">{{ $item['name'] }}</a>
                </h4>

                <span class="cart-product-info">
                                                    <span class="cart-product-qty">{{ $item['quantity'] }}</span>
                                                    x {{ $item['price'] }}
                                                </span>
            </div><!-- End .product-details -->

            <figure class="product-image-container">
                <a href="{{ route('product.details',$item['product_id']) }}" class="product-image">
                    <img src="{{ asset($item['image']) }}" style="max-width: 78px; max-height: 65px" alt="product">
                </a>
                {{--<a href="#" class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></a>--}}
            </figure>
        </div><!-- End .product -->

        {{--Total calculation--}}
        @php
            $total += $item['quantity'] * $item['price'] ;
        @endphp

    @endforeach
        @else
        <div class="product">
            <span> No Products in Cart</span>
        </div>
    @endif

</div><!-- End .cart-product -->

<div class="dropdown-cart-total">
    <span>Total</span>

    <span class="cart-total-price">৳ {{ $total }}/-</span>
</div><!-- End .dropdown-cart-total -->
