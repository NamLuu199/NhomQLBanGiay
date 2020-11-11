
<li class="mini-cart-wrap" >
    <a href="{{route('shop.cart.add-view-cart')}}"
       class="minicart-btn minicart-btn-style_2">
        <i class="fa fa-shopping-cart"></i>
        @if(Session::has("Cart") !=null)
            <span id="total-quanty-show"
                  class="notification">{{Session::get("Cart")->totalQuanty}}</span>
        @else
            <span id="total-quanty-show" class="notification">0</span>
        @endif
    </a>

    @if(Session::has("Cart") != null)
        <div class="cart-list-wrapper">
            <ul class="cart-list">
                @foreach (Session::get('Cart')->products as $item)
                    <li>
                        <div class="cart-img">
                            <a href="{{ route('shop.product', ['category' => $item['productInfo']->category->slug , 'slug' => $item['productInfo']->slug , 'id' => $item['productInfo']->id]) }}"><img
                                    src="{{asset($item['productInfo']->image)}}"
                                    alt=""></a>
                        </div>
                        <div class="cart-info">
                            <h6 class="product-name"><a
                                    href="{{ route('shop.product', ['category' => $item['productInfo']->category->slug , 'slug' => $item['productInfo']->slug , 'id' => $item['productInfo']->id]) }}">{{$item['productInfo']->name}}</a>
                            </h6>
                            <span
                                class="cart-qty">Số lượng:{{$item['quanty']}}</span>
                            @if(empty($item['productInfo']->sale))
                            <span class="item-price">{{number_format($item['productInfo']->price,0,",",".")}}đ</span>
                            @else
                                <span class="item-price">{{number_format($item['productInfo']->sale,0,",",".")}}đ</span>
                            @endif

                        </div>
                        <div class="del-icon">
                            <i class="fa fa-times"
                               data-id="{{$item['productInfo']->id}}"></i>
                        </div>
                    </li>
                @endforeach
            </ul>
            <ul class="minicart-pricing-box">
                <li class="total">
                    <span>Tổng Tiền:</span>
                    <span><strong>{{number_format(Session::get('Cart')->totalPrice,0,",",".")}}đ</strong></span>
                    <input hidden id="total-quanty-cart" type="number"
                           value="{{ Session::get('Cart')->totalQuanty }}">
                </li>
            </ul>
            <div class="minicart-button">
                <a href="{{route('shop.cart.add-view-cart')}}"><i
                        class="fa fa-shopping-cart"></i>Giỏ hàng</a>
                <a href="{{route('shop.cart')}}"><i
                        class="fa fa-share"></i> Thanh toán</a>
            </div>
        </div>

    @else
        <div class="cart-list-wrapper">
            <span>Giỏ hàng trống</span>
        </div>
    @endif
</li>
