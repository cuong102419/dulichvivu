import classNames from 'classnames/bind';
import { useState } from 'react';
import ReactSlider from 'react-slider';
import styles from './PriceFilter.module.scss';

const cx = classNames.bind(styles);

const PriceFilter = () => {
    const [range, setRange] = useState([0, 200]);

    return (
        <div className={cx('price-filter')}>
            <ReactSlider
                className={cx('custom-slider')}
                thumbClassName={cx('custom-thumb')}
                trackClassName={cx('custom-track')}
                value={range}
                onChange={setRange}
                min={0}
                max={200}
                minDistance={1}
                pearling
            />
            <div className={cx('price-value')}>
                Giá:{' '}
                <strong>
                    {range[0]} triệu - {range[1]} triệu
                </strong>
            </div>
        </div>
    );
};

export default PriceFilter;
