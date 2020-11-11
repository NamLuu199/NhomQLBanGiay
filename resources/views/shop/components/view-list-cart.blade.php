<!-- cart main wrapper start -->

@if(Session::has("Cart") !=null)
    @if(Session::get('Cart')->totalQuanty !== null && Session::get('Cart')->totalPrice !== null)
        <div class="section-bg-color" id="list-cart">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Cart Table Area -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="pro-thumbnail" style="width: 200px">Ảnh Sản Phẩm</th>
                                <th class="pro-title" style="max-width: 400px">Tên Sản Phẩm</th>
                                <th class="pro-price">Giá</th>
                                <th class="pro-quantity">Số Lượng</th>
                                <th class="pro-subtotal">Tổng Giá</th>
                                <th class="pro-subtotal">Cập Nhật</th>
                                <th class="pro-remove">Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach (Session::get('Cart')->products as $item)
                                <tr id="item-{{$item['productInfo']->id}}">
                                    <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                                                               src="{{asset($item['productInfo']->image)}}"
                                                                               alt="Product"/></a></td>
                                    <td class="pro-title"><a href="#">{{$item['productInfo']->name}}</a></td>
                                    @if(!empty($item['productInfo']->sale))
                                    <td class="pro-price"><span>{{number_format($item['productInfo']->sale)}}đ</span>
                                    @else
                                    <td class="pro-price"><span>{{number_format($item['productInfo']->price)}}đ</span>
                                    @endif
                                    </td>
                                    <td class="pro-quantity">
                                        <div class="pro-qty"><input id="quanty-item-{{$item['productInfo']->id}}"
                                                                    type="text" value="{{trim($item['quanty'])}}"></div>
                                    </td>
                                    <td class="pro-subtotal"><span>{{number_format($item['price'])}}đ</span></td>
                                    <td class="pro-update">
                                        <div class="cart-update">
                                            <a href="javascript:"
                                               onclick="SaveListItemCart( {{$item['productInfo']->id}} )"
                                               class="btn btn-sqr">Cập nhật</a>
                                        </div>
                                    </td>
                                    <td class="pro-remove"><a href="javascript:"><i class="fa fa-trash-o"
                                                                                   onclick="removeViewCart({{$item['productInfo']->id}})"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5 ml-auto">
                    <!-- Cart Calculation Area -->
                    <div class="cart-calculator-wrapper">
                        <div class="cart-calculate-items">
                            <h6>Tổng đơn hàng</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Tổng số lượng</td>
                                        <td>{{ isset(Session::get('Cart')->totalQuanty) ? number_format(Session::get('Cart')->totalQuanty): '0'}}
                                        </td>
                                    </tr>
                                    <tr class="total">
                                        <td>Tổng tiền</td>
                                        <td class="total-amount">
                                            {{isset(Session::get('Cart')->totalPrice) ? number_format(Session::get('Cart')->totalPrice): '0'}}
                                            đ
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <a href="{{route('shop.cart')}}" class="btn btn-sqr d-block">Thanh Toán</a>
                    </div>
                </div>
            </div>

        </div>
    @endif
@else
    <div class="section-bg-color" id="list-cart">
        <p>Giỏ hàng trống</p>
    </div>
@endif

<!-- cart main wrapper end -->
