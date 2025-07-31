import classNames from 'classnames/bind';
import Title from '~/components/Title';
import Info from './components/Info';
import Sidebar from './components/Sidebar';
import { Link, useNavigate, useSearchParams } from 'react-router-dom';
import { useEffect, useState } from 'react';
import GuestSelector from './components/GuestSelector';
import { getBooking } from '~/services/getBookingService';
import Note from './components/Note';
import PaymentOptions from './components/PaymentOptions';
import useAuth from '~/hooks/useAuth';
import styles from './Booking.module.scss';

const cx = classNames.bind(styles);

function Booking() {
    const [searchParams] = useSearchParams();
    const [tour, setTour] = useState(null);
    const [departure, setDeparture] = useState(null);
    const code = searchParams.get('code');
    const date = searchParams.get('date');
    const [adults, setAdults] = useState(0);
    const [children, setChildren] = useState(0);
    const { isLoading, isLog } = useAuth();
    const navigate = useNavigate();
    const [formData, setFormData] = useState({
        fullname: '',
        email: '',
        phone: '',
        address: '',
    });
    const [note, setNote] = useState('');
    const [agree, setAgree] = useState(false);
    const [paymentMethod, setPaymentMethod] = useState('');
    const [isConfirmDisabled, setIsConfirmDisabled] = useState(true);

    const validateEmail = (email) => {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    };

    const validatePhone = (phone) => {
        return /^(0\d{9,10}|(\+84)\d{9,10})$/.test(phone.replace(/\s+/g, ''));
    };

    const validate = () => {
        return (
            formData.fullname.trim() &&
            validateEmail(formData.email) &&
            validatePhone(formData.phone) &&
            adults > 0 &&
            agree &&
            paymentMethod
        );
    };

    useEffect(() => {
        setIsConfirmDisabled(!validate());
    }, [formData, adults, children, agree, paymentMethod]);

    const handleGuestChange = (type, value) => {
        if (type === 'adults') setAdults(value);
        if (type === 'children') setChildren(value);
    };

    const handleConfirm = () => {
        console.log(formData, paymentMethod, tour?.id, departure?.id, adults, children, note, agree);
    };

    useEffect(() => {
        if (isLoading) return;

        if (!code || !date) {
            navigate('/');
            return;
        }

        if (!isLog) {
            navigate('/login');
            return;
        }

        const fetchTour = async () => {
            try {
                const data = await getBooking(code, date);
                setTour(data.data.tour);
                setDeparture(data.data.departure);
            } catch (error) {
                console.error(error);
                navigate('/error');
            }
        };

        fetchTour();
    }, [code, date, isLog, isLoading, navigate]);

    return (
        <>
            <Title>Dulichvivu | Tổng quan chuyến đi</Title>

            <section className="page-banner-two relz-1">
                <div className="container-fluid">
                    <hr className="mt-0" />
                    <div className="container">
                        <div className="banner-inner pt-15 pb-25">
                            <h2 className="mb-10 title fw-bold text-capitalize">Tổng quan về chuyến đi</h2>
                        </div>
                    </div>
                </div>
            </section>

            <section className="tour-details-page pb-100">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-8">
                            <Info formData={formData} setFormData={setFormData} />

                            <GuestSelector adults={adults} children={children} onGuestChange={handleGuestChange} />

                            <Note note={note} setNote={setNote} />

                            <div className="mt-40">
                                <div className={cx('content')}>
                                    <p>
                                        Bằng cách nhấp chuột vào nút "ĐỒNG Ý" dưới đây, Khách hàng đồng ý rằng các Điều
                                        kiện điều khoản này sẽ được áp dụng. Vui lòng đọc kỹ Điều kiện điều khoản trước
                                        khi lựa chọn sử dụng dịch vụ của Dulichvivu.
                                    </p>
                                    <div>
                                        <label htmlFor="agree" className={cx('checkbox-wrapper')}>
                                            <input
                                                type="checkbox"
                                                name="agree"
                                                checked={agree}
                                                onChange={() => setAgree((prev) => !prev)}
                                                className={cx('checkbox')}
                                                id="agree"
                                            />
                                            <div className={cx('clause')}>
                                                Tôi đã đọc và đồng ý với <br className="sp" />
                                                <Link
                                                    className={cx('link-clause')}
                                                    to="https://www.luavietours.com/assets/pdf/dieu_khoan_chung.pdf"
                                                    target="blank"
                                                    rel="noopener noreferrer"
                                                >
                                                    Điều khoản thanh toán
                                                </Link>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <PaymentOptions paymentMethod={paymentMethod} setPaymentMethod={setPaymentMethod} />
                        </div>
                        <div className="col-lg-4 col-md-8 col-sm-10 rmt-75">
                            <Sidebar
                                tour={tour}
                                departure={departure}
                                adults={adults}
                                children={children}
                                onConfirm={handleConfirm}
                                disabled={isConfirmDisabled}
                            />
                        </div>
                    </div>
                </div>
            </section>
        </>
    );
}

export default Booking;
