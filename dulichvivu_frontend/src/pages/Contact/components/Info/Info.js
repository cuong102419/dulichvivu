function Info() {
    return (
        <section className="contact-info-area pt-100 rel z-1">
            <div className="container">
                <div className="row align-items-center">
                    <div className="col-lg-4">
                        <div className="contact-info-content mb-30 rmb-55">
                            <div className="section-title mb-30">
                                <h2>Let’s Talk Our Expert Travel Guides</h2>
                            </div>
                            <p>
                                Our dedicated support team is always ready to assist you with any questions or issues,
                                offering prompt and personalized solutions to meet your needs.
                            </p>
                            <div className="features-team-box mt-40">
                                <h6>85+ Expert Team member</h6>
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
                                        <h5>Need Help & Support</h5>
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
                                        <h5>Need Any Urgent</h5>
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
                                        <h5>New York Branch</h5>
                                        <div className="text">
                                            <i className="fal fa-map-marker-alt"></i> 55 East 10th Street, New York, NY
                                            10003, United States
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
                                        <h5>Main Office Address</h5>
                                        <div className="text">
                                            <i className="fal fa-map-marker-alt"></i> 55 East 10th Street, New York, NY
                                            10003, United States
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
