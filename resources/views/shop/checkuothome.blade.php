@extends('shop.layouts.main')

@section('content')
    <section class="main-content-section">
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="d-flex align-items-center flex-column">
                            <div class="d-flex justify-content-center align-items-center tick">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </div>
                            <h3 style="margin-top: 50px; text-align: center">{{ session('msg') ? session('msg') : '' }}</h3>
                            <div>
                                <a href="/" class="btn btn-sqr mt-3">Về trang chủ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
