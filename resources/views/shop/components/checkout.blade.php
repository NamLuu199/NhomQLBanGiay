@if(Session('Cart'))
    @php
        $newCart = Session('Cart');
        $products = $newCart->products;
        $totalPrice = $newCart->totalPrice;
        $totalQuanty = $newCart->totalQuanty;
        $discount = $newCart->discount;
        $coupon = $newCart->coupon;
        $payment = $totalPrice - $discount;
    @endphp
    <div class="order-summary-details">
        <h5 class="checkout-title">Tóm Tắt Đơn Hàng Của Bạn</h5>
        <div class="order-summary-content">
            <!-- Order Summary Table -->
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                <div class="cart-list-wrapper">
                                    <div class="cart-list">
                                        @foreach (Session::get('Cart')->products as $item)
                                            <div class="d-flex mb-2">
                                                <div class="cart-img mr-3">
                                                    <img
                                                        src="{{asset($item['productInfo']->image)}}"
                                                        width="120px" alt="">
                                                </div>
                                                <div class="cart-info" style="width: 400px">
                                                    <h6 class="product-name">
                                                        <p>{{$item['productInfo']->name}}</p></h6>
                                                    <span
                                                        class="cart-qty">Số lượng:{{$item['quanty']}}</span>
                                                    </br>
                                                    <span class="item-price">{{number_format($item['productInfo']->sale,0,",",".")}}đ</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <!-- Checkout Login Coupon Accordion Start -->
                        <div class="checkoutaccordion" id="checkOutAccordion">
                            <div class="card">
                                <h6><span data-toggle="collapse" data-target="#couponaccordion">Nhấn
                                                            vào đây để nhập mã giảm giá của bạn</span></h6>
                                <div id="couponaccordion" class="collapse"
                                     data-parent="#checkOutAccordion">
                                    <div class="card-body">
                                        <div class="cart-update-option">
                                            <div class="apply-coupon-wrapper d-flex">

                                                <input value="{{ $coupon }}" type="text"
                                                       name="coupon_code"
                                                       placeholder="Nhập mã giảm giá" required/>
                                                <button class="btn btn-sqr" id="couponCheck">Áp Dụng</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($errors->any())
                                    <p style="text-align: right;color: red;">{{$errors->first()}}</p>
                                @endif

                            </div>
                        </div>
                        <!-- Checkout Login Coupon Accordion End -->
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-12 ml-auto">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">
                                <h6>Giỏ Hàng Của Bạn</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>Tổng Số Lượng</td>
                                            <td>{{ isset(Session::get('Cart')->totalQuanty) ? number_format(Session::get('Cart')->totalQuanty): '0'}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="total">Tạm tính</td>
                                            <td class="price">
                                                                    <span>{{ number_format($totalPrice ,0,",",".") }}
                                                                        đ</span>
                                            </td>
                                        </tr>
                                        <tr class="total">
                                            <td>Giảm Giá</td>
                                            <td class="total-amount">
                                                {{ number_format($discount ,0,",",".") }} đ
                                            </td>
                                        </tr>
                                        <tr class="total">
                                            <td>Tổng Giá</td>
                                            <td class="total-amount">
                                                {{ number_format($payment ,0,",",".") }} đ
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <a href="/" class="btn btn-sqr mt-3">Về trang chủ</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endif
@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function() {
            $(document).on("click", '#couponCheck', function () {
                    var coupon_code = $("input[name=coupon_code]").val();
                    $.ajax({
                        type: 'GET',
                        url : '{{ route('shop.cart.check-coupon') }}',
                        data : {
                            coupon_code : coupon_code
                        },
                        success: function (response) {
                            $('#data').html(response);
                            alertify.success('Thêm mã giảm giá thành công');
                        }
                    });
                });
        });
    </script>
    @endsection
