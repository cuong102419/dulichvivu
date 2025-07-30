import classNames from 'classnames/bind';
import { Link } from 'react-router-dom';
import Sidebar from '../components/Sidebar';
import SelectFilter from '../components/SelectFilter';
import { useEffect, useState } from 'react';
import { getListTour } from '~/services/getListTourService';
import styles from './Content.module.scss';

const cx = classNames.bind(styles);

function Content() {
    const [shortValue, setShortValue] = useState(null);
    const [tours, setTours] = useState([]);
    const [currentPage, setCurrentPage] = useState(1);
    const [lastPage, setLastPage] = useState(1);
    const [selectArea, setSelectedArea] = useState('');
    const departureLocation = {
        ha_noi: 'Hà Nội',
        da_nang: 'Đà Nẵng',
        ho_chi_minh: 'TP Hồ Chí Minh',
    };
    const type = {
        budget: {
            value: 'Tiết kiệm',
            className: 'bgc-yellow',
        },
        standard: {
            value: 'Tiêu chuẩn',
            className: 'bgc-blue',
        },
        premium: {
            value: 'Cao cấp',
            className: 'bgc-pink',
        },
    };

    useEffect(() => {
        const fetchTours = async () => {
            const data = await getListTour(currentPage, 9, selectArea);

            if (data) {
                setTours(data.data.data);
                setLastPage(data.data.last_page);
            }
        };

        fetchTours();
    }, [currentPage, selectArea]);

    return (
        <section className="tour-grid-page py-100 rel z-1">
            <div className="container">
                <div className="row">
                    <div className="col-lg-3 col-md-6 col-sm-10 rmb-75">
                        <Sidebar oneAreaChange={setSelectedArea} />
                    </div>
                    <div className="col-lg-9">
                        <SelectFilter value={shortValue} onChange={setShortValue} />
                        <div className="tour-grid-wrap">
                            <div className="row">
                                {tours.map((tour) => (
                                    <div key={tour.id} className="col-xl-4 col-md-6 d-flex">
                                        <div
                                            className={cx(
                                                'destination-item',
                                                'item',
                                                'tour-grid',
                                                'style-three',
                                                'bgc-lighter',
                                            )}
                                        >
                                            <div className="image">
                                                <span className={`badge ${type[tour.type].className} shadow`}>
                                                    {type[tour.type].value}
                                                </span>
                                                <Link to="#" className="heart">
                                                    <i className="fas fa-heart"></i>
                                                </Link>
                                                <Link to={`/tour/${tour.slug}`}>
                                                    <img className={cx('thumbnail')} src={tour.image_url} alt="Tour List" />
                                                </Link>
                                            </div>
                                            <div className="content">
                                                <h6>
                                                    <Link to={`/tour/${tour.slug}`}>{tour.title}</Link>
                                                </h6>
                                                <div className="destination-header">
                                                    <span>
                                                        <i className="fal fa-ticket me-2"></i>Mã tour: <strong>{tour.code}</strong>
                                                    </span>
                                                    <span>
                                                        <i className="fal fa-map-marker-alt me-2"></i>Nơi khởi hành:{' '}
                                                        <strong>{departureLocation[tour.departure_location]}</strong>
                                                    </span>
                                                    <span>
                                                        <i className="fal fa-calendar me-2"></i>Ngày khởi hành: <strong>{tour.start_date}</strong>
                                                    </span>
                                                </div>
                                                <div className="destination-footer">
                                                    <span className="price">
                                                        <span className="fw-bold text-danger">
                                                            {new Intl.NumberFormat('vi-VN').format(tour.price_adult)}đ
                                                        </span>
                                                    </span>
                                                    <Link
                                                        to={`/tour/${tour.slug}`}
                                                        className="theme-btn style-two style-three"
                                                    >
                                                        <i className="fal fa-arrow-right"></i>
                                                    </Link>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                ))}
                                <div className="col-lg-12">
                                    <ul className="pagination justify-content-center pt-15 flex-wrap">
                                        <li className={`page-item ${currentPage === 1 ? 'disabled' : ''}`}>
                                            <button
                                                onClick={() => setCurrentPage((p) => Math.max(p - 1, 1))}
                                                className="page-link"
                                            >
                                                <i className="far fa-chevron-left"></i>
                                            </button>
                                        </li>
                                        {Array.from({ length: lastPage }, (_, i) => (
                                            <li
                                                key={i}
                                                className={`page-item ${currentPage === i + 1 ? 'active' : ''}`}
                                            >
                                                <button onClick={() => setCurrentPage(i + 1)} className="page-link">
                                                    {i + 1}
                                                </button>
                                            </li>
                                        ))}
                                        <li className={`page-item ${currentPage === lastPage ? 'disabled' : ''}`}>
                                            <button
                                                onClick={() => setCurrentPage((p) => Math.min(p + 1, lastPage))}
                                                className="page-link"
                                            >
                                                <i className="far fa-chevron-right"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
}

export default Content;
