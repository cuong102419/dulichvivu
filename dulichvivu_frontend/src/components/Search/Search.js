import classNames from 'classnames/bind';
import styles from './Search.module.scss';
import DownshiftSelect from './DownshiftSelect';
import DateInput from '../DateInput';
import { useState } from 'react';
import { addDays, format } from 'date-fns';

const cx = classNames.bind(styles);

function Search() {
    const [destination, setDestination] = useState(null);
    const [startDate, setStartDate] = useState(null);
    const [endDate, setEndDate] = useState(null);
    const today = new Date();

    const handleStartDate = (date) => {
        setStartDate(date);
        setEndDate(null);
    };

    const handleKeyDown = (e) => {
        if (['e', 'E', '+', '-', '.', ','].includes(e.key)) {
            e.preventDefault();
        }
    };

    const handlePaste = (e) => {
        const value = e.clipboardData.getData('text');
        if (!/^\d+$/.test(value)) {
            e.preventDefault();
        }
    };

    const handleInput = (e) => {
        const value = e.target.value;
        e.target.value = value.replace(/\D/g, '');
    };

    const handleSubmit = () => {
        console.log(
            'Destination:',
            destination,
            'startDate:',
            format(startDate, 'dd/MM/yyyy'),
            ' endDate:',
            format(endDate, 'dd/MM/yyyy'),
            'Guests:',
            document.getElementById('guests').value,
        );
    };

    return (
        <div className={cx('container', 'container-1400')}>
            <div className={cx('search-filter-inner')}>
                <div className={cx('filter-item', 'clearfix')}>
                    <div className={cx('label')}>
                        <div className={cx('icon')}>
                            <i className="fal fa-map-marker-alt"></i>
                        </div>
                        <span className={cx('title')}>Địa điểm</span>
                    </div>
                    <DownshiftSelect onChange={setDestination} value={destination} />
                </div>
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
                        <span data-hover="Search">Search</span>
                        <i className="far fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    );
}

export default Search;
