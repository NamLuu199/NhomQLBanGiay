@extends('shop.layouts.main')

@section('content')
    <div class="breadcrumb-area  ">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb mt-2">
                                <li class="breadcrumb-item"><a href="/" class="text-secondary"><i
                                            class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a class="text-secondary" href="javascript:void(0)">/</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"><a class="text-secondary"
                                                                                          href="{{ route('shop.category', ['slug' => $cate->slug]) }}">{{$cate->name}}</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <!-- sidebar area start -->
                <div class="col-lg-3 order-2 order-lg-1">
                    <aside class="sidebar-wrapper">
                        <!-- single sidebar start -->
                        <div class="sidebar-single">
                            <form action="{{url('danh-muc/'.$cate->slug.'/filter')}}" method="GET">
                                <div class="slidebar-body">
                                    <div class="product-short">
                                        <select class="nice-select" name="sortby">
                                            <option value="0">Sắp xếp</option>
                                            <option value="asc">Giá (Thấp > Cao)</option>
                                            <option value="desc">Giá (Cao < Thấp)</option>
                                        </select>
                                    </div>
                                </div>
                                </br></br>
                                <h6 class="sidebar-title">Hãng</h6>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container search-list">
                                        @foreach($brandsFilter as $product)
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="brandCheck{{$product->brand_id}}" name="brand_id[]"
                                                           value="{{$product->brand_id}}">
                                                    <label class="custom-control-label"
                                                           id="brandCheck{{$product->brand_id}}"
                                                           for="brandCheck{{$product->brand_id}}">{{$product->name}}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                                <h6 class="sidebar-title pt-4">Giá</h6>
                                <div class="sidebar-body">
                                    <ul class="radio-container search-list">
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="priceCheck1"
                                                       name="price" value="0-3000000">
                                                <label class="custom-control-label" id="priceCheck1"
                                                       for="priceCheck1">Dưới 3tr</label>
                                            </div>
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="priceCheck2"
                                                       name="price" value="3000000-6000000">
                                                <label class="custom-control-label" id="priceCheck1"
                                                       for="priceCheck2">Từ 3tr - 6tr</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="priceCheck3"
                                                       name="price" value="6000000-9000000">
                                                <label class="custom-control-label" id="priceCheck1"
                                                       for="priceCheck3">Từ 6tr - 9tr</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="priceCheck5"
                                                       name="price" value="9000000">
                                                <label class="custom-control-label" id="priceCheck1"
                                                       for="priceCheck5">Trên 9tr</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <button type="submit" class="btn btn-sqr mt-3">Tìm</button>
                                <!-- single sidebar start -->
                            </form>
                        </div>
                        <!-- single sidebar end -->
                    </aside>
                </div>
                <!-- sidebar area end -->
                <!-- shop main wrapper start -->
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-product-wrapper">
                        <!-- product item list wrapper start -->
                        <div id="productData">
                            <div class="shop-product-wrap grid-view row mbn-30">
                                <!-- product single item start -->
                                @foreach ($products as $product)
                                    <div class="col-md-4 col-sm-6">
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
                                            <div class="product-content" style="height: 200px">
                                                <div class="product-caption">
                                                    <h6 class="product-name">
                                                        <a href="{{route('shop.product',['slug'=>$product->slug,'id'=>$product->id])}}">{{$product->name}}</a>
                                                    </h6>
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
                                                    <a class="add-to-cart" onclick="AddCart({{$product->id}})"
                                                       href="javascript:"><i
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
                            @if(empty($products))
                                <p>Không tìm thấy sản phẩm</p>
                            @endif
                        </div>

                    </div>
                </div>
                <!-- shop main wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->

@endsection


