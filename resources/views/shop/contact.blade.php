@extends('shop.layouts.main')
@section('content')
    <!-- contact area start -->
    @if (session('msg'))
        <div class="container">
            <div class="alert alert-success mt-4" role="alert">
                {{ session('msg') }}
            </div>
        </div>
    @endif
    <div class="contact-area section-padding pt-0 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-message">
                        <h4 class="contact-title">Gửi Thông Tin Liên Hệ</h4>
                        <form class="form-horizontal" form role="form" action="{{route('shop.contact.store')}}"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input id="name" name="name" placeholder="Tên *" type="text" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input id="phone" name="phone" placeholder="Điện Thoại *" type="text" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input id="email" name="email" placeholder="Email *" type="text" required>
                                </div>
                                <div class="col-12">
                                    <div class="contact2-textarea text-center">
                                        <textarea placeholder="Nội dung *" name="content" class="form-control2"
                                                  required=""></textarea>
                                    </div>
                                    <div class="contact-btn">
                                        <button class="btn btn-sqr" type="submit" name="submit">Gửi</button>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    <p class="form-messege"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-info">
                        <h4 class="contact-title">Liên Hệ Với Chúng Tôi</h4>
                        <p>Mọi thắc mắc xin vui lòng liên hệ với chúng tôi qua</p>
                        <ul>
                            <li><i class="fa fa-fax"></i> Địa Chỉ : Hà Nội</li>
                            <li><i class="fa fa-envelope-o"></i> E-mail: hiendeptrai@gmail.com</li>
                            <li><i class="fa fa-phone"></i>0869588581</li>
                        </ul>
                        <div class="working-time">
                            <h6>Giờ Làm Việc</h6>
                            <p><span>Thứ 2 – Thứ 6:</span>8 Giờ Sáng – 22 Giờ Tối</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->
@endsection
