import { useSelect } from 'downshift';
import classNames from 'classnames/bind';
import styles from './DownshiftSelect.module.scss';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faChevronDown } from '@fortawesome/free-solid-svg-icons';

const cx = classNames.bind(styles);

const items = ['City or Region', 'City', 'Region'];

function DownshiftSelect({ value, onChange }) {
    const { isOpen, getToggleButtonProps, getMenuProps, highlightedIndex, getItemProps, selectedItem } = useSelect({
        items,
        selectedItem: value,
        onSelectedItemChange: ({ selectedItem }) => {
            onChange(selectedItem);
        },
    });

    return (
        <div className={cx('select-wrapper')}>
            <button type="button" {...getToggleButtonProps()} className={cx('select-toggle')}>
                <span>{value || <span style={{ color: '#757575' }}>Chọn địa điểm</span>}</span>
                <span className={cx('arrow', { open: isOpen })}>
                    <FontAwesomeIcon icon={faChevronDown} />
                </span>
            </button>

            <ul {...getMenuProps()} className={cx('select-menu', { open: isOpen })}>
                {isOpen &&
                    items.map((item, index) => (
                        <li
                            key={`${item}-${index}`}
                            {...getItemProps({ item, index })}
                            className={cx('select-option', {
                                highlighted: highlightedIndex === index,
                                selected: value === item,
                            })}
                        >
                            {item}
                        </li>
                    ))}
            </ul>
        </div>
    );
}

export default DownshiftSelect;
