@extends('client.layout.master')

@section('title')
    Liên hệ
@endsection

@section('banner')
    @include('client.layout.partials.banner', [
        'title' => 'Liên hệ'
    ])
@endsection

@section('content')
    <!-- Contact Info Area start -->
    <section class="contact-info-area pt-100 rel z-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="contact-info-content mb-30 rmb-55" data-aos="fade-up" data-aos-duration="1500"
                        data-aos-offset="50">
                        <div class="section-title mb-30">
                            <h2>Hãy nói với hướng dẫn viên chuyên nghiệp của chúng tôi</h2>
                        </div>
                        <p>Đội ngũ hỗ trợ tận tâm của chúng tôi luôn sẵn sàng hỗ trợ bạn với bất kỳ câu hỏi hoặc vấn đề nào, cung cấp các giải pháp nhanh chóng và được cá nhân hóa để đáp ứng nhu cầu của bạn.</p>
                        <div class="features-team-box mt-40">
                            <h6>5+ Thành viên nhóm chuyên gia</h6>
                            <div class="feature-authors">
                                <img src="{{ asset('client/images/features/feature-author1.jpg') }}" alt="Author">
                                <img src="{{ asset('client/images/features/feature-author2.jpg') }}" alt="Author">
                                <img src="{{ asset('client/images/features/feature-author3.jpg') }}" alt="Author">
                                <img src="{{ asset('client/images/features/feature-author4.jpg') }}" alt="Author">
                                <img src="{{ asset('client/images/features/feature-author5.jpg') }}" alt="Author">
                                <img src="{{ asset('client/images/features/feature-author6.jpg') }}" alt="Author">
                                <img src="{{ asset('client/images/features/feature-author7.jpg') }}" alt="Author">
                                <span>+</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-info-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50"
                                data-aos-delay="50">
                                <div class="icon"><i class="fas fa-envelope"></i></div>
                                <div class="content">
                                    <h5>Trợ giúp và hỗ trợ</h5>
                                    <div class="text"><i class="far fa-envelope"></i> <a
                                            href="mailto:support@gmail.com">support@gmail.com</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-info-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50"
                                data-aos-delay="100">
                                <div class="icon"><i class="fas fa-phone"></i></div>
                                <div class="content">
                                    <h5>Bất kỳ thắc mắc nào</h5>
                                    <div class="text"><i class="far fa-phone"></i> <a href="callto:+0001234588">+000 (123)
                                            45 88</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-info-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50"
                                data-aos-delay="50">
                                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="content">
                                    <h5>Chi nhánh Hà Nội</h5>
                                    <div class="text"><i class="fal fa-map-marker-alt"></i> 578 Cầu Giấy, Cầu Giấy, Hà Nội, Việt Nam</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-info-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50"
                                data-aos-delay="100">
                                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="content">
                                    <h5>Địa chỉ văn phòng</h5>
                                    <div class="text"><i class="fal fa-map-marker-alt"></i> 578 Cầu Giấy, Cầu Giấy, Hà Nội, Việt Nam</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Info Area end -->


    <!-- Contact Form Area start -->
    <section class="contact-form-area py-70 rel z-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="comment-form bgc-lighter z-1 rel mb-30 rmb-55">
                        <form id="contactForm" class="contactForm" name="contactForm"
                            action="https://webtendtheme.net/html/2024/ravelo/assets/php/form-process.php" method="post"
                            data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="section-title">
                                <h2>Liên lạc</h2>
                            </div>
                            <p>Địa chỉ email của bạn sẽ không được công bố. Các trường bắt buộc được đánh dấu *</p>
                            <div class="row mt-35">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Họ tên</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="Nhập họ tên của bạn" value="" required
                                            data-error="Please enter your Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_number">Số điện thoại</label>
                                        <input type="text" id="phone_number" name="phone_number" class="form-control"
                                            placeholder="Nhập số điện thoại của bạn" value="" required data-error="Please enter your Phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Địa chỉ Email</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="Nhập email của bạn" value="" required
                                            data-error="Please enter your Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="message">Ghi chú</label>
                                        <textarea name="message" id="message" class="form-control" rows="5"
                                            placeholder="Nhập ghi chú của bạn" required
                                            data-error="Please enter your Message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <ul class="radio-filter mb-25">
                                            <li>
                                                <input class="form-check-input" type="radio" name="terms-condition"
                                                    id="terms-condition">
                                                <label for="terms-condition">Nhớ tên, email cho lần tiếp theo bình luận.</label>
                                            </li>
                                        </ul>
                                        <button type="submit" class="theme-btn style-two">
                                            <span data-hover="Gửi">Gửi</span>
                                            <i class="fal fa-arrow-right"></i>
                                        </button>
                                        <div id="msgSubmit" class="hidden"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="contact-images-part" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ asset('client/images/contact/contact1.jpg') }}" alt="Contact">
                            </div>
                            <div class="col-6">
                                <img src="{{ asset('client/images/contact/contact2.jpg') }}" alt="Contact">
                            </div>
                            <div class="col-6">
                                <img src="{{ asset('client/images/contact/contact3.jpg') }}" alt="Contact">
                            </div>
                        </div>
                        <div class="circle-logo">
                            <img src="{{ asset('client/images/contact/icon.png') }}" alt="Logo">
                            <span class="title h2">Dulichvivu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form Area end -->
@endsection