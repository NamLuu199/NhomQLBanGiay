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
                                    <div class="col-md-12 p-5">

                                        <h6 class="h4 mb-0 mt-4 mb-3">Đăng nhập trang quản trị</h6>

                                        <form action="{{route('admin.postLogin')}}" method="POST" class="authentication-form">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-control-label">Email</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="mail"></i>
                                                        </span>
                                                    </div>
                                                    <input type="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Email" name="email">
                                                </div>
                                                 @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert" style="color:red;">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group mt-4">
                                                <label class="form-control-label">Mật Khẩu</label>

                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password" class="form-control" id="password"
                                                        placeholder="Mật khẩu" name="password">
                                                </div>
                                                @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert" style="color:red;">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group mb-4">
                                                <div class="d-flex justify-content-between">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="checkbox-signin" checked name="remember">
                                                        <label class="custom-control-label" for="checkbox-signin">Nhớ tài khoản</label>
                                                    </div>
                                                    <div>
                                                        <a href="{{route('forgot')}}">Quên mật khẩu</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (session('msg'))
                <div class="form-group has-feedback"><p href="#" style="color: red">{{ session('msg') }}</p></div>
            @endif
                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary btn-block" type="submit"> Đăng nhập
                                                </button>
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
