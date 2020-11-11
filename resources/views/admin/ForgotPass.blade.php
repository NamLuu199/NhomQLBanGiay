<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from shreyu.coderthemes.com/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 May 2020 14:56:02 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Đăng nhập trang quản trị</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="/backend/assets/images/favicon.ico">

    <!-- App css -->
    <link href="/backend/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>
<body class="authentication-bg">
<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 p-5">

                                <h6 class="h5 mb-0 mt-4">Khôi phục mật khẩu</h6>
                                <p class="text-muted mt-1 mb-5">
                                    Nhập địa chỉ email của bạn chúng tôi sẽ gửi cho bạn email đổi lại mật khẩu
                                </p>
                                @if(Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if(Session::has('err'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ Session::get('err') }}
                                    </div>
                                @endif
                                <form action="{{route('getForgot')}}" method="post" class="authentication-form">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-control-label">Email</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail icon-dual"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                                        </span>
                                            </div>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="hello@coderthemes.com">
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Gửi</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Quay về <a href="/admin" class="text-primary font-weight-bold ml-1">Đăng nhập</a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<!-- Vendor js -->
<script src="/backend/assets/js/vendor.min.js"></script>

<!-- App js -->
<script src="/backend/assets/js/app.min.js"></script>

</body>

<!-- Mirrored from shreyu.coderthemes.com/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 May 2020 14:56:02 GMT -->
</html>
