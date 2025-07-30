import { faArrowRight } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import classNames from 'classnames/bind';
import styles from './Sidebar.module.scss';
import { format, parse, parseISO } from 'date-fns';

const cx = classNames.bind(styles);

function Sidebar({ tour, departure, adults, children, onConfirm }) {
    let startDate = '';
    let endDate = '';
    let time = '';

    if (departure?.start_date && departure?.end_date) {
        try {
            startDate = format(parseISO(departure.start_date), 'dd-MM-yyyy');
            endDate = format(parseISO(departure.end_date), 'dd-MM-yyyy');
            time = format(parse(departure.departure_time, 'HH:mm:ss', new Date()), 'HH:mm');
        } catch (error) {
            console.error('Lỗi khi format ngày:', error);
        }
    }

    const priceAdult = departure?.price_adult || 0;
    const priceChild = departure?.price_child || 0;
    const totalAdultPrice = adults * priceAdult;
    const totalChildPrice = children * priceChild;
    const totalPrice = totalAdultPrice + totalChildPrice;

    return (
        <div className="blog-sidebar tour-sidebar">
            <div className={cx('widget', 'widget-booking')}>
                <div className="mb-25">
                    <span>Mã tour: </span>
                    <b>{tour?.code}</b>
                    <div className="mt-15">
                        <h6 className="fw-bold">{tour?.title}</h6>
                    </div>
                    <div className="mt-15">
                        <span>{startDate}</span>
                        <FontAwesomeIcon icon={faArrowRight} className="ms-2 me-2" />
                        <span>{endDate}</span>
                        <b className="ms-5">{time}</b>
                    </div>
                    <div className='mt-15'>
                        <span>Số chỗ còn nhận: </span>
                        <b>{departure?.capacity}</b>
                    </div>
                </div>
                <hr />
                <div>
                    <div className="mb-20 mt-25 d-flex justify-content-between">
                        <span>Người lớn:</span>
                        <span className="fw-bold">
                            {adults > 0 ? `${adults} x ${priceAdult.toLocaleString('vi-VN')}  VNĐ` : `${adults} VNĐ`}
                        </span>
                    </div>
                    <div className="mb-20 mt-25 d-flex justify-content-between">
                        <span>Trẻ em:</span>
                        <span className="fw-bold">
                            {children > 0
                                ? `${children} x ${priceChild.toLocaleString('vi-VN')}  VNĐ`
                                : `${children} VNĐ`}
                        </span>
                    </div>
                    <div className="mb-15 mt-40 d-flex justify-content-between">
                        <h6 className="fw-bold text-danger">Tổng cộng:</h6>
                        <h6 className="fw-bold text-danger">{totalPrice.toLocaleString('vi-VN') + ' VNĐ'}</h6>
                    </div>
                </div>
                <button className={cx('btn', 'btn-lg', 'btn-confirm', 'style-two', 'w-100', 'mt-15', 'mb-5')} onClick={onConfirm}>
                    <span className={cx('btn-label')}>Xác nhận</span>
                </button>
            </div>
        </div>
    );
}

export default Sidebar;
