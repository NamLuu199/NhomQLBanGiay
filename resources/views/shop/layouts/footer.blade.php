<footer class="black-bg">
    <div class="footer-middle-area">
        <div class="container">
            <div class="row mtn-30">
                <div class="col-lg-6 col-sm-12">
                    <div class="address-block mt-30">
                        <div class="footer-logo">
                            <a href="/">
                                <img src="{{asset($settings->image2)}}" alt="Brand Logo">
                            </a>
                        </div>
                        <address class="address-info d-flex align-items-center">
                            <i class="fa fa-map-marker"></i>
                            <p><span>Địa Chỉ : </span>{{ $settings->address }}.</p>
                        </address>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <address class="address-info email mt-30">
                        <i class="fa fa-envelope"></i>
                        <p><span>EMAIL : </span><a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a></p>
                    </address>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <address class="address-info email mt-30">
                        <i class="fa fa-phone"></i>
                        <p><span>PHONE : </span><a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a></p>
                    </address>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="footer-link">
                        @foreach ($pages as $item)
                            <a href="{{route('shop.page',['slug'=>$item->slug,'id'=>$item->id])}}">{{$item->title}}</a>
                        @endforeach
                        <a href="{{url('/lien-he')}}">LIÊN HỆ</a>
                        <a href="{{route('shop.sorder')}}">TRA CỨU ĐƠN HÀNG</a>
                    </div>
                    <p class="copyright">
                        Copyright <a href="/">Pullman</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
