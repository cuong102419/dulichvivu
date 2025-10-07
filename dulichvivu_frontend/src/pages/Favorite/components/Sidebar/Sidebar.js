import { Link } from 'react-router-dom';
import classNames from 'classnames/bind';
import styles from './Sidebar.module.scss';
import { useEffect, useState } from 'react';
import { getTourSuggest } from '~/services/getTourService';

const cx = classNames.bind(styles);

function Sidebar() {
    const [tours, setTours] = useState([]);

    useEffect(() => {
        const fetchTour = async () => {
            try {
                const res = await getTourSuggest();
                setTours(res.data);
            } catch (error) {
                console.error(error);
            }
        };

        fetchTour();
    }, []);

    return (
        <div className="col-lg-3 col-md-6 col-sm-10 rmb-75">
            <div className="shop-sidebar mb-30">
                <div className="widget widget-tour">
                    <h6 className="widget-title">Tour phổ biến</h6>
                    {tours.map((tour) => (
                        <div className={cx('destination-item', 'tour-grid', 'style-three', 'bgc-lighter')}>
                            <div className={cx('image')}>
                                <img src={tour.image_url} alt="Tour" />
                            </div>
                            <div className={cx('content')}>
                                <h6>
                                    <Link to={`/tour/${tour.slug}`}>{tour.title}</Link>
                                </h6>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </div>
    );
}

export default Sidebar;
