function Info() {
    return (
        <section className="contact-info-area pt-100 rel z-1">
            <div className="container">
                <div className="row align-items-center">
                    <div className="col-lg-4">
                        <div className="contact-info-content mb-30 rmb-55">
                            <div className="section-title mb-30">
                                <h2>Hãy nói chuyện với các chuyên gia hướng dẫn du lịch của chúng tôi</h2>
                            </div>
                            <p>
                                Đội ngũ hỗ trợ tận tâm của chúng tôi luôn sẵn sàng hỗ trợ bạn với bất kỳ câu hỏi hoặc vấn đề nào,
                                cung cấp các giải pháp nhanh chóng và cá nhân hóa để đáp ứng nhu cầu của bạn.
                            </p>
                            <div className="features-team-box mt-40">
                                <h6>85+ thành viên trong đội ngũ chuyên gia</h6>
                                <div className="feature-authors">
                                    <img src="/assets/images/features/feature-author1.jpg" alt="Author" />
                                    <img src="/assets/images/features/feature-author2.jpg" alt="Author" />
                                    <img src="/assets/images/features/feature-author3.jpg" alt="Author" />
                                    <img src="/assets/images/features/feature-author4.jpg" alt="Author" />
                                    <img src="/assets/images/features/feature-author5.jpg" alt="Author" />
                                    <img src="/assets/images/features/feature-author6.jpg" alt="Author" />
                                    <img src="/assets/images/features/feature-author7.jpg" alt="Author" />
                                    <span>+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-lg-8">
                        <div className="row">
                            <div className="col-md-6">
                                <div className="contact-info-item">
                                    <div className="icon">
                                        <i className="fas fa-envelope"></i>
                                    </div>
                                    <div className="content">
                                        <h5>Cần hỗ trợ & Giúp đỡ</h5>
                                        <div className="text">
                                            <i className="far fa-envelope"></i>{' '}
                                            <a href="mailto:support@gmail.com">support@gmail.com</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="col-md-6">
                                <div className="contact-info-item">
                                    <div className="icon">
                                        <i className="fas fa-phone"></i>
                                    </div>
                                    <div className="content">
                                        <h5>Cần hỗ trợ khẩn cấp</h5>
                                        <div className="text">
                                            <i className="far fa-phone"></i>{' '}
                                            <a href="callto:+0001234588">+000 (123) 45 88</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="col-md-6">
                                <div className="contact-info-item">
                                    <div className="icon">
                                        <i className="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div className="content">
                                        <h5>Địa chỉ văn phòng</h5>
                                        <div className="text">
                                            <i className="fal fa-map-marker-alt"></i> 5470 Trần Đại Nghĩa, Ngũ Hành Sơn, Đà Nẵng
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
}

export default Info;
