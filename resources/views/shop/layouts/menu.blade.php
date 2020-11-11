<div class="header-main-area sticky d-none d-lg-block">
    <div class="container">
        <div class="row position-relative">
            <div class="col-12">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="category-toggle-wrap">
                            <div class="category-toggle">
                                <a href="/" class="text-white">Trang chủ</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 position-static">
                        <!-- main menu area start -->
                        <div class="main-menu-area">
                            <div class="main-menu">
                                <!-- main menu navbar start -->
                                <nav class="desktop-menu">
                                    <ul>
                                        @if(!empty($categories))
                                            @foreach($categories as $category)
                                                @if(empty($category->parent_id))
                                                    <li class="active"><a
                                                            href="{{ route('shop.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                                                        </a>
                                                        <ul class="dropdown">
                                                            @foreach($category->subcategory as $child)
                                                                <li>
                                                                    <a href="{{ route('shop.category', ['slug' => $child->slug]) }}">{{ $child->name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif
                                        <li class="active"><a href="{{ route('shop.blog-detalis') }}">Tin Tức</li>
                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>
                        <!-- main menu area end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- mobile header start -->
<div class="mobile-header d-lg-none d-md-block sticky black-soft">
    <!--mobile header top start -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="mobile-main-header">
                    <div class="mobile-logo">
                        <a href="/">
                            <img src="{{asset($settings->image2)}}" alt="Brand Logo">
                        </a>
                    </div>
                    <div class="mobile-menu-toggler">

                        <div class="mini-cart-wrap">
                            <a href="{{route('shop.cart.add-view-cart')}}">
                                @if(Session::has("Cart"))
                                    <i class="fa fa-shopping-cart"></i>
                                    <div class="notification">{{Session::get("Cart")->totalQuanty}}</div>
                                @else
                                    <i class="fa fa-shopping-cart"></i>
                                    <div class="notification">0</div>
                                @endif

                            </a>
                        </div>

                        <button class="mobile-menu-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile header top start -->
</div>
<!-- mobile header end -->


<!-- offcanvas mobile menu start -->
<!-- off-canvas menu start -->
<aside class="off-canvas-wrapper">
    <div class="off-canvas-overlay"></div>
    <div class="off-canvas-inner-content">
        <div class="btn-close-off-canvas">
            <i class="fa fa-close"></i>
        </div>

        <div class="off-canvas-inner">
            <!-- search box start -->
            <div class="search-box-offcanvas">
                <form action="{{ route('shop.search') }}" method="GET">
                    <input type="text" name="tu-khoa" placeholder="Nhập từ khóa tìm kiếm"
                           value="{{ isset($keyword) ? $keyword : '' }}">
                    <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <!-- search box end -->

            <!-- mobile menu start -->
            <div class="mobile-navigation">

                <!-- mobile menu navigation start -->
                <nav>
                    <ul class="mobile-menu">
                        @if(!empty($categories))
                            @foreach($categories as $category)
                                @if($category->parent_id == 0)
                                    <li class="menu-item-has-children"><a
                                            href="{{ route('shop.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                                        @if(!empty($category->subcategory))
                                            <ul class="dropdown">
                                                @foreach($category->subcategory as $child)
                                                    <li>
                                                        <a href="{{ route('shop.category', ['slug' => $child->slug]) }}">{{$child->name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        @endif
                        <li><a href="{{url('/lien-he')}}">Tin tức</a></li>
                    </ul>
                </nav>
                <!-- mobile menu navigation end -->
            </div>
            <!-- mobile menu end -->
            <!-- offcanvas widget area start -->
            <div class="offcanvas-widget-area">
                <div class="off-canvas-contact-widget">
                    <ul>
                        <li><i class="fa fa-mobile"></i>
                            <a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a>
                        </li>
                        <li><i class="fa fa-envelope-o"></i>
                            <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- offcanvas widget area end -->
        </div>
    </div>
</aside>
<!-- off-canvas menu end -->
<!-- offcanvas mobile menu end -->
