import { Link } from "react-router-dom";

function Achiviment() {
    return (
        <>
            <section className="about-features-area">
                <div className="container">
                    <div className="row align-items-center">
                        <div className="col-xl-4 col-md-6">
                            <div className="about-feature-image">
                                <img src="/assets/images/banner/search-banner1.jpg" alt="About" />
                            </div>
                        </div>
                        <div className="col-xl-4 col-md-6">
                            <div className="about-feature-image">
                                <img src="/assets/images/about/about-feature2.jpg" alt="About" />
                            </div>
                        </div>
                        <div className="col-xl-4 col-md-8">
                            <div className="about-feature-boxes">
                                <div className="feature-item style-three bgc-secondary">
                                    <div className="icon-title">
                                        <div className="icon">
                                            <i className="flaticon-award-symbol"></i>
                                        </div>
                                        <h5>
                                            <a href="destination-details.html">Chúng tôi đã giành giải thưởng</a>
                                        </h5>
                                    </div>
                                    <div className="content">
                                        <p>
                                            Tại Pinnacle Business Solutions, cam kết về sự xuất sắc và đổi mới đạt được
                                        </p>
                                    </div>
                                </div>
                                <div className="feature-item style-three bgc-primary">
                                    <div className="icon-title">
                                        <div className="icon">
                                            <i className="flaticon-tourism"></i>
                                        </div>
                                        <h5>
                                            <a href="destination-details.html">Hơn 5000 tour phổ biến</a>
                                        </h5>
                                    </div>
                                    <div className="content">
                                        <p>
                                            Đội ngũ chuyên gia của chúng tôi luôn tận tâm phát triển các chiến lược tiên
                                            tiến để thúc đẩy thành công
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section className="about-us-area pt-70 pb-100 rel z-1">
                <div className="container">
                    <div className="row align-items-center">
                        <div className="col-xl-5 col-lg-6">
                            <div className="about-us-content rmb-55">
                                <div className="section-title mb-25">
                                    <h2>Tự tin đi du lịch Những lý do hàng đầu để chọn chúng tôi</h2>
                                </div>
                                <p>
                                    Chúng tôi làm việc chặt chẽ với khách hàng để hiểu những thách thức và mục tiêu, cung cấp
                                    các giải pháp tùy chỉnh nhằm nâng cao hiệu quả, tăng cường lợi nhuận và thúc đẩy
                                    tăng trưởng bền vững.
                                </p>
                                <div className="row pt-25">
                                    <div className="col-6">
                                        <div className="counter-item counter-text-wrap">
                                            <span className="count-text k-plus">3</span>
                                            <span className="counter-title">Điểm đến phổ biến</span>
                                        </div>
                                    </div>
                                    <div className="col-6">
                                        <div className="counter-item counter-text-wrap">
                                            <span className="count-text m-plus">9</span>
                                            <span className="counter-title">Khách hàng hài lòng</span>
                                        </div>
                                    </div>
                                </div>
                                <Link to="/tour" className="theme-btn mt-10 style-two">
                                    <span data-hover="Khám Phá Các Điểm Đến">Khám Phá Các Điểm Đến</span>
                                    <i className="fal fa-arrow-right"></i>
                                </Link>
                            </div>
                        </div>
                        <div className="col-xl-7 col-lg-6">
                            <div className="about-us-page">
                                <img src="/assets/images/about/about-page.jpg" alt="About" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section className="about-feature-two bgc-black pt-100 pb-45 rel z-1">
                <div className="container">
                    <div className="section-title text-center text-white counter-text-wrap mb-50">
                        <h2>Cách để Được Lợi từ DUlichvivu</h2>
                    </div>
                    <div className="row">
                        <div className="col-xl-3 col-lg-4 col-md-6">
                            <div className="feature-item style-two">
                                <div className="icon">
                                    <i className="flaticon-save-money"></i>
                                </div>
                                <div className="content">
                                    <h5>
                                        <a href="destination-details.html">Chi phí tối ưu</a>
                                    </h5>
                                    <p>Tận hưởng hành trình đáng nhớ mà không lo về chi phí.</p>
                                </div>
                            </div>
                        </div>
                        <div className="col-xl-3 col-lg-4 col-md-6">
                            <div className="feature-item style-two">
                                <div className="icon">
                                    <i className="flaticon-travel-1"></i>
                                </div>
                                <div className="content">
                                    <h5>
                                        <a href="destination-details.html">Điểm Đến Đa Dạng</a>
                                    </h5>
                                    <p>Khám phá hàng trăm điểm đến hấp dẫn khắp nơi thế giới.</p>
                                </div>
                            </div>
                        </div>
                        <div className="col-xl-3 col-lg-4 col-md-6">
                            <div className="feature-item style-two">
                                <div className="icon">
                                    <i className="flaticon-booking"></i>
                                </div>
                                <div className="content">
                                    <h5>
                                        <a href="destination-details.html">Thủ tục nhanh chóng</a>
                                    </h5>
                                    <p>Thao tác nhanh gọn, đặt tour chỉ trong tích tắc.</p>
                                </div>
                            </div>
                        </div>
                        <div className="col-xl-3 col-lg-4 col-md-6">
                            <div className="feature-item style-two">
                                <div className="icon">
                                    <i className="flaticon-guidepost"></i>
                                </div>
                                <div className="content">
                                    <h5>
                                        <a href="destination-details.html">Tour Guide tuyệt vời</a>
                                    </h5>
                                    <p>Hướng dẫn viên chuyên nghiệp và hiểu rõ hành trình.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="shape">
                    <img src="assets/images/video/shape1.png" alt="shape" />
                </div>
            </section>
        </>
    );
}

export default Achiviment;
