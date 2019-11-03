@extends('layouts.front.master')

@section('content')
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('front.product.index', $product->category->id) }}">{{ $product->category->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
            </div><!-- End .container -->
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="product-single-container product-single-default">
                        <div class="row">
                            <div class="col-lg-7 col-md-6 product-single-gallery">
                                <div class="product-slider-container product-item">
                                    <div class="product-single-carousel owl-carousel owl-theme">

                                        @foreach($product->product_image as $image)
                                            <div class="product-item">
                                                <img class="product-single-image" src="{{ asset($image->file_path) }}" data-zoom-image="{{ asset($image->file_path) }}"/>
                                            </div>
                                        @endforeach

                                    </div>
                                    <!-- End .product-single-carousel -->
                                    <span class="prod-full-screen">
                                            <i class="icon-plus"></i>
                                        </span>
                                </div>
                                <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>
                                    @foreach($product->product_image as $image)
                                        <div class="col-3 owl-dot">
                                            <img src="{{ asset($image->file_path) }}"/>
                                        </div>
                                    @endforeach
                                </div>
                            </div><!-- End .col-lg-7 -->

                            <div class="col-lg-5 col-md-6">
                                <div class="product-single-details">
                                    <h1 class="product-title">{{ ucfirst($product->name) }}</h1>

                                    <div class="ratings-container">
                                        <div class="">
                                            <span  style="width:60%"><a href="{{ route('front.product.index', $product->category->id) }}">{{ ucfirst($product->category->name) }}</a></span><!-- End .ratings -->
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="old-price">Tk. {{ $product->price*1.3 }}</span>
                                        <span class="product-price">Tk. {{ $product->price }}</span>
                                    </div><!-- End .price-box -->

                                    <div class="product-desc">
                                        <p>@if($product->description!=null)
                                                {{ ucfirst(Str::limit($product->description, 300)) }}
                                            @else
                                                Description Not Available
                                            @endif</p>
                                    </div><!-- End .product-desc -->

                                    <div class="product-filters-container">
                                        <div class="product-single-filter">
                                            <label>Colors:</label>
                                            <ul class="config-swatch-list">
                                                <li class="active">
                                                    <a href="#" style="background-color: #6085a5;"></a>
                                                </li>
                                                <li>
                                                    <a href="#" style="background-color: #ab6e6e;"></a>
                                                </li>
                                                <li>
                                                    <a href="#" style="background-color: #b19970;"></a>
                                                </li>
                                                <li>
                                                    <a href="#" style="background-color: #11426b;"></a>
                                                </li>
                                            </ul>
                                        </div><!-- End .product-single-filter -->
                                    </div><!-- End .product-filters-container -->

                                    <div class="product-action product-all-icons">
                                        <div class="product-single-qty">
                                            <input class="horizontal-quantity form-control" type="text">
                                        </div><!-- End .product-single-qty -->

                                        <a href="cart.html" class="paction add-cart" title="Add to Cart">
                                            <span>Add to Cart</span>
                                        </a>
                                        <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                            <span>Add to Wishlist</span>
                                        </a>
                                        <a href="#" class="paction add-compare" title="Add to Compare">
                                            <span>Add to Compare</span>
                                        </a>
                                    </div><!-- End .product-action -->

                                    <div class="product-single-share">
                                        <label>Share:</label>
                                        <!-- www.addthis.com share plugin-->
                                        <div class="addthis_inline_share_toolbox"></div>
                                    </div><!-- End .product single-share -->
                                </div><!-- End .product-single-details -->
                            </div><!-- End .col-lg-5 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-single-container -->

                    <div class="product-single-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Tags</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Brand</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                                <div class="product-desc-content">
                                    <p>
                                        @if($product->description!=null)
                                            {{  ucfirst($product->description)  }}
                                        @else
                                            Description Not Available
                                        @endif
                                    </p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- End .tab-pane -->

                            <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                                <div class="product-tags-content">
                                    <form action="#">
                                        <h4>Add Your Tags:</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-sm" required>
                                            <input type="submit" class="btn btn-primary" value="Add Tags">
                                        </div><!-- End .form-group -->
                                    </form>
                                    <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                                </div><!-- End .product-tags-content -->
                            </div><!-- End .tab-pane -->

                            <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                                <div class="product-reviews-content">

                                    <div class="add-product-review">
                                        <h3 class="text-uppercase heading-text-color font-weight-semibold">{{ $product->brand->name }}</h3>
                                        <p>{{ $product->brand->details }}</p>

                                    </div><!-- End .add-product-review -->
                                </div><!-- End .product-reviews-content -->
                            </div><!-- End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-single-tabs -->
                </div><!-- End .col-lg-9 -->

                <div class="sidebar-overlay"></div>
                <div class="sidebar-toggle"><i class="icon-sliders"></i></div>
                <aside class="sidebar-product col-lg-3 padding-left-lg mobile-sidebar">
                    <div class="sidebar-wrapper">
                        <div class="widget widget-brand">
                            <a href=" ">
                                <img src="{{ asset($product->brand->logo!=null?$product->brand->logo:'assets/frontend/images/no-brand-logo.png') }}" alt="{{ $product->brand->name }}">
                            </a>

                            {{--<img src="" alt="brand name">--}}


                        </div><!-- End .widget -->

                        <div class="widget widget-info">
                            <ul>
                                <li>
                                    <i class="icon-shipping"></i>
                                    <h4>FAST<br>SHIPPING</h4>
                                </li>
                                <li>
                                    <i class="icon-us-dollar"></i>
                                    <h4>100% MONEY<br>BACK GUARANTEE</h4>
                                </li>
                                <li>
                                    <i class="icon-online-support"></i>
                                    <h4>ONLINE<br>SUPPORT 24/7</h4>
                                </li>
                            </ul>
                        </div><!-- End .widget -->

                        <div class="widget widget-banner">
                            <div class="banner banner-image">
                                <a href="#">
                                    <img src="{{ asset('assets/frontend/images/banners/banner-sidebar.jpg') }}" alt="Banner Desc">
                                </a>
                            </div><!-- End .banner -->
                        </div><!-- End .widget -->

                        <div class="widget widget-featured">
                            <h3 class="widget-title">Featured Products</h3>

                            <div class="widget-body">
                                <div class="owl-carousel widget-featured-products">
                                    <div class="featured-col">
                                        @foreach($featured_product as $index=>$product)
                                            @if($index <= 2)
                                                <div class="product product-sm">
                                                    <figure class="product-image-container">
                                                        <a href="{{ route('product.details',$product->id) }}" class="product-image">
                                                            <img src="{{ asset(isset($product->product_image[0])?$product->product_image[0]->file_path:'assets/frontend/images/no-image.jpg') }}" alt="product">
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h2 class="product-title">
                                                            <a href="{{ route('product.details',$product->id) }}">{{ ucfirst($product->name) }}</a>
                                                        </h2>
                                                        <div class="ratings-container">
                                                            <div class="">
                                                                <span class="" style="width:80%">{{ ucfirst($product->category->name) }} </span><!-- End .ratings -->
                                                            </div><!-- End .product-ratings -->
                                                        </div><!-- End .product-container -->
                                                        <div class="price-box">
                                                            <span class="product-price">Tk. {{ $product->price }}</span>
                                                        </div><!-- End .price-box -->
                                                    </div><!-- End .product-details -->
                                                </div><!-- End .product -->
                                            @endif
                                        @endforeach
                                    </div><!-- End .featured-col -->

                                    <div class="featured-col">
                                        @foreach($featured_product as $index=>$product)
                                            @if($index >= 3)
                                                <div class="product product-sm">
                                                    <figure class="product-image-container">
                                                        <a href="{{ route('product.details',$product->id) }}" class="product-image">
                                                            <img src="{{ asset(isset($product->product_image[0])?$product->product_image[0]->file_path:'assets/frontend/images/no-image.jpg') }}" alt="product">
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h2 class="product-title">
                                                            <a href="{{ route('product.details',$product->id) }}">{{ ucfirst($product->name) }}</a>
                                                        </h2>
                                                        <div class="ratings-container">
                                                            <div class="">
                                                                <span class="" style="width:80%">{{ ucfirst($product->category->name) }} </span><!-- End .ratings -->
                                                            </div><!-- End .product-ratings -->
                                                        </div><!-- End .product-container -->
                                                        <div class="price-box">
                                                            <span class="product-price">Tk. {{ $product->price }}</span>
                                                        </div><!-- End .price-box -->
                                                    </div><!-- End .product-details -->
                                                </div><!-- End .product -->
                                            @endif
                                        @endforeach
                                    </div><!-- End .featured-col -->
                                </div><!-- End .widget-featured-slider -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .widget -->
                    </div>
                </aside><!-- End .col-md-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="featured-section">
            <div class="container">
                <h2 class="carousel-title">Related Products</h2>

                <div class="featured-products owl-carousel owl-theme owl-dots-top">


                    @foreach($related_product as $product)
                        <div class="product">
                            <figure class="product-image-container" style="min-width: 277px; min-height: 277px;">
                                <a href="{{ route('product.details',$product->id) }}" class="product-image">
                                    <img style="max-width: 277px; max-height: 277px;" src="{{ asset(isset($product->product_image[0])?$product->product_image[0]->file_path:'assets/frontend/images/no-image.jpg') }}" alt="product">
                                </a>
                               {{-- <a href="ajax/product-quick-view.html" class="btn-quickview">Quick View</a>--}}
                            </figure>
                            <div class="product-details">

                                <h2 class="product-title">
                                    <a href="{{ route('product.details',$product->id) }}">{{ $product->name }}</a>
                                </h2>
                                <div class="price-box">
                                    <span class="product-price">Tk. {{ $product->price }}</span>
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
                    @endforeach

                </div><!-- End .featured-proucts -->
            </div><!-- End .container -->
        </div><!-- End .featured-section -->

@endsection




@push('library-css')

@endpush



@push('custom-css')

@endpush



@push('library-js')

@endpush



@push('custom-js')

@endpush
