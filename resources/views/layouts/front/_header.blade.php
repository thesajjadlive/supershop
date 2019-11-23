<div class="header-top">
    <div class="container">
        <div class="header-left header-dropdowns">
            <div class="header-dropdown">
                <a href="#">USD</a>
                <div class="header-menu">
                    <ul>
                        <li><a href="#">EUR</a></li>
                        <li><a href="#">USD</a></li>
                    </ul>
                </div><!-- End .header-menu -->
            </div><!-- End .header-dropown -->

            <div class="header-dropdown">
                <a href="#"><img src="{{ asset('assets/frontend/images/flags/en.png') }}" alt="England flag">ENGLISH</a>
                <div class="header-menu">
                    <ul>
                        <li><a href="#"><img src="{{ asset('assets/frontend/images/flags/en.png') }}" alt="England flag">ENGLISH</a></li>
                        <li><a href="#"><img src="{{ asset('assets/frontend/images/flags/fr.png') }}" alt="France flag">FRENCH</a></li>
                    </ul>
                </div><!-- End .header-menu -->
            </div><!-- End .header-dropown -->

            <div class="dropdown compare-dropdown">
                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                    <i class="icon-retweet"></i> Compare (2)
                </a>

                <div class="dropdown-menu" >
                    <div class="dropdownmenu-wrapper">
                        <ul class="compare-products">
                            <li class="product">
                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></a>
                                <h4 class="product-title"><a href="product.html">Lady White Top</a></h4>
                            </li>
                            <li class="product">
                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></a>
                                <h4 class="product-title"><a href="product.html">Blue Women Shirt</a></h4>
                            </li>
                        </ul>

                        <div class="compare-actions">
                            <a href="#" class="action-link">Clear All</a>
                            <a href="#" class="btn btn-primary">Compare</a>
                        </div>
                    </div><!-- End .dropdownmenu-wrapper -->
                </div><!-- End .dropdown-menu -->
            </div><!-- End .dropdown -->
        </div><!-- End .header-left -->

        <div class="header-right">
            <p class="welcome-msg">Default welcome msg! </p>

            <div class="header-dropdown dropdown-expanded">
                <a href="#">Links</a>
                <div class="header-menu">
                    <ul>
                        <li><a href="my-account.html">MY ACCOUNT </a></li>
                        <li><a href="#">DAILY DEAL</a></li>
                        <li><a href="#">MY WISHLIST </a></li>
                        <li><a href="blog.html">BLOG</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="#" class="login-link">LOG IN</a></li>
                    </ul>
                </div><!-- End .header-menu -->
            </div><!-- End .header-dropown -->
        </div><!-- End .header-right -->
    </div><!-- End .container -->
</div><!-- End .header-top -->

<div class="header-middle">
    <div class="container">
        <div class="header-left">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="Porto Logo">
            </a>
        </div><!-- End .header-left -->

        <div class="header-center">
            <div class="header-search">
                <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                <form action="{{ route('front.product.find') }}" method="get">
                    <div class="header-search-wrapper">
                        <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                        <div class="select-custom">
                            <select id="cat" name="cat">
                                <option value="">All Categories</option>

                                @foreach($categories as $id=>$category)
                                    <option value="{{ $id }}">{{ ucfirst($category) }}</option>
                                @endforeach

                            </select>
                        </div><!-- End .select-custom -->
                        <button class="btn" type="submit"><i class="icon-magnifier"></i></button>
                    </div><!-- End .header-search-wrapper -->
                </form>
            </div><!-- End .header-search -->
        </div><!-- End .headeer-center -->

        <div class="header-right">
            <button class="mobile-menu-toggler" type="button">
                <i class="icon-menu"></i>
            </button>
            <div class="header-contact">
                <span>Call us now</span>
                <a href="tel:#"><strong>+000 1584 2578</strong></a>
            </div><!-- End .header-contact -->

            <div class="dropdown cart-dropdown">
                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                    <span class="cart-count"> <span class="totalCartItemHeader">{{ session('cart')!= null ?count(session('cart')):0 }}</span> </span>
                </a>

                <div class="dropdown-menu" >
                    <div class="dropdownmenu-wrapper">

                        <span class="headerCartDetails">
                            <div class="dropdown-cart-header">
    <span>{{ session('cart')!= null ?count(session('cart')):0 }} Items</span>

    <a href="{{ route('cart') }}">View Cart</a>
</div><!-- End .dropdown-cart-header -->
<div class="dropdown-cart-products">


    @php
        $total = 0;
    @endphp


    @if( session('cart') != null)
        @foreach(session('cart') as $item)
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
                <a href="{{ route('remove.cart',$item['product_id']) }}" class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></a>
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

                        </span>

                        <div class="dropdown-cart-action">
                            <a href="{{route('checkout')}}" class="btn btn-group-sm">Checkout</a>
                            <a href="{{ route('cart') }}" class="btn btn-group-sm">Cart</a>
                        </div><!-- End .dropdown-cart-total -->
                    </div><!-- End .dropdownmenu-wrapper -->
                </div><!-- End .dropdown-menu -->
            </div><!-- End .dropdown -->
        </div><!-- End .header-right -->
    </div><!-- End .container -->
</div><!-- End .header-middle -->

<div class="header-bottom sticky-header">
    <div class="container">
        <nav class="main-nav">
            <ul class="menu sf-arrows">
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                <li class="megamenu-container">
                    <a href="{{ route('front.product.index') }}">All Products !</a>
                </li>

                <li>
                    <a href="{{ route('front.product.index') }}" class="sf-with-ul">Categories</a>

                    <ul>
                        <li> <a href="{{ route('front.product.index') }}">All<span class="tip tip-new">New!</span></a></li>
                        @foreach($categories as $id=>$category)
                            <li><a href="{{ route('front.product.index', $id) }}">{{ $category }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li>
                    <a href="{{ route('front.product.index') }}" class="sf-with-ul">Brands</a>

                    <ul>
                        @foreach($brands as $id=>$brand)
                            <li><a href="{{ route('front.product.brand', $id) }}">{{ $brand }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li>
                    <a href="#" class="sf-with-ul">Pages</a>

                    <ul>
                        @foreach($categories as $id=>$category)
                            <li><a href="{{ route('front.product.index', $id) }}">{{ $category }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="#" class="sf-with-ul">Features</a>
                    <ul>
                        <li><a href="#">Header Types</a></li>
                        <li><a href="#">Footer Types</a></li>
                    </ul>
                </li>
                <li class="float-right buy-effect"><a href="#"><span>Special Offer <span class="tip tip-hot">Hot!</span></span></a></li>
            </ul>
        </nav>
    </div><!-- End .header-bottom -->
</div><!-- End .header-bottom -->
