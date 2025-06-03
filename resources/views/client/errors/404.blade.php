@extends('client.layout.master')

@section('content')
    <!-- 404 Error Area start -->
    <section class="error-area pt-70 pb-100 rel z-1">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-5 col-lg-6">
                    <div class="error-content rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <h1>OPPS! </h1>
                        <div class="section-title mt-15 mb-25">
                            <h2>Không thể tìm thấy trang này</h2>
                        </div>
                        <p>Trang bạn muốn truy cập không tồn tại.</p>
                        <a href="{{ route('home') }}" class="theme-btn mt-10">
                            <span data-hover="Quay lại">Quay lại</span>
                        </a>
                        {{-- <form class="newsletter-form mt-40 mb-50" action="#">
                            <input id="news-email" type="text" placeholder="Search keyword" required>
                            <button type="submit" class="theme-btn bgc-secondary style-two">
                                <span data-hover="Search">Search</span>
                                <i class="fal fa-arrow-right"></i>
                            </button>
                        </form>
                        <div class="keywords">
                            <a href="blog.html">Travel</a>
                            <a href="blog.html">Luxury Hotel</a>
                            <a href="blog.html">Indonesia</a>
                            <a href="blog.html">Sea Beach</a>
                            <a href="blog.html">Camping</a>
                            <a href="blog.html">Hiking</a>
                            <a href="blog.html">Fishing</a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="error-images" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <img src="{{ asset('client/images/newsletter/404.png') }}" alt="404 Error">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 404 Error Area end -->
@endsection