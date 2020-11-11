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
                                    Đặt lại mật khẩu của bạn
                                </p>
                                @if(Session::has('err'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ Session::get('err') }}
                                    </div>
                                @endif
                                <form action="{{route('newPass',)}}" method="post" class="authentication-form">
                                    @csrf
                                    <input type="text" name="token" value="{{ $info }}" hidden="">
                                    <div class="form-group mt-4">
                                        <label class="form-control-label">Mật Khẩu</label>

                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock icon-dual"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                                        </span>
                                            </div>
                                            <input type="password" class="form-control" id="password" placeholder="Mật khẩu" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label class="form-control-label">Xác nhận lại mật khẩu</label>

                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock icon-dual"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                                        </span>
                                            </div>
                                            <input type="password" class="form-control" id="confirm" placeholder="Xác nhận mật khẩu" name="confirm">
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
