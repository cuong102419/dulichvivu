import { useState } from 'react';
import Swal from 'sweetalert2';
import { Link, useNavigate } from 'react-router-dom';
import classNames from 'classnames/bind';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faEnvelope, faLock, faUser } from '@fortawesome/free-solid-svg-icons';
import { faFacebookF, faGoogle } from '@fortawesome/free-brands-svg-icons';

import styles from './Register.module.scss';
import InputGroup from '~/components/InputGroup';
import Title from '~/components/Title';
import { register } from '~/services/registerService';
import usePublicIP from '~/hooks/usePublicIP';
import image_signup from '~/assets/login/signup-image.jpg';
import checkEmail from '~/services/checkEmailService';

const cx = classNames.bind(styles);

function Register() {
    const [fullname, setFullname] = useState('');
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [confirmPassword, setConfirmPassword] = useState('');
    const [errors, setErrors] = useState({});
    const navigate = useNavigate();
    const ip = usePublicIP();

    const validate = async () => {
        const newErrors = {};

        if (!fullname) {
            newErrors.fullname = 'Họ và tên không được để trống.';
        } else if (!/^[^\s][a-zA-ZÀ-ỹà-ỹ\s]*$/.test(fullname)) {
            newErrors.fullname = 'Họ và tên không được chứa kí tự đặc biệt.';
        }

        if (!email) {
            newErrors.email = 'Email không được để trống.';
        } else if (!/\S+@\S+\.\S+/.test(email)) {
            newErrors.email = 'Email không hợp lệ';
        }

        if (!password) {
            newErrors.password = 'Mật khẩu không được để trống.';
        } else if (password.length < 6) {
            newErrors.password = 'Mật khẩu phải ít nhất 6 ký tự';
        } else if (!/^[\x21-\x7E]*$/.test(password)) {
            newErrors.password = 'Mật khẩu không được chứa khoảng cách.';
        } else {
            const exists = await checkEmail(email);
            if (exists) {
                newErrors.email = 'Email đã được sử dụng.';
            }
        }

        if (confirmPassword.trim() !== password.trim()) {
            newErrors.confirmPassword = 'Mật khẩu không khớp.';
        }

        setErrors(newErrors);

        return Object.keys(newErrors).length === 0;
    };

    const handleChangeFullname = (e) => {
        const value = e.target.value;

        setFullname(value);
        setErrors((prev) => ({ ...(prev.fullname = undefined) }));
    };

    const handleChangeEmail = (e) => {
        const value = e.target.value;

        setEmail(value);
        setErrors((prev) => ({ ...(prev.email = undefined) }));
    };

    const handleChangePassword = (e) => {
        const value = e.target.value;

        setPassword(value);
        setErrors((prev) => ({ ...(prev.password = undefined) }));
    };

    const handleConfirmPassword = (e) => {
        const value = e.target.value;

        setConfirmPassword(value);
        setErrors((prev) => ({ ...(prev.confirmPassword = undefined) }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        const isValid = await validate();
        if (!isValid) return;

        if (!validate()) return;

        try {
            const res = await register({
                name: fullname,
                email: email.trim(),
                password: password.trim(),
                ip_address: ip,
            });

            if (res?.status) {
                Swal.fire({
                    title: 'Thành công!',
                    text: res.message,
                    icon: 'success',
                    confirmButtonText: 'OK',
                });

                navigate('/login');
            } else {
                Swal.fire({
                    title: 'Thất bại!',
                    text: res.message,
                    icon: 'error',
                    confirmButtonText: 'OK',
                });
            }
        } catch (error) {
            Swal.fire({
                title: 'Thất bại!',
                text: error,
                icon: 'error',
                confirmButtonText: 'OK',
            });
        }
    };

    return (
        <form>
            <Title>Dulichvivu - Đăng ký</Title>
            <div className={cx('main')}>
                <div className="container">
                    <div className={cx('row', 'wrapper')}>
                        <div className={cx('col-12 col-md-6', 'image-signup')}>
                            <figure>
                                <img src={image_signup} alt="" />
                            </figure>
                            <span>Bạn đã có tài khoản?</span>
                            <Link className={cx('link')} to="/login">
                                Đăng nhập ngay
                            </Link>
                        </div>
                        <div className={cx('col-12 col-md-6', 'form-signup')}>
                            <h2>Đăng ký</h2>
                            <div className={cx('wrapper-input')}>
                                <InputGroup
                                    type="text"
                                    value={fullname}
                                    placeholder="Họ tên"
                                    icon={<FontAwesomeIcon icon={faUser} />}
                                    id="fullname"
                                    onChange={handleChangeFullname}
                                />
                                {errors.fullname && <span className={cx('error')}>{errors.fullname}</span>}
                            </div>
                            <div className={cx('wrapper-input')}>
                                <InputGroup
                                    type="email"
                                    value={email}
                                    placeholder="Email"
                                    icon={<FontAwesomeIcon icon={faEnvelope} />}
                                    id="email"
                                    onChange={handleChangeEmail}
                                />
                                {errors.email && <span className={cx('error')}>{errors.email}</span>}
                            </div>

                            <div className={cx('wrapper-input')}>
                                <InputGroup
                                    type="password"
                                    value={password}
                                    placeholder="Mật khẩu"
                                    icon={<FontAwesomeIcon icon={faLock} />}
                                    id="password"
                                    onChange={handleChangePassword}
                                />

                                {errors.password && <span className={cx('error')}>{errors.password}</span>}
                            </div>
                            <div className={cx('wrapper-input')}>
                                <InputGroup
                                    type="password"
                                    value={confirmPassword}
                                    placeholder="Nhập lại mật khẩu"
                                    icon={<FontAwesomeIcon icon={faLock} />}
                                    id="confirm-password"
                                    onChange={handleConfirmPassword}
                                />

                                {errors.confirmPassword && (
                                    <span className={cx('error')}>{errors.confirmPassword}</span>
                                )}
                            </div>
                            <button type="submit" className={cx('btn-signup')} onClick={handleSubmit}>
                                Đăng ký
                            </button>
                            <div className={cx('social')}>
                                <span className={cx('social-label')}>hoặc đăng ký với</span>
                                <ul className={cx('social-list')}>
                                    <li className={cx('social-google')}>
                                        <Link className={cx('btn-link')}>
                                            <FontAwesomeIcon className={cx('icon-google')} icon={faGoogle} />
                                        </Link>
                                    </li>
                                    <li className={cx('social-facebook')}>
                                        <Link className={cx('btn-link')}>
                                            <FontAwesomeIcon className={cx('icon-facebook')} icon={faFacebookF} />
                                        </Link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    );
}

export default Register;
