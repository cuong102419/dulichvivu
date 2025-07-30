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
                <h6 className="widget-title">By Reviews</h6>
                <ul className="radio-filter">
                    <li>
                        <input className="form-check-input" type="radio" defaultChecked name="ByReviews" id="review1" />
                        <label htmlFor="review1">
                            <span className="ratting">
                                <i className="fas fa-star"></i>
                                <i className="fas fa-star"></i>
                                <i className="fas fa-star"></i>
                                <i className="fas fa-star"></i>
                                <i className="fas fa-star"></i>
                            </span>
                        </label>
                    </li>
                    <li>
                        <input className="form-check-input" type="radio" name="ByReviews" id="review2" />
                        <label htmlFor="review2">
                            <span className="ratting">
                                <i className="fas fa-star"></i>
                                <i className="fas fa-star"></i>
                                <i className="fas fa-star"></i>
                                <i className="fas fa-star"></i>
                                <i className="fas fa-star-half-alt white"></i>
                            </span>
                        </label>
                    </li>
                    <li>
                        <input className="form-check-input" type="radio" name="ByReviews" id="review3" />
                        <label htmlFor="review3">
                            <span className="ratting">
                                <i className="fas fa-star"></i>
                                <i className="fas fa-star"></i>
                                <i className="fas fa-star"></i>
                                <i className="fas fa-star white"></i>
                                <i className="fas fa-star-half-alt white"></i>
                            </span>
                        </label>
                    </li>
                    <li>
                        <input className="form-check-input" type="radio" name="ByReviews" id="review4" />
                        <label htmlFor="review4">
                            <span className="ratting">
                                <i className="fas fa-star"></i>
                                <i className="fas fa-star"></i>
                                <i className="fas fa-star white"></i>
                                <i className="fas fa-star white"></i>
                                <i className="fas fa-star-half-alt white"></i>
                            </span>
                        </label>
                    </li>
                    <li>
                        <input className="form-check-input" type="radio" name="ByReviews" id="review5" />
                        <label htmlFor="review5">
                            <span className="ratting">
                                <i className="fas fa-star"></i>
                                <i className="fas fa-star white"></i>
                                <i className="fas fa-star white"></i>
                                <i className="fas fa-star white"></i>
                                <i className="fas fa-star-half-alt white"></i>
                            </span>
                        </label>
                    </li>
                </ul>
            </div>

            <div className="widget widget-languages">
                <h6 className="widget-title">By Languages</h6>
                <ul className="radio-filter">
                    <li>
                        <input
                            className="form-check-input"
                            type="radio"
                            defaultChecked
                            name="ByLanguages"
                            id="language1"
                        />
                        <label htmlFor="language1">American</label>
                    </li>
                    <li>
                        <input className="form-check-input" type="radio" name="ByLanguages" id="language2" />
                        <label htmlFor="language2">English</label>
                    </li>
                    <li>
                        <input className="form-check-input" type="radio" name="ByLanguages" id="language3" />
                        <label htmlFor="language3">German</label>
                    </li>
                    <li>
                        <input className="form-check-input" type="radio" name="ByLanguages" id="language4" />
                        <label htmlFor="language4">Japanese</label>
                    </li>
                    <li>
                        <input className="form-check-input" type="radio" name="ByLanguages" id="language5" />
                        <label htmlFor="language5">Vietnamese</label>
                    </li>
                    <li>
                        <input className="form-check-input" type="radio" name="ByLanguages" id="language6" />
                        <label htmlFor="language6">French</label>
                    </li>
                </ul>
            </div>

            <div className="widget widget-duration">
                <h6 className="widget-title">Duration</h6>
                <ul className="radio-filter">
                    <li>
                        <input
                            className="form-check-input"
                            type="radio"
                            defaultChecked
                            name="Duration"
                            id="duration1"
                        />
                        <label htmlFor="duration1">0 - 2 hours</label>
                    </li>
                    <li>
                        <input className="form-check-input" type="radio" name="Duration" id="duration2" />
                        <label htmlFor="duration2">2 - 4 hours</label>
                    </li>
                    <li>
                        <input className="form-check-input" type="radio" name="Duration" id="duration3" />
                        <label htmlFor="duration3">4 - 8 hours</label>
                    </li>
                    <li>
                        <input className="form-check-input" type="radio" name="Duration" id="duration4" />
                        <label htmlFor="duration4">Fulda (+8 hours)</label>
                    </li>
                    <li>
                        <input className="form-check-input" type="radio" name="Duration" id="duration5" />
                        <label htmlFor="duration5">Multi days</label>
                    </li>
                </ul>
            </div>
        </div>
    );
}

export default Sidebar;
