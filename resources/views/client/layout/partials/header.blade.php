<header class="main-header header-one">
    <!--Header-Upper-->
    <div class="header-upper bg-white py-30 rpy-0 shadow">
        <div class="container-fluid clearfix">
            <div class="header-inner rel d-flex align-items-center">
                <div class="logo-outer">
                    <div class="logo"><a href="{{ route('home') }}"><img
                                src="{{ asset('client/images/logos/logo-two.png') }}" width="200" alt="Logo"
                                title="Logo"></a></div>
                </div>

                <div class="nav-outer mx-lg-auto ps-xxl-5 clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-lg">
                        <div class="navbar-header">
                            <div class="mobile-logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('client/images/logos/logo-two.png') }}" alt="Logo" title="Logo">
                                </a>
                            </div>

                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-bs-toggle="collapse"
                                data-bs-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix shadow">
                            <ul class="navigation clearfix">
                                <li class="{{ Request::url() == route('home') ? 'active' : '' }}"><a
                                        href="{{ route('home') }}">Trang chủ</a></li>
                                <li
                                    class="dropdown {{ Request::is('tour/list') || Request::is('tour/detail/*') || Request::is('travel-guide/list') ? 'active' : '' }}">
                                    <a href="#">Tours</a>
                                    <ul>
                                        <li><a href="{{ route('tour.list') }}">Tour</a></li>
                                        <li><a href="{{ route('travel-guide.list') }}">Hướng dẫn viên</a></li>
                                    </ul>
                                </li>
                                <li class="{{ Request::url() == route('about') ? 'active' : '' }}"><a
                                        href="{{ route('about') }}">Giới thiệu</a></li>
                                <li class="{{ Request::url() == route('destination.list') ? 'active' : '' }}"><a
                                        href="{{ route('destination.list') }}">Điểm đến</a>
                                </li>
                                <li class="{{ Request::url() == route('contact') ? 'active' : '' }}"><a
                                        href="{{ route('contact') }}">Liên hệ</a></li>
                                <li class="{{ Request::url() == route('blog.list') ? 'active' : '' }}"><a
                                        href="{{ route('blog.list') }}">Blog</a></li>
                            </ul>
                        </div>

                    </nav>
                    <!-- Main Menu End-->
                </div>

                <!-- Menu Button -->
                <div class="menu-btns py-10">
                    <a href="{{ route('tour.list') }}" class="theme-btn style-two bgc-secondary">
                        <span data-hover="Book Now">Book Now</span>
                        <i class="fal fa-arrow-right"></i>
                    </a>
                    <!-- menu sidbar -->
                    <div class="menu-sidebar">
                        <li class="drop-down">
                            <button class="dropdown-toggle bg-transparent" id="userDropdown" style="color: black">
                                <i class='bx bxs-user bx-tada' style="font-size: 36px; color: black;"></i>
                            </button>
                            @if (Auth::check())
                                <ul class="dropdown-menu" id="dropdownMenu">
                                    <li><a href="">Thông tin cá nhân</a></li>
                                    <li><a href="">Tour đã đặt</a></li>
                                    <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                                </ul>
                            @else
                                <ul class="dropdown-menu" id="dropdownMenu">
                                    <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                                </ul>
                            @endif

                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Header Upper-->
</header>