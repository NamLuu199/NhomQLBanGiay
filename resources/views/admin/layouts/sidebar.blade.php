<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
        <img src="{{asset(Auth::user()->avatar)}}" class="avatar-sm rounded-circle mr-2" alt="{{ Auth::user()->name }}" />
        <img src="{{asset(Auth::user()->avatar)}}" class="avatar-xs rounded-circle mr-2" alt="{{ Auth::user()->name }}" />

        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0">{{ Auth::user()->name }}</h6>
            <span class="pro-user-desc">{{ Auth::user()->role_id == 1 ? 'Quản Trị Viên' :'Cộng Tác Viên' }}</span>
        </br>
        <a href="{{ Route('admin.logout') }}">
            <span style="font-size: 12px">Đăng xuất</span>
        </a>
    </div>
</div>
<div class="sidebar-content">
    <!--- Sidemenu -->
    <div id="sidebar-menu" class="slimscroll-menu">
        <ul class="metismenu" id="menu-bar">
            <li class="menu-title">Navigation</li>
            <li>
                <a href="{{route('admin.dashboard')}}">
                    <i data-feather="home"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.order.index')}}">
                    <i data-feather="grid"></i>
                    <span class="badge badge-success float-right">{{$newOrders}}</span>
                    <span>Đơn Hàng</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.category.index')}}">
                    <i data-feather="calendar"></i>
                    <span> Danh Mục </span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.product.index')}}">
                    <i data-feather="inbox"></i>
                    <span> Sản Phẩm </span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.coupon.index')}}">
                    <i data-feather="inbox"></i>
                    <span> Mã giảm giá </span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.banner.index')}}">
                    <i data-feather="briefcase"></i>
                    <span> Banner  </span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.brand.index')}}">
                    <i data-feather="bookmark"></i>
                    <span>Thương Hiệu</span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.blog.index')}}">
                    <i data-feather="file-text"></i>
                    <span> Blog </span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.user.index')}}">
                    <i data-feather="layout"></i>
                    <span> User </span>

                </a>
            </li>
            <li>
                <a href="{{route('admin.vendor.index')}}">
                    <i data-feather="grid"></i>
                    <span>Nhà Cung Cấp</span>

                </a>
            </li>
            <li>
                <a href="{{route('admin.page.index')}}">
                    <i data-feather="grid"></i>
                    <span>Page</span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.contact.index')}}">
                    <i data-feather="package"></i>
                    <span>Phản hồi khách hàng</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.setting.index') }}">
                    <i data-feather="package"></i>
                    <span>Cấu hình website</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.AboutUs.index') }}">
                    <i class=" uil-dropbox"></i>
                    <span>Về Chúng Tôi</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>
</div>
<!-- Sidebar -left -->

</div>
