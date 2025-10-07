import { Link } from "react-router-dom";

function About() {
    return (
        <section class="faq-page-about pt-100 rel z-1">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <div
                            class="faq-page-about-content mb-30 rmb-55"
                        >
                            <div class="section-title mb-30">
                                <h2>Hướng dẫn của người trong cuộc về trải nghiệm du lịch đặc biệt</h2>
                            </div>
                            <p>
                                Du lịch đóng vai trò quan trọng trong việc làm phong phú cuộc sống bằng cách cung cấp những trải nghiệm độc đáo,
                                trao đổi văn hóa và niềm vui khám phá.
                            </p>
                            <ul class="list-style-two mt-35 mb-20">
                                <li>Kinh nghiệm nhiều năm</li>
                                <li>Đội ngũ chuyên nghiệp</li>
                                <li>TIết kiệm chi phí</li>
                                <li>Hỗ trợ 24/7</li>
                            </ul>
                            <Link to="/tour" class="theme-btn style-two">
                                <span data-hover="Đặt ngay">Đặt ngay</span>
                                <i class="fal fa-arrow-right"></i>
                            </Link>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="image mb-30">
                                    <img class="br-10 w-100" src="assets/images/destinations/faq1.jpg" alt="FAQ" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="image mb-30">
                                    <img class="br-10 w-100" src="assets/images/destinations/faq2.jpg" alt="FAQ" />
                                </div>
                                <div class="image mb-30">
                                    <img class="br-10 w-100" src="assets/images/destinations/faq3.jpg" alt="FAQ" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
}

export default About;
