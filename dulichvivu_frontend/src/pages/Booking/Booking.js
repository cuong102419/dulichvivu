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
import { postBooking } from '~/services/postBookingService';
import Swal from 'sweetalert2';

const cx = classNames.bind(styles);

function Booking() {
    const [searchParams] = useSearchParams();
    const [tour, setTour] = useState(null);
    const [departure, setDeparture] = useState(null);
    const code = searchParams.get('code');
    const date = searchParams.get('date');
    const [adults, setAdults] = useState(0);
    const [children, setChildren] = useState(0);
    const { user, isLoading, isLog } = useAuth();
    const navigate = useNavigate();
    const [note, setNote] = useState('');
    const [agree, setAgree] = useState(false);
    const [paymentMethod, setPaymentMethod] = useState('');
    const [isConfirmDisabled, setIsConfirmDisabled] = useState(true);
    const [isFetching, setIsFetching] = useState(true);
    const [formData, setFormData] = useState({
        fullname: '',
        email: '',
        phone: '',
        address: '',
    });

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
            } finally {
                setIsFetching(false);
            }
        };

        fetchTour();
    }, [code, date, isLog, isLoading, navigate]);

    useEffect(() => {
        const codeBooking = searchParams.get('code-booking');

        if (codeBooking != null) {
            Swal.fire({
                title: 'Thành công!',
                text: 'Đặt tour thành công.',
                icon: 'success',
                confirmButtonText: 'OK',
            });
        }

        if (codeBooking === 'error') {
            Swal.fire({
                title: 'Thất bại!',
                text: 'Đặt tour không thành công.',
                icon: 'error',
                confirmButtonText: 'OK',
            });
        }
    }, [searchParams]);

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

    const handleConfirm = async () => {
        if (adults + children > (departure?.capacity || 0)) {
            Swal.fire({
                title: 'Thông báo!',
                text: 'Tổng số người vượt quá số chỗ còn lại của chuyến đi.',
                icon: 'warning',
                confirmButtonText: 'OK',
            });
            return;
        }

        try {
            const res = await postBooking({
                fullname: formData.fullname,
                email: formData.email,
                phone: formData.phone,
                address: formData.address,
                tour_id: tour?.id,
                departure_id: departure?.id,
                user_id: user?.id,
                number_adults: adults,
                number_children: children,
                payment_method: paymentMethod,
                note: note,
                link: window.location.href,
            });

            if (res?.link) {
                window.location.href = res.link;
            }

            if (res?.status) {
                setFormData({
                    fullname: '',
                    email: '',
                    phone: '',
                    address: '',
                });
                setAdults(0);
                setChildren(0);
                setNote('');
                setAgree(false);
                setPaymentMethod('');
            }
        } catch (error) {
            console.error(error);
            Swal.fire({
                title: 'Thất bại!',
                text: error,
                icon: 'error',
                confirmButtonText: 'OK',
            });

            return null;
        }
    };

    if (isFetching || isLoading) {
        return (
            <>
                <div className="preloader">
                    <div className="custom-loader"></div>
                </div>
                <div className="mt-100 mb-100 text-center">Đang tải dữ liệu</div>
            </>
        );
    }

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
