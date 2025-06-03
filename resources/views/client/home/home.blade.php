@extends('client.layout.master')

@section('banner')
    @include('client.layout.partials.banner_home')
    @include('client.layout.partials.search')
@endsection

@section('title')
    Du lịch và booking tour
@endsection

@section('content')
    <!-- Destinations Area start -->
    <section class="destinations-area bgc-white pt-100 pb-70 rel z-1">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-center counter-text-wrap mb-70" data-aos="fade-up"
                        data-aos-duration="1500" data-aos-offset="50">
                        <h2>Khám phá kho báu Việt Nam cùng Dulichvivu</h2>
                        <p>Website <span class="count-text plus" data-speed="3000" data-stop="34500">0</span> phổ biến nhất
                            mà bạn sẽ nhớ.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($tours as $tour)
                    <div class="col-xl-3 col-md-6">
                        <div class="destination-item tour-grid style-three bgc-lighter list-tour" data-aos="fade-up"
                            data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <span class="badge bgc-pink">Featured</span>
                                <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                <img src="{{ asset('client/images/gallery-tour/' . $tour->images[0]->image_url) }}" alt="Tour List">
                            </div>
                            <div class="content">
                                <h5><a href="{{ route('tour.detail', $tour->id) }}">{{ $tour->title }}</a></h5>
                                <ul class="blog-meta">
                                    <li><i class="far fa-clock"></i> {{ $tour->time }}</li>
                                </ul>
                                <div class="destination-footer">
                                    <span class="price"><span>{{ number_format($tour->price_adult, 0, '.', '.') }} VNĐ</span> / người</span>
                                    <a href="{{ route('tour.detail', $tour->id) }}" class="theme-btn style-two style-three">
                                        <span data-hover="Đặt Ngay">Đặt Ngay</span>
                                        <i class="fal fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Destinations Area end -->


    <!-- About Us Area start -->
    <section class="about-us-area py-100 rpb-90 rel z-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="about-us-content rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title mb-25">
                            <h2>Lý do hàng đầu lựa chọn chúng tôi</h2>
                        </div>
                        <p>Chúng tôi sẽ nỗ lực hết mình để biến giấc mơ du lịch của bạn thành hiện thực, những viên ngọc ẩn
                            và những điểm tham quan không thể bỏ qua.</p>
                        <div class="divider counter-text-wrap mt-45 mb-55"><span>Chúng tôi có <span><span
                                        class="count-text plus" data-speed="3000" data-stop="25">0</span>
                                    năm</span> kinh nghiệm</span></div>
                        <div class="row">
                            <div class="col-6">
                                <div class="counter-item counter-text-wrap">
                                    <span class="count-text k-plus" data-speed="3000" data-stop="3">0</span>
                                    <span class="counter-title">Điểm đến phổ biến</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="counter-item counter-text-wrap">
                                    <span class="count-text m-plus" data-speed="3000" data-stop="9">0</span>
                                    <span class="counter-title">Khách hàng hài lòng</span>
                                </div>
                            </div>
                        </div>
                        <a href="destination1.html" class="theme-btn mt-10 style-two">
                            <span data-hover="Explore Destinations">Khám phá điểm đến</span>
                            <i class="fal fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                    <div class="about-us-image">
                        <div class="shape"><img src="{{ asset('client/images/about/shape1.png') }}" alt="Shape">
                        </div>
                        <div class="shape"><img src="{{ asset('client/images/about/shape2.png') }}" alt="Shape">
                        </div>
                        <div class="shape"><img src="{{ asset('client/images/about/shape3.png') }}" alt="Shape">
                        </div>
                        <div class="shape"><img src="{{ asset('client/images/about/shape4.png') }}" alt="Shape">
                        </div>
                        <div class="shape"><img src="{{ asset('client/images/about/shape5.png') }}" alt="Shape">
                        </div>
                        <div class="shape"><img src="{{ asset('client/images/about/shape6.png') }}" alt="Shape">
                        </div>
                        <div class="shape"><img src="{{ asset('client/images/about/shape7.png') }}" alt="Shape">
                        </div>
                        <img src="{{ asset('client/images/about/about.png') }}" alt="About">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Area end -->


    <!-- Popular Destinations Area start -->
    <section class="popular-destinations-area rel z-1">
        <div class="container-fluid">
            <div class="popular-destinations-wrap br-20 bgc-lighter pt-100 pb-70">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-title text-center counter-text-wrap mb-70" data-aos="fade-up"
                            data-aos-duration="1500" data-aos-offset="50">
                            <h2>Khám phá các điểm đến phổ biến</h2>
                            <p>Website <span class="count-text plus" data-speed="3000" data-stop="34500">0</span>
                                trải nghiệm phổ biến nhất</p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-3 col-md-6">
                            <div class="destination-item style-two" data-aos="flip-up" data-aos-duration="1500"
                                data-aos-offset="50">
                                <div class="image">
                                    <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                    <img src="{{ asset('client/images/destinations/destination1.jpg') }}" alt="Destination">
                                </div>
                                <div class="content">
                                    <h6><a href="destination-details.html">Thailand beach</a></h6>
                                    <span class="time">5352+ tours & 856+ Activity</span>
                                    <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="destination-item style-two" data-aos="flip-up" data-aos-delay="100"
                                data-aos-duration="1500" data-aos-offset="50">
                                <div class="image">
                                    <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                    <img src="{{ asset('client/images/destinations/destination2.jpg') }}" alt="Destination">
                                </div>
                                <div class="content">
                                    <h6><a href="destination-details.html">Parga, Greece</a></h6>
                                    <span class="time">5352+ tours & 856+ Activity</span>
                                    <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="destination-item style-two" data-aos="flip-up" data-aos-delay="200"
                                data-aos-duration="1500" data-aos-offset="50">
                                <div class="image">
                                    <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                    <img src="{{ asset('client/images/destinations/destination3.jpg') }}" alt="Destination">
                                </div>
                                <div class="content">
                                    <h6><a href="destination-details.html">Castellammare del Golfo, Italy</a></h6>
                                    <span class="time">5352+ tours & 856+ Activity</span>
                                    <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="destination-item style-two" data-aos="flip-up" data-aos-duration="1500"
                                data-aos-offset="50">
                                <div class="image">
                                    <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                    <img src="{{ asset('client/images/destinations/destination4.jpg') }}" alt="Destination">
                                </div>
                                <div class="content">
                                    <h6><a href="destination-details.html">Reserve of Canada, Canada</a></h6>
                                    <span class="time">5352+ tours & 856+ Activity</span>
                                    <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="destination-item style-two" data-aos="flip-up" data-aos-delay="100"
                                data-aos-duration="1500" data-aos-offset="50">
                                <div class="image">
                                    <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                    <img src="{{ asset('client/images/destinations/destination5.jpg') }}" alt="Destination">
                                </div>
                                <div class="content">
                                    <h6><a href="destination-details.html">Dubai united states</a></h6>
                                    <span class="time">5352+ tours & 856+ Activity</span>
                                    <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="destination-item style-two" data-aos="flip-up" data-aos-delay="200"
                                data-aos-duration="1500" data-aos-offset="50">
                                <div class="image">
                                    <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                                    <img src="{{ asset('client/images/destinations/destination6.jpg') }}" alt="Destination">
                                </div>
                                <div class="content">
                                    <h6><a href="destination-details.html">Milos, Greece</a></h6>
                                    <span class="time">5352+ tours & 856+ Activity</span>
                                    <a href="#" class="more"><i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Popular Destinations Area end -->


    <!-- Features Area start -->
    <section class="features-area pt-100 pb-45 rel z-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="features-content-part mb-55" data-aos="fade-left" data-aos-duration="1500"
                        data-aos-offset="50">
                        <div class="section-title mb-60">
                            <h2>Trải nghiệm du lịch tuyệt đỉnh mang đến sự khác biệt cho chúng tôi.</h2>
                        </div>
                        <div class="features-customer-box">
                            <div class="image">
                                <img src="{{ asset('client/images/features/features-box.jpg') }}" alt="Features">
                            </div>
                            <div class="content">
                                <div class="feature-authors mb-15">
                                    <img src="{{ asset('client/images/features/feature-author1.jpg') }}" alt="Author">
                                    <img src="{{ asset('client/images/features/feature-author2.jpg') }}" alt="Author">
                                    <img src="{{ asset('client/images/features/feature-author3.jpg') }}" alt="Author">
                                    <span>4k+</span>
                                </div>
                                <h6>850K+ Khách hàng hài lòng</h6>
                                <div class="divider style-two counter-text-wrap my-25"><span><span class="count-text plus"
                                            data-speed="3000" data-stop="5">0</span>
                                        năm</span></div>
                                <p>Chúng tôi tự hào cung cấp các hành trình được cá nhân hóa</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                    <div class="row pb-25">
                        <div class="col-md-6">
                            <div class="feature-item">
                                <div class="icon"><i class="flaticon-tent"></i></div>
                                <div class="content">
                                    <h5><a href="tour-details.html">Cắm trại bằng lều</a></h5>
                                    <p>Cắm trại bằng lều là cách tuyệt với để kết nối với thiên nhiên</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="icon"><i class="flaticon-kayak-1"></i></div>
                                <div class="content">
                                    <h5><a href="tour-details.html">Chèo thuyền Kayak</a></h5>
                                    <p>Chèo thuyền Kayak là một hoạt động ngoài trời thú vị mang tính phiêu lưu</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item mt-20">
                                <div class="icon"><i class="flaticon-cycling"></i></div>
                                <div class="content">
                                    <h5><a href="tour-details.html">Đạp xe leo núi</a></h5>
                                    <p>Đạp xe leo núi là môn thể thao thú vị giúp rèn luyện thể lực</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="icon"><i class="flaticon-fishing"></i></div>
                                <div class="content">
                                    <h5><a href="tour-details.html">Câu cá & chèo thuyền</a></h5>
                                    <p>Câu cá và chèo thuyền là những hoạt động cốt lõi mang lại niềm vui</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Area end -->


    <!-- Hotel Area start -->
    <section class="hotel-area bgc-white py-100 rel z-1">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-center counter-text-wrap mb-70" data-aos="fade-up"
                        data-aos-duration="1500" data-aos-offset="50">
                        <h2>Discover the World's Class Top Hotel</h2>
                        <p>One site <span class="count-text plus" data-speed="3000" data-stop="34500">0</span> most
                            popular experience you’ll remember</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-8 col-lg-10">
                    <div class="destination-item style-three bg-light border" data-aos="fade-up" data-aos-duration="1500"
                        data-aos-offset="50">
                        <div class="image">
                            <div class="ratting"><i class="fas fa-star"></i> 4.8</div>
                            <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                            <img src="{{ asset('client/images/destinations/hotel1.jpg') }}" alt="Hotel">
                        </div>
                        <div class="content">
                            <span class="location"><i class="fal fa-map-marker-alt"></i> Ao Nang, Thailand</span>
                            <h5><a href="destination-details.html" class="text-dark">The brown bench near swimming pool
                                    Hotel</a></h5>
                            <ul class="list-style-one">
                                <li><i class="fal fa-bed-alt"></i> 2 Bed room</li>
                                <li><i class="fal fa-hat-chef"></i> 1 kitchen</li>
                                <li><i class="fal fa-bath"></i> 2 Wash room</li>
                                <li><i class="fal fa-router"></i> Internet</li>
                            </ul>
                            <div class="destination-footer">
                                <span class="price"><span class="text-dark">$85.00</span>/per night</span>
                                <a href="#" class="read-more text-dark">Book Now <i class="fal fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-8 col-lg-10">
                    <div class="destination-item style-three bg-light border" data-aos="fade-up" data-aos-delay="50"
                        data-aos-duration="1500" data-aos-offset="50">
                        <div class="image">
                            <div class="ratting"><i class="fas fa-star"></i> 4.8</div>
                            <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                            <img src="{{ asset('client/images/destinations/hotel2.jpg') }}" alt="Hotel">
                        </div>
                        <div class="content">
                            <span class="location"><i class="fal fa-map-marker-alt"></i> Kigali, Rwanda</span>
                            <h5><a href="destination-details.html" class="text-dark">Green trees and body of water Marriott
                                    Hotel</a>
                            </h5>
                            <ul class="list-style-one">
                                <li><i class="fal fa-bed-alt"></i> 2 Bed room</li>
                                <li><i class="fal fa-hat-chef"></i> 1 kitchen</li>
                                <li><i class="fal fa-bath"></i> 2 Wash room</li>
                                <li><i class="fal fa-router"></i> Internet</li>
                            </ul>
                            <div class="destination-footer">
                                <span class="price"><span class="text-dark">$85.00</span>/per night</span>
                                <a href="#" class="read-more text-dark">Book Now <i class="fal fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-8 col-lg-10">
                    <div class="destination-item style-three bg-light border" data-aos="fade-up" data-aos-duration="1500"
                        data-aos-offset="50">
                        <div class="content">
                            <span class="location"><i class="fal fa-map-marker-alt"></i> Ao Nang, Thailand</span>
                            <h5><a href="#">Painted house surrounded with trees Hotel</a></h5>
                            <ul class="list-style-one">
                                <li><i class="fal fa-bed-alt"></i> 2 Bed room</li>
                                <li><i class="fal fa-hat-chef"></i> 1 kitchen</li>
                                <li><i class="fal fa-bath"></i> 2 Wash room</li>
                                <li><i class="fal fa-router"></i> Internet</li>
                            </ul>
                            <div class="destination-footer">
                                <span class="price"><span>$85.00</span>/per night</span>
                                <a href="#" class="read-more">Book Now <i class="fal fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="image">
                            <div class="ratting"><i class="fas fa-star"></i> 4.8</div>
                            <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                            <img src="{{ asset('client/images/destinations/hotel3.jpg') }}" alt="Hotel">
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-8 col-lg-10">
                    <div class="destination-item style-three bg-light border" data-aos="fade-up" data-aos-delay="50"
                        data-aos-duration="1500" data-aos-offset="50">
                        <div class="content">
                            <span class="location"><i class="fal fa-map-marker-alt"></i> Ao Nang, Thailand</span>
                            <h5><a href="#">house pool Jungle Pool Indonesia Hotel</a></h5>
                            <ul class="list-style-one">
                                <li><i class="fal fa-bed-alt"></i> 2 Bed room</li>
                                <li><i class="fal fa-hat-chef"></i> 1 kitchen</li>
                                <li><i class="fal fa-bath"></i> 2 Wash room</li>
                                <li><i class="fal fa-router"></i> Internet</li>
                            </ul>
                            <div class="destination-footer">
                                <span class="price"><span>$85.00</span>/per night</span>
                                <a href="#" class="read-more">Book Now <i class="fal fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="image">
                            <div class="ratting"><i class="fas fa-star"></i> 4.8</div>
                            <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                            <img src="{{ asset('client/images/destinations/hotel4.jpg') }}" alt="Hotel">
                        </div>
                    </div>
                </div>
            </div>
            <div class="hotel-more-btn text-center mt-40">
                <a href="destination2.html" class="theme-btn style-four">
                    <span data-hover="Explore More Hotel">Explore More Hotel</span>
                    <i class="fal fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- Hotel Area end -->

    <!-- CTA Area start -->
    <section class="cta-area pt-100 rel z-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-md-6" data-aos="zoom-in-down" data-aos-duration="1500" data-aos-offset="50">
                    <div class="cta-item" style="background-image: url({{ asset('client/images/cta/cta1.jpg') }});">
                        <span class="category">Cắm trại bằng lều</span>
                        <h2>Khám phá du lịch tốt nhất Việt Nam</h2>
                        <a href="tour-details.html" class="theme-btn style-two bgc-secondary">
                            <span data-hover="Khám phá">Khám phá</span>
                            <i class="fal fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="zoom-in-down" data-aos-delay="50" data-aos-duration="1500"
                    data-aos-offset="50">
                    <div class="cta-item" style="background-image: url({{ asset('client/images/cta/cta2.jpg') }});">
                        <span class="category">Sea Beach</span>
                        <h2>World largest Sea Beach in Thailand</h2>
                        <a href="tour-details.html" class="theme-btn style-two">
                            <span data-hover="Khám phá">Khám phá</span>
                            <i class="fal fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="zoom-in-down" data-aos-delay="100" data-aos-duration="1500"
                    data-aos-offset="50">
                    <div class="cta-item" style="background-image: url({{ asset('client/images/cta/cta3.jpg') }});">
                        <span class="category">Water Falls</span>
                        <h2>Largest Water falls Bali, Indonesia</h2>
                        <a href="tour-details.html" class="theme-btn style-two bgc-secondary">
                            <span data-hover="Khám phá">Khám phá</span>
                            <i class="fal fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA Area end -->


    <!-- Blog Area start -->
    <section class="blog-area py-70 rel z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-center counter-text-wrap mb-70" data-aos="fade-up"
                        data-aos-duration="1500" data-aos-offset="50">
                        <h2>Tin tức mới nhất & Blog</h2>
                        <p>One site <span class="count-text plus bgc-primary" data-speed="3000" data-stop="34500">0</span>
                            most popular experience you’ll remember</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-md-6">
                    <div class="blog-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="content">
                            <a href="blog.html" class="category">Travel</a>
                            <h5><a href="blog-details.html">Ultimate Guide to Planning Your Dream Vacation with
                                    Ravelo Travel Agency</a></h5>
                            <ul class="blog-meta">
                                <li><i class="far fa-calendar-alt"></i> <a href="#">25 February 2024</a></li>
                                <li><i class="far fa-comments"></i> <a href="#">Comments (5)</a></li>
                            </ul>
                        </div>
                        <div class="image">
                            <img src="{{ asset('client/images/blog/blog1.jpg') }}" alt="Blog">
                        </div>
                        <a href="blog-details.html" class="theme-btn">
                            <span data-hover="Book Now">Read More</span>
                            <i class="fal fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="blog-item" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500"
                        data-aos-offset="50">
                        <div class="content">
                            <a href="blog.html" class="category">Travel</a>
                            <h5><a href="blog-details.html">Unforgettable Adventures Travel Agency Bucket List
                                    Experiences</a></h5>
                            <ul class="blog-meta">
                                <li><i class="far fa-calendar-alt"></i> <a href="#">25 February 2024</a></li>
                                <li><i class="far fa-comments"></i> <a href="#">Comments (5)</a></li>
                            </ul>
                        </div>
                        <div class="image">
                            <img src="{{ asset('client/images/blog/blog2.jpg') }}" alt="Blog">
                        </div>
                        <a href="blog-details.html" class="theme-btn">
                            <span data-hover="Book Now">Read More</span>
                            <i class="fal fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="blog-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500"
                        data-aos-offset="50">
                        <div class="content">
                            <a href="blog.html" class="category">Travel</a>
                            <h5><a href="blog-details.html">Exploring Culture and way Cuisine Travel Agency's they
                                    Best Foodie Destinations</a></h5>
                            <ul class="blog-meta">
                                <li><i class="far fa-calendar-alt"></i> <a href="#">25 February 2024</a></li>
                                <li><i class="far fa-comments"></i> <a href="#">Comments (5)</a></li>
                            </ul>
                        </div>
                        <div class="image">
                            <img src="{{ asset('client/images/blog/blog3.jpg') }}" alt="Blog">
                        </div>
                        <a href="blog-details.html" class="theme-btn">
                            <span data-hover="Book Now">Read More</span>
                            <i class="fal fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area end -->
@endsection