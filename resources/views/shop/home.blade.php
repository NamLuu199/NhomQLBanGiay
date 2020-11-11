@extends('shop.layouts.main')

@section('content')


    <!-- slider area start -->
    <section class="hero-slider hero-slider--style-3">
        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
            <!-- single slider item start -->
            @foreach($sliders as $slider)
                <div class="hero-single-slide">
                    <a href="{{ $slider->url ? $slider->url : '#' }}" target="{{$slider->target == 1 ? '_blank' : ''}}">
                        <div class="hero-slider-item bg-img" data-bg="{{$slider->image}}">
                        </div>
                    </a>
                </div>
        @endforeach
        <!-- single slider item start -->
        </div>
    </section>
    <!-- slider area end -->
    <!-- banner statistics area start -->
    <div class="banner-statistics-area section-padding pb-0">
        <div class="container">
            <div class="row mtn-30">
                @foreach($banners as $banner)
                    <div class="col-md-6">
                        <div class="banner-statistics mt-30">
                            <a href="{{ $banner->url ? $banner->url : '#' }}"  target="{{$banner->target == 1 ? '_blank' : ''}}">
                                <img src="{{$banner->image}}" alt="banner thumb" class="img-fluid">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- banner statistics area end -->

    <!-- service policy start -->
    <section class="service-policy mt-30">
        <div class="container">
            <div class="row row-10">
                @foreach ($aboutus as $item)
                    <div class="col-lg-3 col-sm-6">

                        <div class="policy-block text-center">
                            <div class="policy-icon">
                                <i class=" fa {{$item->icon}} "></i>
                            </div>
                            <div class="policy-text">
                                <h4 class="policy-title">{{$item->title}}</h4>
                                <p class="policy-desc">{!! $item->description !!}</p>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- service policy end -->

    <!-- Related product area start -->


    <section class="product-gallery section-padding">
        <div class="container">

            <div class="row mt-3">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title">SẢN PHẨM MỚI</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel--4 slick-row-5 slick-arrow-style">
                        <!-- product single item start -->
                        @foreach ($products as $product)
                            <div class="product-item ">
                                <div class="product-thumb ">
                                    <a href="{{ route('shop.product', ['category' => $product->category->slug , 'slug' => $product->slug , 'id' => $product->id]) }}"
                                       title="{{ $product->name }}">
                                        <img src="{{ asset($product->image)  }}" alt="product thumb" class="">
                                    </a>
                                    @if($now->diffInDays($product->created_at) < 30)
                                        <div class="product-label">
                                            <span>Mới</span>
                                        </div>
                                    @endif
                                    @if(!empty($product->sale))
                                        <div class="discount-label">
                                            <span>Sale</span>
                                        </div>
                                    @endif

                                </div>
                                <div class="product-content ">
                                    <div class="product-caption">
                                        <h6 class="product-name" style="height: 100px">
                                            <a href="{{ route('shop.product', ['category' => $product->category->slug , 'slug' => $product->slug , 'id' => $product->id]) }}">{{$product->name }}</a>
                                        </h6>
                                        <div class="price-box">
                                    <span class="price-old"><del>
                                            {{ number_format($product->price,0,",",".") }}đ
                                        </del></span>
                                            <span class="price-regular">
                                        {{  number_format($product->sale,0,",",".") }}đ
                                    </span>
                                        </div>
                                        <a class="add-to-cart" onclick="AddCart({{$product->id}})" href="javascript:"><i
                                                class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <!-- product single item end -->
                    </div>

                </div>
            </div>

        </div>

    </section>
    <section class="product-gallery section-padding">
        <div class="container">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title">SẢN PHẨM HOT</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 ">
                    <div class="product-carousel--4 slick-row-5 slick-arrow-style">
                        <!-- product single item start -->
                        @foreach ($hotProducts as $product)
                            <div class="product-item ">
                                <div class="product-thumb ">
                                    <a href="{{ route('shop.product', ['category' => $product->category->slug , 'slug' => $product->slug , 'id' => $product->id]) }}"
                                       title="{{ $product->name }}" title="{{ $product->name }}">
                                        <img src="{{ asset($product->image)  }}" alt="product thumb" class="">
                                    </a>
                                    @if($now->diffInDays($product->created_at) < 30)
                                        <div class="product-label">
                                            <span>Mới</span>
                                        </div>
                                    @endif


                                    @if(!empty($product->sale))
                                        <div class="discount-label">
                                            <span>Sale</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="product-content ">
                                    <div class="product-caption">
                                        <h6 class="product-name" style="height: 100px">
                                            <a href="{{ route('shop.product', ['category' => $product->category->slug , 'slug' => $product->slug , 'id' => $product->id]) }}">{{$product->name }}</a>
                                        </h6>
                                        <div class="price-box">
                                    <span class="price-old"><del>
                                            {{ number_format($product->price,0,",",".") }}đ
                                        </del></span>
                                            <span class="price-regular">
                                        {{  number_format($product->sale,0,",",".") }}đ
                                    </span>
                                        </div>
                                        <a class="add-to-cart" onclick="AddCart({{$product->id}})" href="javascript:"><i
                                                class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <!-- product single item end -->
                    </div>

                </div>
            </div>
        </div>

    </section>
    <!-- Related product area end -->

    {{-- //////////////////////Blog/////////////////////////////////////// --}}
    <!-- latest blog area start -->
    <section class="latest-blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title">TIN TỨC MỚI NHẤT</h3>
                        <!-- <h4 class="sub-title">Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius
                            claritas est etiam processus dynamicus, qui sequitur mutationem.</h4> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="blog-carousel-active slick-row-5 slick-arrow-style">
                    @foreach ($newblogs as $blog)
                        <!-- blog single post start -->
                            <div class="blog-slide-item">
                                <div class="blog-post-item">
                                    <div class="blog-thumb">
                                        <a href="{{route('shop.blog',
                                ['slug'=>$blog->slug,'id'=>$blog->id])}}">
                                            <img src="{{asset($blog->image)}}" alt="{{$blog->title}}">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <h6 class="blog-title">
                                            <a href="{{route('shop.blog',
                                ['slug'=>$blog->slug,'id'=>$blog->id])}}">{{$blog->title}}</a>
                                        </h6>
                                        <div class="blog-meta">
                                            <span><i class="fa fa-calendar"></i>{{$blog->created_at}}</span>
                                        </div>
                                        <p class="blog-desc">{!! strip_tags(Str::limit($blog->description,100)) !!}</p>
                                        <a class="btn read-more" href="{{route('shop.blog',
                                ['slug'=>$blog->slug,'id'=>$blog->id])}}">Đọc tiếp</a>
                                    </div>
                                </div>
                            </div>
                            <!-- blog single post end -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest blog area end -->
@endsection
