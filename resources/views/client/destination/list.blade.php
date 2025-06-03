@extends('client.layout.master')

@section('title')
    Điểm đến du lịch
@endsection

@section('banner')
    @include('client.layout.partials.banner', ['title' => 'Điểm đến'])
    @include('client.layout.partials.search')
@endsection

@section('content')
    <!-- Popular Destinations Area start -->
    <section class="popular-destinations-area pt-100 pb-90 rel z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-center counter-text-wrap mb-40" data-aos="fade-up"
                        data-aos-duration="1500" data-aos-offset="50">
                        <h2>Khám phá các điểm đến nổi tiếng</h2>
                        <p>Website <span class="count-text plus" data-speed="3000" data-stop="34500">0</span> trải nghiệm phổ biến nhất</p>
                        <ul class="destinations-nav mt-30">
                            <li data-filter="*" class="active">Tất cả</li>
                            <li data-filter=".features">Miền Bắc</li>
                            <li data-filter=".recent">Miền Trung</li>
                            <li data-filter=".city">Miền Nam</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row gap-10 destinations-active justify-content-center">
                    <div class="col-xl-3 col-md-6 item recent rating">
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
                    <div class="col-xl-3 col-md-6 item features">
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
                    <div class="col-md-6 item recent city rating">
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
                    <div class="col-md-6 item city features">
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
                    <div class="col-xl-3 col-md-6 item recent">
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
                    <div class="col-xl-3 col-md-6 item features rating">
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
    </section>
    <!-- Popular Destinations Area end -->


    <!-- Hotel Area start -->
    <section class="hotel-area bgc-black pt-100 pb-70 rel z-1">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="destination-left-content mb-35">
                        <div class="section-title text-white counter-text-wrap mb-45" data-aos="fade-up"
                            data-aos-duration="1500" data-aos-offset="50">
                            <h2>Discover the World's Class Top Hotel</h2>
                            <p>One site <span class="count-text plus" data-speed="3000" data-stop="34500">0</span> most
                                popular <br> experience you’ll remember</p>
                        </div>
                        <a href="destination1.html" class="theme-btn style-four mb-15">
                            <span data-hover="Explore More Hotel">Explore More Hotel</span>
                            <i class="fal fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="destination-item style-three" data-aos="fade-up" data-aos-duration="1500"
                        data-aos-offset="50">
                        <div class="image">
                            <div class="ratting"><i class="fas fa-star"></i> 4.8</div>
                            <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                            <img src="{{ asset('client/images/destinations/hotel1.jpg') }}" alt="Hotel">
                        </div>
                        <div class="content">
                            <span class="location"><i class="fal fa-map-marker-alt"></i> Ao Nang, Thailand</span>
                            <h5><a href="tour-details.html">The brown bench near swimming pool Hotel</a></h5>
                            <ul class="list-style-one">
                                <li><i class="fal fa-bed-alt"></i> 2 Bed room</li>
                                <li><i class="fal fa-hat-chef"></i> 1 kitchen</li>
                                <li><i class="fal fa-bath"></i> 2 Wash room</li>
                                <li><i class="fal fa-router"></i> Internet</li>
                            </ul>
                            <div class="destination-footer">
                                <span class="price"><span>$85.00</span>/per night</span>
                                <a href="tour-details.html" class="read-more">Book Now <i
                                        class="fal fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="destination-item style-three" data-aos="fade-up" data-aos-delay="50"
                        data-aos-duration="1500" data-aos-offset="50">
                        <div class="image">
                            <div class="ratting"><i class="fas fa-star"></i> 4.8</div>
                            <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                            <img src="{{ asset('client/images/destinations/hotel2.jpg') }}" alt="Hotel">
                        </div>
                        <div class="content">
                            <span class="location"><i class="fal fa-map-marker-alt"></i> Kigali, Rwanda</span>
                            <h5><a href="tour-details.html">Green trees and body of water Marriott Hotel</a></h5>
                            <ul class="list-style-one">
                                <li><i class="fal fa-bed-alt"></i> 2 Bed room</li>
                                <li><i class="fal fa-hat-chef"></i> 1 kitchen</li>
                                <li><i class="fal fa-bath"></i> 2 Wash room</li>
                                <li><i class="fal fa-router"></i> Internet</li>
                            </ul>
                            <div class="destination-footer">
                                <span class="price"><span>$85.00</span>/per night</span>
                                <a href="tour-details.html" class="read-more">Book Now <i
                                        class="fal fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="destination-item style-three" data-aos="fade-up" data-aos-duration="1500"
                        data-aos-offset="50">
                        <div class="image">
                            <div class="ratting"><i class="fas fa-star"></i> 4.8</div>
                            <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                            <img src="{{ asset('client/images/destinations/hotel3.jpg') }}" alt="Hotel">
                        </div>
                        <div class="content">
                            <span class="location"><i class="fal fa-map-marker-alt"></i> Ao Nang, Thailand</span>
                            <h5><a href="tour-details.html">Painted house surrounded with trees Hotel</a></h5>
                            <ul class="list-style-one">
                                <li><i class="fal fa-bed-alt"></i> 2 Bed room</li>
                                <li><i class="fal fa-hat-chef"></i> 1 kitchen</li>
                                <li><i class="fal fa-bath"></i> 2 Wash room</li>
                                <li><i class="fal fa-router"></i> Internet</li>
                            </ul>
                            <div class="destination-footer">
                                <span class="price"><span>$85.00</span>/per night</span>
                                <a href="tour-details.html" class="read-more">Book Now <i
                                        class="fal fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="destination-item style-three" data-aos="fade-up" data-aos-delay="50"
                        data-aos-duration="1500" data-aos-offset="50">
                        <div class="image">
                            <div class="ratting"><i class="fas fa-star"></i> 4.8</div>
                            <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                            <img src="{{ asset('client/images/destinations/hotel4.jpg') }}" alt="Hotel">
                        </div>
                        <div class="content">
                            <span class="location"><i class="fal fa-map-marker-alt"></i> Ao Nang, Thailand</span>
                            <h5><a href="tour-details.html">house pool Jungle Pool Indonesia Hotel</a></h5>
                            <ul class="list-style-one">
                                <li><i class="fal fa-bed-alt"></i> 2 Bed room</li>
                                <li><i class="fal fa-hat-chef"></i> 1 kitchen</li>
                                <li><i class="fal fa-bath"></i> 2 Wash room</li>
                                <li><i class="fal fa-router"></i> Internet</li>
                            </ul>
                            <div class="destination-footer">
                                <span class="price"><span>$85.00</span>/per night</span>
                                <a href="tour-details.html" class="read-more">Book Now <i
                                        class="fal fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hotel Area end -->


    <!-- Hot Deals Area start -->
    <section class="hot-deals-area pt-70 pb-50 rel z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-center counter-text-wrap mb-50" data-aos="fade-up"
                        data-aos-duration="1500" data-aos-offset="50">
                        <h2>Discover Hot Deals</h2>
                        <p>One site <span class="count-text plus" data-speed="3000" data-stop="34500">0</span> most popular
                            experience you’ll remember</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="destination-item style-four no-border" data-aos="flip-left" data-aos-duration="1500"
                        data-aos-offset="50">
                        <div class="image">
                            <span class="badge">10% Off</span>
                            <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                            <img src="{{ asset('client/images/destinations/hot-deal1.jpg') }}" alt="Hot Deal">
                        </div>
                        <div class="content">
                            <span class="location"><i class="fal fa-map-marker-alt"></i> City of Venice, Italy</span>
                            <h5><a href="tour-details.html">Venice Grand Canal, Metropolitan Summer in Venice</a></h5>
                        </div>
                        <div class="destination-footer">
                            <span class="price"><span>$58.00</span>/person</span>
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                        <a href="destination-details.html" class="theme-btn style-three">
                            <span data-hover="Explore">Explore</span>
                            <i class="fal fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="destination-item style-four no-border" data-aos="flip-left" data-aos-duration="1500"
                        data-aos-offset="50">
                        <div class="image">
                            <span class="badge">10% Off</span>
                            <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                            <img src="{{ asset('client/images/destinations/hot-deal2.jpg') }}" alt="Hot Deal">
                        </div>
                        <div class="content">
                            <span class="location"><i class="fal fa-map-marker-alt"></i> Kyoto, Japan</span>
                            <h5><a href="tour-details.html">Japan, Kyoto, travel, and people in Kyoto, Japan by Sorasak</a>
                            </h5>
                        </div>
                        <div class="destination-footer">
                            <span class="price"><span>$58.00</span>/person</span>
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                        <a href="destination-details.html" class="theme-btn style-three">
                            <span data-hover="Explore">Explore</span>
                            <i class="fal fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="destination-item style-four no-border" data-aos="flip-left" data-aos-duration="1500"
                        data-aos-offset="50">
                        <div class="image">
                            <span class="badge">10% Off</span>
                            <a href="#" class="heart"><i class="fas fa-heart"></i></a>
                            <img src="{{ asset('client/images/destinations/hot-deal3.jpg') }}" alt="Hot Deal">
                        </div>
                        <div class="content">
                            <span class="location"><i class="fal fa-map-marker-alt"></i> Tamnougalt, Morocco</span>
                            <h5><a href="tour-details.html">Camels on desert under blue sky Morocco, Sahara.</a></h5>
                        </div>
                        <div class="destination-footer">
                            <span class="price"><span>$58.00</span>/person</span>
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                        <a href="destination-details.html" class="theme-btn style-three">
                            <span data-hover="Explore">Explore</span>
                            <i class="fal fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hot Deals Area end -->


    <!-- Newsletter Area start -->
    @include('client.layout.partials.newsletter')
    <!-- Newsletter Area end -->
@endsection