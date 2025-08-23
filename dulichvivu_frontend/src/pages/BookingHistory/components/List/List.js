import { Link, useNavigate } from 'react-router-dom';
import classNames from 'classnames/bind';
import styles from './List.module.scss';
import { useEffect, useState } from 'react';
import useAuth from '~/hooks/useAuth';
import { getTourHistory } from '~/services/getTourService';

const cx = classNames.bind(styles);

function getPageNumbers(current, last) {
    let delta = 2;
    let range = [];
    let rangeWithDots = [];
    let l;

    for (let i = 1; i <= last; i++) {
        if (i === 1 || i === last || (i >= current - delta && i <= current + delta)) {
            range.push(i);
        }
    }

    for (let i of range) {
        if (l) {
            if (i - l === 2) rangeWithDots.push(l + 1);
            else if (i - l !== 1) rangeWithDots.push('...');
        }
        rangeWithDots.push(i);
        l = i;
    }

    return rangeWithDots;
}

function List() {
    const { user, isLoading, isLog } = useAuth();
    const [tours, setTours] = useState([]);
    const [currentPage, setCurrentPage] = useState(1);
    const [lastPage, setLastPage] = useState(5);
    const navigate = useNavigate();

    useEffect(() => {
        if (!isLoading && !isLog) {
            navigate('/login');
        }
    }, [isLoading, isLog, navigate]);

    useEffect(() => {
        if (isLoading || !user) return;

        const fetchTour = async () => {
            try {
                const res = await getTourHistory(user.id, currentPage);
                setTours(res.data.data);
                setLastPage(res.data.last_page);
            } catch (error) {
                console.error(error);
                navigate('/error');
            }
        };

        fetchTour();
    }, [user, isLoading, navigate, currentPage]);

    return (
        <div className="col-lg-9">
            {tours.map((tour) => (
                <div key={tour.id} className={cx('destination-item', 'style-three', 'bgc-lighter', 'mb-30')}>
                    <div className={cx('image')}>
                        <Link to={`/tour/${tour.slug}`}>
                            <img src={tour.image_url} alt="Tour List" />
                        </Link>
                    </div>
                    <div className={cx('content')}>
                        <div className={cx('destination-header')}>
                            <span className="location">
                                <i className="fal fa-map-marker-alt"></i> Bali, Indonesia
                            </span>
                        </div>
                        <h5>
                            <Link to={`/tour/${tour.slug}`}>{tour.title}</Link>
                        </h5>
                        <ul className="blog-meta">
                            <li>
                                <i className="far fa-clock"></i> {new Date(tour.start_date).toLocaleDateString('vi-VN')}
                            </li>
                        </ul>
                        <div className={cx('destination-footer')}>
                            <span className={cx('price')}>
                                <span className="text-danger">{tour.price_adult.toLocaleString('vi-VN')}đ</span>
                            </span>
                        </div>
                    </div>
                </div>
            ))}
            <ul className="pagination pt-15 flex-wrap">
                <li className={`page-item ${currentPage === 1 ? 'disabled' : ''}`}>
                    <button className="page-link" onClick={() => setCurrentPage((p) => Math.max(p - 1, 1))}>
                        <i className="far fa-chevron-left"></i>
                    </button>
                </li>

                {getPageNumbers(currentPage, lastPage).map((page, idx) => (
                    <li
                        key={idx}
                        className={`page-item ${page === currentPage ? 'active' : ''} ${
                            page === '...' ? 'disabled' : ''
                        }`}
                    >
                        <button className="page-link" onClick={() => page !== '...' && setCurrentPage(page)}>
                            {page}
                        </button>
                    </li>
                ))}

                <li className={`page-item ${currentPage === lastPage ? 'disabled' : ''}`}>
                    <button className="page-link" onClick={() => setCurrentPage((p) => Math.min(p + 1, lastPage))}>
                        <i className="far fa-chevron-right"></i>
                    </button>
                </li>
            </ul>
        </div>
    );
}

export default List;
