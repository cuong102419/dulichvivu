import classNames from 'classnames/bind';
import styles from './InputGroup.module.scss';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faEye, faEyeSlash } from '@fortawesome/free-solid-svg-icons';
import { useEffect, useState } from 'react';

const cx = classNames.bind(styles);

function InputGroup({ type, value, placeholder, icon, id, onChange }) {
    const [showPassword, setShowPassword] = useState(false);

    const inputType = type === 'password' ? (showPassword ? 'text' : 'password') : type;

    const showToggle = type === 'password' && value !== '';

    useEffect(() => {
        if (type === 'password' && value === '') {
            setShowPassword(false);
        }
    }, [value, type]);

    return (
        <div className={cx('input-group')}>
            <label htmlFor={id} className={cx('label')}>
                {icon}
            </label>
            <input
                id={id}
                type={inputType}
                className={cx('input')}
                value={value}
                placeholder={placeholder}
                onChange={onChange}
            />
            {showToggle && (
                <button type="button" className={cx('toggle-btn')} onClick={() => setShowPassword(!showPassword)}>
                    <FontAwesomeIcon icon={showPassword ? faEye : faEyeSlash} />
                </button>
            )}
        </div>
    );
}

export default InputGroup;
