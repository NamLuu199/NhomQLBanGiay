@extends('shop.layouts.main')

@section('content')
<div class="breadcrumb-area " >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb mt-2">
                            <li class="breadcrumb-item"><a href="/" class="text-secondary"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a class="text-secondary" href="javascript:void(0)" >/</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a class="text-secondary" href="{{ route('shop.category', ['slug' => $category->slug]) }}">{{$product->name}}</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page main wrapper start -->
<div class="shop-main-wrapper section-padding pb-0">
    <div class="container">
        <div class="row">
            <!-- product details wrapper start -->
            <div class="col-lg-12 order-1 order-lg-2">
                <!-- product details inner end -->
                <div class="product-details-inner">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="product-large-slider">
                                <div class="pro-large-img img-zoom ">
                                    <img src="{{ asset($product->image)  }}" alt="product-details" />
                                </div>

                                @foreach ($image as $item_image)
                                <div class="pro-large-img img-zoom ">
                                    <img src="{{ asset($item_image->filename)}}" alt="product-details" />
                                </div>
                                @endforeach
                            </div>
                            <div class="pro-nav slick-row-10 slick-arrow-style">
                                <div class="pro-nav-thumb">
                                    <img src="{{ asset($product->image)  }}" alt="product-details" />
                                </div>
                                @foreach ($image as $item_image)
                                <div class="pro-nav-thumb">
                                    <img src="{{ asset($item_image->filename)}}" alt="product-details" />
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="col-lg-7">
                            <div class="product-details-des">
                                <h3 class="product-name">{{$product->name}}</h3>
                                <div class="price-box">
                                    @if(empty($product->sale))
                                        <span class="price-regular">{{ number_format($product->price,0,",",".") }} <span
                                                style="text-transform: lowercase">đ</span>
                                        @else
                                                <span class="price-old"><del>{{ number_format($product->price,0,",",".") }} <span
                                                            style="text-transform: lowercase">đ</del></span>
                                                <span class="price-regular">{{  number_format($product->sale,0,",",".") }}đ</span>
                                    @endif
                                </div>
                                    <div class="availability">
                                        @if($product->stock > 0)
                                        <i class="fa fa-check-circle"></i> Còn {{$product->stock}} sản phẩm
                                        @else
                                        <i class="fa fa-times"></i> Hết hàng
                                        @endif
                                    </div>
                                    <p class="pro-desc">{{$product->summary}}</p>
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        <h6 class="option-title">qty:</h6>
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1" id="number"></div>
                                        </div>
                                        <div class="action_link">
                                            @if($product->stock > 0)
                                            <a class="btn btn-cart2"  onclick="AddCart({{$product->id}})"
                                                href="javascript:">Thêm Vào Giỏ</a>
                                            @else
                                            <a class="btn btn-cart2"
                                                href="javascript:">Liên hệ</a>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->

                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-padding pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-toggle="tab" href="#tab_one">Mô tả chi tiết sản phẩm</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#tab_three">Bình luận </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_one">
                                                <div class="tab-one">
                                                    <p>{!!$product->description!!}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="tab_three">

                                                <div class="total-reviews">
                                                    <div class="review-box">
                                                        @foreach($product->comments as $comment)
                                                        <div class="comment-id-{{$comment->id}} py-3" style="border-top: 1px solid #e5e5e5"
                                                            >
                                                            <div class="post-author d-flex align-items-center">
                                                                <div class="avatar mr-1">
                                                                    <Strong>{{ substr($comment->name,0,1)}}</Strong>
                                                                </div>
                                                                <Strong> {{$comment->name}} </Strong>
                                                            </div>
                                                            <p>Bình luận: {{ $comment->comment }}</p>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <form action="{{route('comments.store',[$product->id])}}" method="POST" class="review-form">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label for="name" class="col-form-label"><span class="text-danger">*</span>
                                                            Họ & Tên</label>
                                                            <input type="text" name="name" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label for="email" class="col-form-label"><span class="text-danger">*</span>
                                                            Email</label>
                                                            <input type="email" name="email" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label for="comment" class="col-form-label"><span class="text-danger">*</span>
                                                            Your Review</label>
                                                            <textarea class="form-control" name="comment" required></textarea>

                                                        </div>
                                                    </div>
                                                    <div class="buttons">
                                                        <button class="btn btn-sqr" type="submit">Gửi</button>
                                                    </div>
                                                </form> <!-- end of review-form -->
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details reviews end -->
                </div>
                <!-- product details wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->
    <!-- Related product area start -->
    <section class="product-gallery section-padding">
        <div class="container">
            <div class="row">
                <div class="section-title text-center">
                    <h3 class="title">SẢN PHẨM LIÊN QUAN</h3>
                </div>
                <div class="col-12">
                    <div class="product-carousel--4 slick-row-5 slick-arrow-style">
                        <!-- product single item start -->
                        @foreach ($relatedProducts as $product)
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
                                    <h6 class="product-name" style="height: 70px">
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
                                    <a class="add-to-cart" onclick="AddCart({{$product->id}})" href="javascript:"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- product single item end -->
                    </div>
                </div>
            </div>

        </section>
        <!-- Related product area end -->
        @endsection
