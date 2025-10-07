import PriceFilter from './PriceFilter';

function Sidebar({ oneAreaChange, onRatingChange }) {
    const handleChange = (e) => {
        oneAreaChange(e.target.value);
    };

    const handleRatingChange = (e) => {
        onRatingChange(e.target.value);
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
                <ul className="radio-filter" onChange={handleRatingChange}>
                    <li>
                        <input
                            className="form-check-input"
                            type="radio"
                            value=""
                            defaultChecked
                            name="ByReviews"
                            id="review0"
                        />
                        <label htmlFor="review0">
                            <span className="ratting">Tất cả</span>
                        </label>
                    </li>
                    {[5, 4, 3, 2, 1].map((star) => (
                        <li key={star}>
                            <input
                                className="form-check-input"
                                type="radio"
                                value={star}
                                name="ByReviews"
                                id={`review${star}`}
                            />
                            <label htmlFor={`review${star}`}>
                                <span className="ratting">
                                    <i className="fas fa-star"></i>({star})
                                </span>
                            </label>
                        </li>
                    ))}
                </ul>
            </div>
        </div>
    );
}

export default Sidebar;
