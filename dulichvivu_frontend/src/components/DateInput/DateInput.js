import { useMemo, useState } from 'react';
import { addYears, format, startOfDay } from 'date-fns';
import { DayPicker } from 'react-day-picker';
import 'react-day-picker/dist/style.css';
import classNames from 'classnames/bind';
import styles from './DateInput.module.scss';
import { vi } from 'react-day-picker/locale';

const cx = classNames.bind(styles);

function DateInput({ forwardRef, value, onChange, placeholder, startDate }) {
    const [showCalendar, setShowCalendar] = useState(false);

    const startMonth = useMemo(() => startOfDay(new Date()), []);
    
    const handleSelect = (date) => {
        onChange(date);
        setShowCalendar(false);
    };

    return (
        <div className={cx('wrapper')}>
            <input
                ref={forwardRef}
                type="text"
                readOnly
                value={value ? format(value, 'dd/MM/yyyy') : ''}
                onClick={() => setShowCalendar((prev) => !prev)}
                className={styles.input}
                placeholder={placeholder}
            />

            {showCalendar && (
                <div className={styles.calendar}>
                    <DayPicker
                        locale={vi}
                        mode="single"
                        selected={value}
                        onSelect={handleSelect}
                        captionLayout="dropdown"
                        disabled={startDate}
                        startMonth={startMonth}
                        endMonth={addYears(new Date(), 5)}
                    />
                </div>
            )}
        </div>
    );
}

export default DateInput;
