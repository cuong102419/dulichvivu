// import { Link } from 'react-router-dom';

import PriceFilter from './PriceFilter';

function Sidebar({ oneAreaChange }) {
    const handleChange = (e) => {
        oneAreaChange(e.target.value);
    };

    return (
        <div className="shop-sidebar">
            <div className="widget widget-filter">
                <h6 className="widget-title">Ngân sách</h6>
                <div className="price-filter-wrap">
                    <PriceFilter />
                </div>
            </div>

            <div className="widget widget-activity">
                <ul className="radio-filter" onChange={handleChange}>
                    <li>
                        <input
                            className="form-check-input"
                            type="radio"
                            defaultChecked
                            name="ByActivities"
                            id="activity3"
                        />
                        <label htmlFor="activity3">Tất cả</label>
                    </li>
                    <li>
                        <input
                            className="form-check-input"
                            type="radio"
                            value="trong-nuoc"
                            name="ByActivities"
                            id="activity1"
                        />
                        <label htmlFor="activity1">Tour trong nước</label>
                    </li>
                    <li>
                        <input
                            className="form-check-input"
                            value="nuoc-ngoai"
                            type="radio"
                            name="ByActivities"
                            id="activity2"
                        />
                        <label htmlFor="activity2">Tour nước ngoài</label>
                    </li>
                </ul>
            </div>

            <div className="widget widget-reviews">
                <h6 className="widget-title">Đánh giá</h6>
                <ul className="radio-filter">
                    <li>
                        <input className="form-check-input" type="radio" defaultChecked name="ByReviews" id="review1" />
                        <label htmlFor="review1">
                            <span className="ratting">
                                <i className="fas fa-star"></i>(5)
                            </span>
                        </label>
                    </li>
                    <li>
                        <input className="form-check-input" type="radio" name="ByReviews" id="review2" />
                        <label htmlFor="review2">
                            <span className="ratting">
                                <i className="fas fa-star"></i>(4)
                            </span>
                        </label>
                    </li>
                    <li>
                        <input className="form-check-input" type="radio" name="ByReviews" id="review3" />
                        <label htmlFor="review3">
                            <span className="ratting">
                                <i className="fas fa-star"></i>(3)
                            </span>
                        </label>
                    </li>
                    <li>
                        <input className="form-check-input" type="radio" name="ByReviews" id="review4" />
                        <label htmlFor="review4">
                            <span className="ratting">
                                <i className="fas fa-star"></i>(2)
                            </span>
                        </label>
                    </li>
                    <li>
                        <input className="form-check-input" type="radio" name="ByReviews" id="review5" />
                        <label htmlFor="review5">
                            <span className="ratting">
                                <i className="fas fa-star"></i>(1)
                            </span>
                        </label>
                    </li>
                </ul>
            </div>
        </div>
    );
}

export default Sidebar;
