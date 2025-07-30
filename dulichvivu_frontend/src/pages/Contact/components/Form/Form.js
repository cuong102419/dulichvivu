function Form() {
    return (
        <section className="contact-form-area py-70 rel z-1">
            <div className="container">
                <div className="row align-items-center">
                    <div className="col-lg-7">
                        <div className="comment-form bgc-lighter z-1 rel mb-30 rmb-55">
                            <form id="contactForm" className="contactForm" name="contactForm" action="" method="post">
                                <div className="section-title">
                                    <h2>Get In Touch</h2>
                                </div>
                                <p>Your email address will not be published. Required fields are marked *</p>
                                <div className="row mt-35">
                                    <div className="col-md-6">
                                        <div className="form-group">
                                            <label htmlFor="name">Full Name</label>
                                            <input
                                                type="text"
                                                id="name"
                                                name="name"
                                                className="form-control"
                                                placeholder="Randy J. Thomas"
                                                // value=""
                                            />
                                            <div className="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div className="col-md-6">
                                        <div className="form-group">
                                            <label htmlFor="phone_number">Phone Number</label>
                                            <input
                                                type="text"
                                                id="phone_number"
                                                name="phone_number"
                                                className="form-control"
                                                placeholder="Phone"
                                                // value=""
                                            />
                                            <div className="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div className="col-md-12">
                                        <div className="form-group">
                                            <label htmlFor="email">Email Address</label>
                                            <input
                                                type="email"
                                                id="email"
                                                name="email"
                                                className="form-control"
                                                placeholder="enter email"
                                                // value=""
                                            />
                                            <div className="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div className="col-md-12">
                                        <div className="form-group">
                                            <label htmlFor="message">Your Message</label>
                                            <textarea
                                                name="message"
                                                id="message"
                                                className="form-control"
                                                rows="5"
                                                placeholder="Message"
                                            ></textarea>
                                            <div className="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div className="col-md-12">
                                        <div className="form-group mb-0">
                                            <ul className="radio-filter mb-25">
                                                <li>
                                                    <input
                                                        className="form-check-input"
                                                        type="radio"
                                                        name="terms-condition"
                                                        id="terms-condition"
                                                    />
                                                    <label htmlFor="terms-condition">
                                                        Save my name, email, and website in this browser for the next
                                                        time I comment.
                                                    </label>
                                                </li>
                                            </ul>
                                            <button type="submit" className="theme-btn style-two">
                                                <span data-hover="Send Comments">Send Comments</span>
                                                <i className="fal fa-arrow-right"></i>
                                            </button>
                                            <div id="msgSubmit" className="hidden"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div className="col-lg-5">
                        <div className="contact-images-part">
                            <div className="row">
                                <div className="col-12">
                                    <img src="assets/images/contact/contact1.jpg" alt="Contact" />
                                </div>
                                <div className="col-6">
                                    <img src="assets/images/contact/contact2.jpg" alt="Contact" />
                                </div>
                                <div className="col-6">
                                    <img src="assets/images/contact/contact3.jpg" alt="Contact" />
                                </div>
                            </div>
                            <div className="circle-logo">
                                <img src="assets/images/contact/icon.png" alt="Logo" />
                                <span className="title h2">Dulichvivu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
}

export default Form;
