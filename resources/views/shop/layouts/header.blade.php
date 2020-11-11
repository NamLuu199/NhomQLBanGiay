<div class="main-header d-none d-lg-block">
    <!-- header middle area start -->
    <div class="header-middle-area p-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="white-bg">
                        <div class="row">
                            <!-- start logo area -->
                            <div class="col-lg-4">
                                <div class="logo-2">
                                    <a href="/">
                                        <img src="{{ asset($settings->image) }}" alt="Brand Logo">
                                    </a>
                                </div>
                            </div>
                            <!-- start logo area -->

                            <!-- mini cart area start -->
                            <div class="col-lg-8">
                                <div class="header-right">
                                    <div class="header-configure-area">
                                        <ul class="nav justify-content-between">
                                            <li class="header-call d-flex align-items-center">
                                                <div class="call-icon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <span>PHONE:<a
                                                        href="tel:+880123456789">{{$settings->hotline}}</a></span>
                                            </li>
                                            <li class="search-wrapper-inner">
                                                <form action="{{ route('shop.search') }}" method="GET"
                                                      class="search-box-2">
                                                    <input type="text" class="search-field-2" name="tu-khoa"
                                                           placeholder="Nhập từ khóa tìm kiếm"
                                                           value="{{ isset($keyword) ? $keyword : '' }}">
                                                    <button type="submit" class="search-btn-2"><i
                                                            class="fa fa-search"></i></button>
                                                </form>
                                            </li>
                                            <div id="item-cart">
                                                @include('shop.components.cart')
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- mini cart area end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header middle area end -->
</div>
