import { Link } from "react-router-dom";

function AboutCompany() {
    return (
        <section className="about-area-two py-100 rel z-1">
            <div className="container">
                <div className="row justify-content-between">
                    <div className="col-xl-3">
                        <span className="subtitle mb-35">Về chúng tôi</span>
                    </div>
                    <div className="col-xl-9">
                        <div className="about-page-content">
                            <div className="row">
                                <div className="col-lg-8 pe-lg-5 me-lg-5">
                                    <div className="section-title mb-25">
                                        <h2>
                                            Kinh nghiệm và tour du lịch & đại lý du lịch chuyên nghiệp trên thế giới
                                        </h2>
                                    </div>
                                </div>
                                <div className="col-md-4">
                                    <div className="experience-years rmb-20">
                                        <span className="title bgc-secondary">Năm Kinh Nghiệm</span>
                                        <span className="text">Chúng tôi có</span>
                                        <span className="years">5+</span>
                                    </div>
                                </div>
                                <div className="col-md-8">
                                    <p>
                                        Chúng tôi chuyên tạo ra những trải nghiệm thành phố khó quên cho những du khách
                                        muốn khám phá trái tim và linh hồn của cảnh quan đô thị. Các chuyến tham quan có
                                        hướng dẫn viên chuyên nghiệp của chúng tôi thực hiện hành trình qua những con
                                        phố sôi động, các địa danh lịch sử và những viên ngọc ẩn giấu của mỗi thành phố.
                                    </p>
                                    <ul className="list-style-two mt-35">
                                        <li>Công ty trải nghiệm</li>
                                        <li>Đội ngũ chuyên nghiệp</li>
                                        <li>Du lịch giá rẻ</li>
                                        <li>Hỗ trợ trực tuyến 24/7</li>
                                    </ul>
                                    <Link to="/tour" className="theme-btn style-three mt-30">
                                        <span data-hover="Khám phá các tour">Khám Phá Các Tour</span>
                                        <i className="fal fa-arrow-right"></i>
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
}

export default AboutCompany;
