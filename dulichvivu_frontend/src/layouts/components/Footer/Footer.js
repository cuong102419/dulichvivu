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
                                    <h5>Dịch vụ</h5>
                                </div>
                                <ul className="list-style-three">
                                    <li>
                                        <Link to="#">Tour Guide tốt nhất</Link>
                                    </li>
                                    <li>
                                        <Link to="#">Đặt tour</Link>
                                    </li>
                                    <li>
                                        <Link to="#">Đặt phòng khách sạn</Link>
                                    </li>
                                    <li>
                                        <Link to="#">Đặt vé</Link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div className="col col-small">
                            <div className="footer-widget footer-links ms-md-4">
                                <div className="footer-title">
                                    <h5>Công ty</h5>
                                </div>
                                <ul className="list-style-three">
                                    <li>
                                        <Link to="/about">Giới thiệu công ty</Link>
                                    </li>
                                    <li>
                                        <Link to="#">Blog</Link>
                                    </li>
                                    <li>
                                        <Link to="#">Việc làm</Link>
                                    </li>
                                    <li>
                                        <Link to="#">Blog mới nhất</Link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div className="col col-small">
                            <div className="footer-widget footer-links ms-lg-4">
                                <div className="footer-title">
                                    <h5>Địa điểm</h5>
                                </div>
                                <ul className="list-style-three">
                                    <li>
                                        <Link to="#">Châu Âu</Link>
                                    </li>
                                    <li>
                                        <Link to="#">Châu Á</Link>
                                    </li>
                                    <li>
                                        <Link to="#">Châu Mỹ</Link>
                                    </li>
                                    <li>
                                        <Link to="#">Châu Phi</Link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div className="col col-md-6 col-10 col-small">
                            <div className="footer-widget footer-contact">
                                <div className="footer-title">
                                    <h5>Liên hệ với chúng tôi</h5>
                                </div>
                                <ul className="list-style-one">
                                    <li>
                                        <i className="fal fa-map-marked-alt"></i> 470 Trần Đại Nghĩa, Ngũ Hành Sơn, Đà Nẵng
                                    </li>
                                    <li>
                                        <i className="fal fa-envelope"></i>{' '}
                                        <Link to="mailto:supportdulichvivu@gmail.com">supportdulichvivu@gmail.com</Link>
                                    </li>
                                    <li>
                                        <i className="fal fa-phone-volume"></i>{' '}
                                        <Link to="callto:+88012334588">+880 (123) 345 88</Link>
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
                                    @Copy 2024 <Link to="/">Dulichvivu</Link>, All rights reserved
                                </p>
                            </div>
                        </div>
                        <div className="col-lg-7 text-center text-lg-end">
                            <ul className="footer-bottom-nav">
                                <li>
                                    <Link to="#">Điều khoản</Link>
                                </li>
                                <li>
                                    <Link to="#">Chính sách bảo mật</Link>
                                </li>
                                <li>
                                    <Link to="#">Thông báo pháp lý</Link>
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
