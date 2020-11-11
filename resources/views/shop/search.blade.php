@extends('shop.layouts.main')
@section('content')
    <!-- page main wrapper start -->
    <div class="breadcrumb-area ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb  mt-2">
                                <li class="breadcrumb-item"><a href="/" class="text-secondary"><i
                                            class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="javarscript:void(0)" class="text-secondary">/ Tìm
                                        Kiếm</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <!-- shop main wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="shop-product-wrapper">
                        @if($products->total() == 0)
                            <h3 class="mb-4">
                                <span class="cat-name">Không tìm thấy "{{ $keyword }}"</span>
                            </h3>
                        @else
                            <h3 class="mb-4">
                                <span
                                    class="cat-name">Có ({{ $totalResult }}) kết quả tìm kiếm "{{ $keyword }}"   </span>
                            </h3>
                            <!-- product item list wrapper start -->
                            <div class="shop-product-wrap grid-view row mbn-30">
                                <!-- product single item start -->
                                @foreach ($products as $product)
                                    <div class="col-md-3 col-sm-6">
                                        <!-- product grid start -->
                                        <div class="product-item">
                                            <div class="product-thumb">
                                                <a href="{{route('shop.product',['slug'=>$product->slug,'id'=>$product->id])}}">
                                                    <img src="{{asset($product->image)}}" alt="product thumb">
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
                                            <div class="product-content " style="height: 200px">
                                                <div class="product-caption">
                                                    <h6 class="product-name">
                                                        <a href="{{route('shop.product',['slug'=>$product->slug,'id'=>$product->id])}}">{{$product->name}}</a>
                                                    </h6>
                                                    <div class="price-box">
                                                        <span class="price-old"><del>{{ number_format($product->price,0,",",".") }} <span
                                                                    style="text-transform: lowercase">đ</del></span>
                                                        <span class="price-regular">{{ number_format($product->sale,0,",",".") }} <span
                                                                style="text-transform: lowercase">đ</span>
                                                    </div>
                                                    <a class="add-to-cart" href="cart.html"><i
                                                            class="fa fa-shopping-cart"></i></a>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- product grid end -->
                                    </div>
                            @endforeach
                            <!-- product single item start -->
                            </div>
                            <!-- product item list wrapper end -->

                            <!-- start pagination area -->
                            @if($products->hasPages())
                                <div class="paginatoin-area shadow-bg text-center">
                                    {{$products->render('vendor.pagination.pagination-page')}}
                                </div>
                            @endif
                        <!-- end pagination area -->
                        @endif
                    </div>
                </div>
                <!-- shop main wrapper end -->
            </div>
        </div>
    </div>
@endsection
