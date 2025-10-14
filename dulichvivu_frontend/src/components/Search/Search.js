import classNames from 'classnames/bind';
import styles from './Search.module.scss';
import DateInput from '../DateInput';
import { useState } from 'react';
import { addDays } from 'date-fns';
import { useLocation, useNavigate } from 'react-router-dom';

const cx = classNames.bind(styles);

function Search({ onSearch }) {
    const location = useLocation();
    const prevState = location.state;
    const [startDate, setStartDate] = useState(prevState?.startDate || null);
    const [endDate, setEndDate] = useState(prevState?.endDate || null);
    const today = new Date();
    const navigate = useNavigate();

    const handleStartDate = (date) => {
        setStartDate(date);
        setEndDate(null);
    };

    const handleSubmit = () => {
        const values = {
            startDate,
            endDate,
        };
        console.log('Tìm kiếm:', values);
        onSearch && onSearch(values);
        navigate('/tour', { state: values });
    };

    return (
        <div className={cx('container', 'container-1400')}>
            <div className={cx('search-filter-inner')}>
                <div className={cx('filter-item', 'clearfix')}>
                    <div className={cx('label')}>
                        <div className={cx('icon')}>
                            <i className="fal fa-calendar-alt"></i>
                        </div>
                        <span className={cx('title')}>Ngày bắt đầu</span>
                    </div>
                    <DateInput
                        value={startDate}
                        onChange={handleStartDate}
                        placeholder="Chọn ngày bắt đầu"
                        startDate={[{ before: today }]}
                    />
                </div>
                <div className={cx('filter-item', 'clearfix')}>
                    <div className={cx('label')}>
                        <div className={cx('icon')}>
                            <i className="fal fa-calendar-alt"></i>
                        </div>
                        <span className={cx('title')}>Ngày kết thúc</span>
                    </div>
                    <DateInput
                        // forwardRef={}
                        value={endDate}
                        onChange={setEndDate}
                        placeholder="Chọn ngày kết thúc"
                        startDate={[{ before: addDays(startDate ?? today, 1) }]}
                    />
                </div>
                <div className="search-button">
                    <button className="theme-btn" onClick={handleSubmit}>
                        <span data-hover="Tìm Kiếm">Tìm kiếm</span>
                        <i className="far fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    );
}

export default Search;
