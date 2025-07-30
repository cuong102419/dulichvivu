import classNames from 'classnames/bind';
import styles from './GuestSelector.module.scss';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faMinus, faPlus } from '@fortawesome/free-solid-svg-icons';

const cx = classNames.bind(styles);

function GuestSelector({ adults, children, onGuestChange }) {

    const hanldleChange = (type, delta) => {
        const newValue = type === 'adults' ? adults + delta : children + delta;
        onGuestChange(type, Math.max(0, newValue));
    };

    return (
        <div className={cx('guest-selector', 'mt-40')}>
            <h5 className="fw-bold">Hành Khách</h5>
            <div className={cx('group', 'mt-40')}>
                <div className={cx('item')}>
                    <p className={cx('label')}>Người lớn </p>
                    <div className={cx('control')}>
                        <button className="btn" onClick={() => hanldleChange('adults', -1)}>
                            <FontAwesomeIcon icon={faMinus} />
                        </button>
                        <h5 className={cx('count')}>{adults}</h5>
                        <button className="btn" onClick={() => hanldleChange('adults', 1)}>
                            <FontAwesomeIcon icon={faPlus} />
                        </button>
                    </div>
                </div>
                <div className={cx('item')}>
                    <p className={cx('label')}>Trẻ em </p>
                    <div className={cx('control')}>
                        <button className="btn" onClick={() => hanldleChange('children', -1)}>
                            <FontAwesomeIcon icon={faMinus} />
                        </button>
                        <h5 className={cx('count')}>{children}</h5>
                        <button className="btn" onClick={() => hanldleChange('children', 1)}>
                            <FontAwesomeIcon icon={faPlus} />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default GuestSelector;
