import classNames from 'classnames/bind';
import styles from './PaymentOptions.module.scss';

const cx = classNames.bind(styles);

function PaymentOptions({ paymentMethod, setPaymentMethod }) {
    return (
        <div className="mt-40">
            <div className="title mb-20">
                <h5 className="fw-bold">Phương Thức Thanh Toán</h5>
            </div>
            <div className="content">
                <ul className="radio-filter">
                    <li className={cx('item')}>
                        <input
                            className={cx('form-check-input', 'radio')}
                            type="radio"
                            value="office"
                            name="ByActivities"
                            id="activity3"
                            checked={paymentMethod === 'office'}
                            onChange={(e) => setPaymentMethod(e.target.value)}
                        />
                        <label className={cx('payment-label')} htmlFor="activity3">
                            <div>
                                <img src="/assets/images/logos/favicon.png" width="30px" alt="" />
                            </div>
                            Thanh toán tại văn phòng
                        </label>
                    </li>
                    <li className={cx('item')}>
                        <input
                            className={cx('form-check-input', 'radio')}
                            type="radio"
                            value="paypal"
                            name="ByActivities"
                            id="activity1"
                            checked={paymentMethod === 'paypal'}
                            onChange={(e) => setPaymentMethod(e.target.value)}
                        />
                        <label className={cx('payment-label')} htmlFor="activity1">
                            <div>
                                <img className={cx('img')} src="/assets/images/payment/paypal.png" alt="" />
                            </div>
                            Thanh toán qua Paypal
                        </label>
                    </li>
                    <li className={cx('item')}>
                        <input
                            className={cx('form-check-input', 'radio')}
                            type="radio"
                            value="momo"
                            name="ByActivities"
                            id="activity2"
                            checked={paymentMethod === 'momo'}
                            onChange={(e) => setPaymentMethod(e.target.value)}
                        />
                        <label className={cx('payment-label')} htmlFor="activity2">
                            <div>
                                <img className={cx('img-momo')} src="/assets/images/payment/momo.png" alt="" />
                            </div>
                            Thanh toán qua Momo
                        </label>
                    </li>
                </ul>
            </div>
        </div>
    );
}

export default PaymentOptions;
