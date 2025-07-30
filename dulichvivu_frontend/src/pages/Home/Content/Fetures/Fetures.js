function Fetures() {
    return (  
        <section className="features-area pt-100 pb-45 rel z-1">
            <div className="container">
                <div className="row align-items-center">
                    <div className="col-xl-6">
                        <div className="features-content-part mb-55">
                            <div className="section-title mb-60">
                                <h2>Các tính năng trải nghiệm du lịch đỉnh cao khiến chúng tôi trở nên khác biệt</h2>
                            </div>
                            <div className="features-customer-box">
                                <div className="image">
                                    <img src="assets/images/features/features-box.jpg" alt="Features"/>
                                </div>
                                <div className="content">
                                    <div className="feature-authors mb-15">
                                        <img src="assets/images/features/feature-author1.jpg" alt="Author"/>
                                        <img src="assets/images/features/feature-author2.jpg" alt="Author"/>
                                        <img src="assets/images/features/feature-author3.jpg" alt="Author"/>
                                        <span>4k+</span>
                                    </div>
                                    <h6>850K+ khách hàng hài lòng</h6>
                                    <div className="divider style-two counter-text-wrap my-25"><span><span className="count-text plus" data-speed="3000" data-stop="5">0</span> năm</span></div>
                                    <p>Chúng tôi tự hào cung cấp hành trình được cá nhân hóa</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-6">
                        <div className="row pb-25">
                            <div className="col-md-6">
                                <div className="feature-item">
                                    <div className="icon"><i className="flaticon-tent"></i></div>
                                    <div className="content">
                                        <h5><a href="tour-details.html">Cắm trại</a></h5>
                                        <p>Cắm trại với lều là cách tuyệt vời để kết nối với thiên nhiên</p>
                                    </div>
                                </div>
                                <div className="feature-item">
                                    <div className="icon"><i className="flaticon-kayak-1"></i></div>
                                    <div className="content">
                                        <h5><a href="tour-details.html">Chèo thuyền Kayak</a></h5>
                                        <p>Chèo thuyền kayak là một hoạt động ngoài trời ly kỳ</p>
                                    </div>
                                </div>
                            </div>
                            <div className="col-md-6">
                                <div className="feature-item mt-20">
                                    <div className="icon"><i className="flaticon-cycling"></i></div>
                                    <div className="content">
                                        <h5><a href="tour-details.html">Đạp xe leo núi</a></h5>
                                        <p>Đạp xe leo núi là môn thể thao thú vị</p>
                                    </div>
                                </div>
                                <div className="feature-item">
                                    <div className="icon"><i className="flaticon-fishing"></i></div>
                                    <div className="content">
                                        <h5><a href="tour-details.html">Câu cá trên thuyền</a></h5>
                                        <p>Câu cá trên thuyền mang lại niềm vui</p>
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

export default Fetures;