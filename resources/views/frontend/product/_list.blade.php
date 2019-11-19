<div class="col-6 col-md-4">
    <div class="product">
        <figure class="product-image-container" style="min-width: 277px; min-height: 277px;">
            <a href=" {{ route('product.details',$product->id) }}" class="product-image">

                <img style="max-width: 277px; max-height: 277px;" src="{{ asset(isset($product->product_image[0])?$product->product_image[0]->file_path:'assets/frontend/images/no-image.jpg') }}" alt="product">
            </a>
            {{--<a href="ajax/product-quick-view.html" class="btn-quickview">Quick View</a>--}}
        </figure>
        <div class="product-details">
            <div class="">
                <div class="">
                    <a href="{{ route('front.product.index', $product->category->id) }}">{{ ucfirst($product->category->name) }}</a>
                </div><!-- End .product-ratings -->
            </div><!-- End .product-container -->
            <h2 class="product-title">
                <a href="{{ route('product.details',$product->id) }}">{{ ucfirst($product->name) }}</a>
            </h2>
            <div class="price-box">
                <span class="product-price">৳ {{ $product->price }}</span>
            </div><!-- End .price-box -->

            <div class="product-action">

                <button class="{{ ($product->stock)==0?'btn paction add-cart disabled':'btn paction add-cart' }}" product-id="{{ $product->id }}" url="{{ route('ajax.addToCart',$product->id) }}" title="Add to Cart">
                    <span>{{ ($product->stock)==0?'Out of Stock': 'Add to Cart'}}</span>
                </button>

            </div><!-- End .product-action -->
        </div><!-- End .product-details -->
    </div><!-- End .product -->
</div><!-- End .col-md-4 -->
