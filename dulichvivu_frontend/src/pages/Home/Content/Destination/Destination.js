import classNames from 'classnames/bind';
import { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import { getHomeTour } from '~/services/getHomeTourService';
import styles from './Destination.module.scss';

const cx = classNames.bind(styles);

function Destination() {
    const [tours, setTours] = useState([]);
    const departure_location = {
        ha_noi: 'Hà Nội',
        ho_chi_minh: 'TP Hồ Chí Minh',
        da_nang: 'Đà Nẵng',
    };

    useEffect(() => {
        const fetchTours = async () => {
            const data = await getHomeTour();
            if (data) {
                setTours(data.data);
            }
        };

        fetchTours();
    }, []);

    return (
        <section className="destinations-area bgc-white pt-100 pb-70 rel z-1">
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-lg-12 col-xs-12">
                        <div className="section-title text-dark text-center counter-text-wrap mb-70">
                            <h2>Tour trong nước nổi bật </h2>
                            <p>
                                Một trang web có tới <span className="count-text plus">34500</span> trải nghiệm phổ biến
                                nhất mà bạn sẽ nhớ
                            </p>
                        </div>
                    </div>
                </div>
                <div className="row g-4">
                    {tours.map((tour) => (
                        <div key={tour.id} className="col-xxl-3 col-xl-4 col-md-6 col-xs-12">
                            <div className="destination-item h-100">
                                <div className="image">
                                    <div className="ratting">
                                        <i className="fas fa-star"></i> 4.8
                                    </div>
                                    <Link to="#" className="heart shadow">
                                        <i className="fas fa-heart"></i>
                                    </Link>
                                    <Link to={`/tour/${tour.slug}`}>
                                        <img
                                            className={cx('thumbnail')}
                                            src={tour.image_url ?? 'assets/images/destinations/visiting-place1.jpg'}
                                            alt="Destination"
                                        />
                                    </Link>
                                </div>
                                <div className="content">
                                    <h5>
                                        <Link to={`/tour/${tour.slug}`}>{tour.title}</Link>
                                    </h5>
                                    <span className="location"><i className="fal fa-ticket me-2"></i>Mã tour: <strong>{tour.code}</strong></span>
                                    <span className="time">
                                        <i className="fal fa-clock me-2"> </i>Thời lượng: <strong>{tour.duration}</strong>
                                    </span>
                                    <span className="departure-start d-block">
                                        <i className="fal fa-map-marker-alt me-2"></i>Nơi khởi hành:{' '}
                                        <strong>{departure_location[tour.departure_location]}</strong>
                                    </span>
                                </div>
                                <div className={cx('destination-footer', 'item-footer')}>
                                    <span className="price">
                                        <span className='fw-bold text-danger'>{new Intl.NumberFormat('vi-VN').format(tour.price_adult)}đ</span>
                                    </span>
                                    <Link to="#" className="read-more">
                                        Đặt Ngay <i className="fal fa-angle-right"></i>
                                    </Link>
                                </div>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </section>
    );
}

export default Destination;
