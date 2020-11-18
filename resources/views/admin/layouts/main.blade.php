<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from shreyu.coderthemes.com/[Content_Types].xml by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 May 2020 14:57:12 GMT -->
<head>
        <meta charset="utf-8" />
        <title> Admin & Dashboard </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="{{ asset('') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="shop/assets/img/favicon.ico">

        <!-- plugins -->
        <link href="/backend/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="/backend/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/backend/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/backend/assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="/backend/assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="/backend/assets/css/Chart.min.css" rel="stylesheet" type="text/css" />

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script type="text/javascript">
        var base_url = '{{ url('/') }}';
    </script>

    </head>

    <body>
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            @include('admin.layouts.header')
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.layouts.sidebar')

            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
            <!-- Footer Start -->
            @include('admin.layouts.footer')
            <!-- Footer End -->

        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->

        <!-- /Right-bar -->

        <!-- Right bar overlay-->

        <!-- Vendor js -->
        <script src="/backend/assets/js/vendor.min.js"></script>

        <!-- optional plugins -->
        <script src="/backend/assets/libs/moment/moment.min.js"></script>
        <script src="/backend/assets/libs/apexcharts/apexcharts.min.js"></script>
        <script src="/backend/assets/libs/flatpickr/flatpickr.min.js"></script>

        <!-- page js -->
        <script src="/backend/assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="/backend/assets/js/app.min.js"></script>
        <script src="/backend/assets/js/Chart.bundle.min.js"></script>
        <script src="/backend/assets/js/Chart.min.js"></script>

        <!-- Vị trí dùng để chèn code Javascript -->
         @yield('my_javascript')
         <script src="/backend/assets/js/main.js"></script>
         <script src="/backend/assets/js/pages/ckeditor/ckeditor.js"></script>

    </body>


</html>
