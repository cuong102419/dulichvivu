import classNames from 'classnames/bind';
import { useCallback, useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import { getHomeTour } from '~/services/getHomeTourService';
import styles from './Destination.module.scss';
import useRealtime from '~/hooks/useRealtime';
import { debounce } from 'lodash';

const cx = classNames.bind(styles);

function Destination() {
    const [toursLocal, setToursLocal] = useState([]);
    const [toursInternational, setToursInternational] = useState([]);
    const departure_location = {
        ha_noi: 'Hà Nội',
        ho_chi_minh: 'TP Hồ Chí Minh',
        da_nang: 'Đà Nẵng',
    };
    
    const fetchTours = useCallback(async () => {
        const data = await getHomeTour();

        if (data) {
            setToursLocal(data.data.toursLocal);
            setToursInternational(data.data.toursInternational);
        }
    }, [])

    useEffect(() => {
        fetchTours();
    }, [fetchTours]);

    useRealtime('tours', 'TourChanged', debounce(fetchTours, 1000));

    return (
        <section className="destinations-area bgc-white pt-100 pb-70 rel z-1">
            <div className="container">
                <div className="row justify-content-center mt-80">
                    <div className="col-lg-12 col-xs-12">
                        <div className="section-title text-dark text-center counter-text-wrap mb-70">
                            <h2>Tour trong nước nổi bật </h2>
                        </div>
                    </div>
                </div>
                <div className="row g-4">
                    {toursLocal.map((tour) => (
                        <div key={tour.id} className="col-xxl-3 col-xl-4 col-md-6 col-xs-12">
                            <div className="destination-item h-100">
                                <div className="image">
                                    <div className="ratting">
                                        <i className="fas fa-star"></i> {tour.reviews ?? '5.0'}
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
                                    <span className="location">
                                        <i className="fal fa-ticket me-2"></i>Mã tour: <strong>{tour.code}</strong>
                                    </span>
                                    <span className="time">
                                        <i className="fal fa-clock me-2"> </i>Thời lượng:{' '}
                                        <strong>{tour.duration}</strong>
                                    </span>
                                    <span className="departure-start d-block">
                                        <i className="fal fa-map-marker-alt me-2"></i>Nơi khởi hành:{' '}
                                        <strong>{departure_location[tour.departure_location]}</strong>
                                    </span>
                                </div>
                                <div className={cx('destination-footer', 'item-footer')}>
                                    <span className="price">
                                        <span className="fw-bold text-danger">
                                            {new Intl.NumberFormat('vi-VN').format(tour.price_adult)}đ
                                        </span>
                                    </span>
                                    <Link to="#" className="read-more">
                                        Đặt Ngay <i className="fal fa-angle-right"></i>
                                    </Link>
                                </div>
                            </div>
                        </div>
                    ))}
                </div>
                <div className="row justify-content-center mt-120">
                    <div className="col-lg-12 col-xs-12">
                        <div className="section-title text-dark text-center counter-text-wrap mb-70">
                            <h2>Tour quốc tế nổi bật </h2>
                        </div>
                    </div>
                </div>
                <div className="row g-4">
                    {toursInternational.map((tour) => (
                        <div key={tour.id} className="col-xxl-3 col-xl-4 col-md-6 col-xs-12">
                            <div className="destination-item h-100">
                                <div className="image">
                                    <div className="ratting">
                                        <i className="fas fa-star"></i> {tour.reviews ?? '5.0'}
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
                                    <span className="location">
                                        <i className="fal fa-ticket me-2"></i>Mã tour: <strong>{tour.code}</strong>
                                    </span>
                                    <span className="time">
                                        <i className="fal fa-clock me-2"> </i>Thời lượng:{' '}
                                        <strong>{tour.duration}</strong>
                                    </span>
                                    <span className="departure-start d-block">
                                        <i className="fal fa-map-marker-alt me-2"></i>Nơi khởi hành:{' '}
                                        <strong>{departure_location[tour.departure_location]}</strong>
                                    </span>
                                </div>
                                <div className={cx('destination-footer', 'item-footer')}>
                                    <span className="price">
                                        <span className="fw-bold text-danger">
                                            {new Intl.NumberFormat('vi-VN').format(tour.price_adult)}đ
                                        </span>
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
