import banner_newletter from '~/assets/images/newsletter/newsletter-bg-lines.png';
import banner_newletter_two from '~/assets/images/newsletter/newsletter-two-right.jpg';

function Newletter() {
    return (
        <section
            className="newsletter-three bgc-primary py-100 rel z-1"
            style={{ backgroundImage: `url(${banner_newletter})` }}
        >
            <div className="container container-1500">
                <div className="row">
                    <div className="col-lg-6">
                        <div className="newsletter-content-part text-white rmb-55">
                            <div className="section-title counter-text-wrap mb-45">
                                <h2>Subscribe Our Newsletter to Get more offer & Tips</h2>
                                <p>
                                    One site <span className="count-text plus">34500</span> most popular experience
                                    you’ll remember
                                </p>
                            </div>
                            <form className="newsletter-form mb-15" action="#">
                                <input id="news-email" type="email" placeholder="Email Address" required />
                                <button type="submit" className="theme-btn bgc-secondary style-two">
                                    <span data-hover="Subscribe">Subscribe</span>
                                    <i className="fal fa-arrow-right"></i>
                                </button>
                            </form>
                            <p>No credit card requirement. No commitments</p>
                        </div>
                        <div className="newsletter-bg-image">
                            <img src="/assets/images/newsletter/newsletter-bg-image.png" alt="Newsletter" />
                        </div>
                    </div>
                    <div className="col-lg-6">
                        <div
                            className="newsletter-image-part bgs-cover"
                            style={{ backgroundImage: `url(${banner_newletter_two})` }}
                        ></div>
                    </div>
                </div>
            </div>
        </section>
    );
}

export default Newletter;
