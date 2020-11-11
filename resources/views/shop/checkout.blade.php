<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from demo.hasthemes.com/pullman-preview/pullman/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Jun 2020 06:54:22 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pullman - eCommerce Bootstrap 4 Template</title>
    <meta name="robots" content="noindex, follow"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="shop/assets/img/favicon.ico">

    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,600,700,800,900%7CPoppins:300,400,500,600,700,800,900"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="shop/assets/css/vendor/bootstrap.min.css">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="shop/assets/css/vendor/font-awesome.min.css">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="shop/assets/css/plugins/slick.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="shop/assets/css/plugins/animate.css">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="shop/assets/css/plugins/nice-select.css">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="shop/assets/css/plugins/jqueryui.min.css">
    <!-- main style css -->
    <link rel="stylesheet" href="shop/assets/css/style.css">

</head>

<body>


<main>
    <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div id ="data">
                        @include('shop.components.checkout')
                        </div>
                    </div>
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <form method="post" action="{{ route('shop.cart.checkout') }}">
                            @csrf
                            <div class="checkout-billing-details-wrap">
                                <h5 class="checkout-title">Thông Tin Cá Nhân</h5>
                                <div class="billing-form-wrap">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-input-item">
                                                <label for="fullname" class="required">Họ Và Tên</label>
                                                <input type="text" class="form-control input-feild" id="fullname"
                                                       name="fullname" value="">
                                                @if ($errors->has('fullname'))
                                                    <span class="invalid-feedback" role="alert"
                                                          style="color:red;">{{ $errors->first('fullname') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="email" class="required">Email </label>
                                        <input type="text" class="form-control input-feild" id="contactEmail"
                                               name="email" value="">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert"
                                                  style="color:red;">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>


                                    <div class="single-input-item">
                                        <label for="address" class="required mt-20">Địa Chỉ</label>
                                        <textarea class="contact-text" name="address"></textarea>
                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert"
                                                  style="color:red;">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>


                                    <div class="single-input-item">
                                        <label for="phone">Số Điện Thoại</label>
                                        <input type="text" class="form-control input-feild" id="contactEmail"
                                               name="phone" value="">
                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert"
                                                  style="color:red;">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>

                                    <div class="single-input-item">
                                        <label for="note">Lưu ý đặt hàng</label>
                                        <textarea class="contact-text" name="note"></textarea>
                                    </div>

                                </div>
                            </div>

                            <!-- Order Payment Method -->
                            <div class="order-payment-method mt-4">
                                <div class="single-payment-method show">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cashon" name="paymentmethod" value="cash"
                                                   class="custom-control-input" checked/>
                                            <label class="custom-control-label" for="cashon">Thanh toán khi giao
                                                hàng</label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="cash">
                                        <p>Thanh toán bằng tiền mặt khi giao hàng.</p>
                                    </div>
                                </div>


                                <div class="single-payment-method">
                                    <div class="payment-method-details" data-method="paypal">
                                        <p>Thanh toán qua MOMO , bạn có thể thanh toán bằng thẻ tín dụng.</p>
                                    </div>
                                </div>
                                <div class="summary-footer-area">
                                    <button type="submit" class="btn btn-sqr">Đặt Hàng</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Order Summary Details -->
                </div>
            </div>
        </div>
        <!-- checkout main wrapper end -->

</main>


<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->


<!-- JS
============================================ -->

<!-- Modernizer JS -->
<script src="shop/assets/js/vendor/modernizr-3.6.0.min.js"></script>
<!-- jQuery JS -->
<script src="shop/assets/js/vendor/jquery-3.3.1.min.js"></script>
<!-- Popper JS -->
<script src="shop/assets/js/vendor/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="shop/assets/js/vendor/bootstrap.min.js"></script>
<!-- slick Slider JS -->
<script src="shop/assets/js/plugins/slick.min.js"></script>
<!-- Countdown JS -->
<script src="shop/assets/js/plugins/countdown.min.js"></script>
<!-- Nice Select JS -->
<script src="shop/assets/js/plugins/nice-select.min.js"></script>
<!-- jquery UI JS -->
<script src="shop/assets/js/plugins/jqueryui.min.js"></script>
<!-- Image zoom JS -->
<script src="shop/assets/js/plugins/image-zoom.min.js"></script>
<!-- image loaded js -->
<script src="shop/assets/js/plugins/imagesloaded.pkgd.min.js"></script>
<!-- masonry  -->
<script src="shop/assets/js/plugins/masonry.pkgd.min.js"></script>
<!-- mailchimp active js -->
<script src="shop/assets/js/plugins/ajaxchimp.js"></script>
<!-- contact form dynamic js -->
<script src="shop/assets/js/plugins/ajax-mail.js"></script>
<!-- google map api -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
<!-- google map active js -->
<script src="shop/assets/js/plugins/google-map.js"></script>
<!-- Main JS -->
<script src="shop/assets/js/main.js"></script>
<!-- JavaScript -->

@yield('js')
</body>


<!-- Mirrored from demo.hasthemes.com/pullman-preview/pullman/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Jun 2020 06:54:23 GMT -->

</html>
