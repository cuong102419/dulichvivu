import { Link } from 'react-router-dom';
import banner_footer from '~/assets/images/backgrounds/footer-two.png';
import logo from '~/assets//images/logos/logo-1.png';

function Footer() {
    return (
        <footer
            className="main-footer footer-two bgp-bottom bgc-black rel z-15 pt-100 pb-115"
            style={{ backgroundImage: `url(${banner_footer})` }}
        >
            <div className="widget-area">
                <div className="container">
                    <div className="row row-cols-xxl-5 row-cols-xl-4 row-cols-md-3 row-cols-2">
                        <div className="col col-small">
                            <div className="footer-widget footer-text">
                                <div className="footer-logo mb-40">
                                    <Link to="/">
                                        <img src={logo} alt="Logo" />
                                    </Link>
                                </div>
                            </div>
                            <picture style={{ display: 'block', maxWidth: '150px', marginTop: '10px' }}>
                                <source
                                    srcSet="https://www.luavietours.com/assets/img/common/header/certifi1_sp.png"
                                    media="(max-width: 767px)"
                                />
                                <img
                                    rel="js-lazy"
                                    data-src="https://www.luavietours.com/assets/img/common/header/certifi1.png"
                                    src="https://www.luavietours.com/assets/img/common/header/certifi1.png"
                                    alt=""
                                    data-ll-status="loaded"
                                    className="entered loaded"
                                />
                            </picture>
                        </div>
                        <div className="col col-small">
                            <div className="footer-widget footer-links ms-sm-5">
                                <div className="footer-title">
                                    <h5>Services</h5>
                                </div>
                                <ul className="list-style-three">
                                    <li>
                                        <a href="destination-details.html">Best Tour Guide</a>
                                    </li>
                                    <li>
                                        <a href="destination-details.html">Tour Booking</a>
                                    </li>
                                    <li>
                                        <a href="destination-details.html">Hotel Booking</a>
                                    </li>
                                    <li>
                                        <a href="destination-details.html">Ticket Booking</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div className="col col-small">
                            <div className="footer-widget footer-links ms-md-4">
                                <div className="footer-title">
                                    <h5>Company</h5>
                                </div>
                                <ul className="list-style-three">
                                    <li>
                                        <a href="about.html">About Company</a>
                                    </li>
                                    <li>
                                        <a href="blog.html">Community Blog</a>
                                    </li>
                                    <li>
                                        <a href="contact.html">Jobs and Careers</a>
                                    </li>
                                    <li>
                                        <a href="blog.html">latest News Blog</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div className="col col-small">
                            <div className="footer-widget footer-links ms-lg-4">
                                <div className="footer-title">
                                    <h5>Destinations</h5>
                                </div>
                                <ul className="list-style-three">
                                    <li>
                                        <a href="destination-details.html">African Safaris</a>
                                    </li>
                                    <li>
                                        <a href="destination-details.html">Alaska & Canada</a>
                                    </li>
                                    <li>
                                        <a href="destination-details.html">South America</a>
                                    </li>
                                    <li>
                                        <a href="destination-details.html">Middle East</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div className="col col-md-6 col-10 col-small">
                            <div className="footer-widget footer-contact">
                                <div className="footer-title">
                                    <h5>Get In Touch</h5>
                                </div>
                                <ul className="list-style-one">
                                    <li>
                                        <i className="fal fa-map-marked-alt"></i> 578 Level, D-block 45 Street
                                        Melbourne, Australia
                                    </li>
                                    <li>
                                        <i className="fal fa-envelope"></i>{' '}
                                        <a href="mailto:supportrevelo@gmail.com">supportrevelo @gmail.com</a>
                                    </li>
                                    <li>
                                        <i className="fal fa-phone-volume"></i>{' '}
                                        <a href="callto:+88012334588">+880 (123) 345 88</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div className="footer-bottom bg-transparent pt-20 pb-5">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-5">
                            <div className="copyright-text text-center text-lg-start">
                                <p>
                                    @Copy 2024 <a href="index.html">Ravelo</a>, All rights reserved
                                </p>
                            </div>
                        </div>
                        <div className="col-lg-7 text-center text-lg-end">
                            <ul className="footer-bottom-nav">
                                <li>
                                    <a href="about.html">Terms</a>
                                </li>
                                <li>
                                    <a href="about.html">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="about.html">Legal notice</a>
                                </li>
                                <li>
                                    <a href="about.html">Accessibility</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    );
}

export default Footer;
