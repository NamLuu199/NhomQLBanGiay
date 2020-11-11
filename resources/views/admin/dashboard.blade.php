@extends('admin.layouts.main')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row page-title align-items-center">
            <div class="col-sm-4 col-xl-6">
                <a class="btn btn-primary" href="/">Trang Chủ</a>
            </div>
        </div>
        <!-- content -->
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="media p-3">
                            <div class="media-body">
                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Đơn Hàng</span>
                                <h2 class="mb-0">{{ $numOrder }}</h2>
                            </div>
                            <div class="align-self-center">
                               <span style="font-size: 44px"><i class="uil uil-shopping-cart-alt"></i></span>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">Sản Phẩm</span>
                                    <h2 class="mb-0">{{ $numProduct }}</h2>
                                </div>
                                <div class="align-self-center">
                                    <span style="font-size: 44px"><i class="uil uil-database-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="media p-3">
                                    <div class="media-body">
                                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">User</span>
                                        <h2 class="mb-0">{{ $numUser }}</h2>
                                    </div>
                                    <div class="align-self-center">
                                        <span style="font-size: 44px"><i class="uil uil-user-circle"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="media p-3">
                                        <div class="media-body">
                                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">Bài Viết</span>
                                            <h2 class="mb-0">{{ $numBlog }}</h2>
                                        </div>
                                        <div class="align-self-center">
                                            <span style="font-size: 44px"><i class="uil uil-file-edit-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    

            </div>
        </div> <!-- content -->

        @endsection