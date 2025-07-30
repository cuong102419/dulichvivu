import classNames from 'classnames/bind';
import styles from './SelectFilter.module.scss';
import { useSelect } from 'downshift';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faChevronDown } from '@fortawesome/free-solid-svg-icons';

const cx = classNames.bind(styles);

const items = [
    { label: 'Mới nhất', value: 'new' },
    { label: 'Cũ nhất', value: 'old' },
    { label: 'Giá cao đến thấp  ', value: 'high-to-low' },
    { label: 'Giá thấp đến cao', value: 'low-to-high' },
];

function SelectFilter({ value, onChange }) {
    const { isOpen, getToggleButtonProps, getMenuProps, highlightedIndex, getItemProps, selectedItem } = useSelect({
        items,
        selectedItem: items.find((i) => i.value === value) || null,
        onSelectedItemChange: ({ selectedItem }) => {
            if (selectedItem) onChange(selectedItem.value);
        },
    });

    return (
        <div className={cx('sort-wrapper', 'rel')}>
            <div className={cx('sort-text')}>Sắp xếp theo</div>
            <div className={cx('select-box')}>
                <button type="button" {...getToggleButtonProps()} className={cx('select-toggle')}>
                    <span>{selectedItem?.label || 'Tùy chọn'}</span>
                    <span className={cx('arrow', { open: isOpen })}><FontAwesomeIcon icon={faChevronDown}/></span>
                </button>

                <ul {...getMenuProps()} className={cx('select-menu', { open: isOpen })}>
                    {isOpen && (
                        <>
                            {items.map((item, index) => (
                                <li
                                    key={item.value}
                                    {...getItemProps({ item, index })}
                                    className={cx('select-option', {
                                        highlighted: highlightedIndex === index,
                                        selected: selectedItem?.value === item.value,
                                    })}
                                >
                                    {item.label}
                                </li>
                            ))}
                        </>
                    )}
                </ul>
            </div>
        </div>
    );
}

export default SelectFilter;
