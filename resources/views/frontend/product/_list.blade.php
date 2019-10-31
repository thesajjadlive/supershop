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
                    <span >{{ ucfirst($product->category->name) }}</span><!-- End .ratings -->
                </div><!-- End .product-ratings -->
            </div><!-- End .product-container -->
            <h2 class="product-title">
                <a href="{{ route('product.details',$product->id) }}">{{ ucfirst($product->name) }}</a>
            </h2>
            <div class="price-box">
                <span class="product-price">৳ {{ $product->price }}</span>
            </div><!-- End .price-box -->

            <div class="product-action">
                <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                    <span>Add to Wishlist</span>
                </a>

                <a href="product.html" class="paction add-cart" title="Add to Cart">
                    <span>Add to Cart</span>
                </a>

                <a href="#" class="paction add-compare" title="Add to Compare">
                    <span>Add to Compare</span>
                </a>
            </div><!-- End .product-action -->
        </div><!-- End .product-details -->
    </div><!-- End .product -->
</div><!-- End .col-md-4 -->
