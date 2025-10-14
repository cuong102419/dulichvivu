import classNames from 'classnames/bind';
import { useEffect, useRef, useState } from 'react';
import ReactSlider from 'react-slider';
import styles from './PriceFilter.module.scss';
import { debounce } from 'lodash';

const cx = classNames.bind(styles);

const PriceFilter = ({ onPriceChange }) => {
    const [range, setRange] = useState([0, 100]);

    const debouncedChange = useRef(
        debounce((value) => {
            onPriceChange && onPriceChange(value);
        }, 500),
    ).current;

    const handleChange = (value) => {
        setRange(value);
        debouncedChange(value);
    };

    useEffect(() => {
        return () => {
            debouncedChange.cancel();
        };
    }, [debouncedChange]);

    return (
        <div className={cx('price-filter')}>
            <ReactSlider
                className={cx('custom-slider')}
                thumbClassName={cx('custom-thumb')}
                trackClassName={cx('custom-track')}
                value={range}
                onChange={handleChange}
                min={0}
                max={100}
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
