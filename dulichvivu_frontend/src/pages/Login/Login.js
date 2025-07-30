import classNames from 'classnames/bind';
import styles from './Login.module.scss';
import image_login from '~/assets/login/signin-image.jpg';
import { Link, useLocation, useNavigate } from 'react-router-dom';
import InputGroup from '~/components/InputGroup';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faEnvelope, faLock } from '@fortawesome/free-solid-svg-icons';
import { faFacebookF, faGoogle } from '@fortawesome/free-brands-svg-icons';
import { useEffect, useState } from 'react';
import Title from '~/components/Title';
import { login } from '~/services/loginService';
import Swal from 'sweetalert2';

const cx = classNames.bind(styles);

function Login() {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [errors, setErrors] = useState({});
    const navigate = useNavigate();
    const location = useLocation();

    useEffect(() => {
        const params = new URLSearchParams(location.search);
        if (params.get('verified') === 'true') {
            Swal.fire({
                title: 'Thành công!',
                text: 'Tài khoản của bạn đã được xác thực. Vui lòng đăng nhập.',
                icon: 'success',
                confirmButtonText: 'OK',
            });
        }
    }, [location]);

    const validate = () => {
        const newErrors = {};

        if (!email) {
            newErrors.email = 'Email không được để trống';
        } else if (!/\S+@\S+\.\S+/.test(email)) {
            newErrors.email = 'Email không hợp lệ';
        }

        if (!password) {
            newErrors.password = 'Mật khẩu không được để trống';
        } else if (password.length < 6) {
            newErrors.password = 'Mật khẩu phải ít nhất 6 ký tự';
        } else if (!/^[\x00-\x7F]*$/.test(password)) {
            newErrors.password = 'Mật khẩu không được chứa ký tự đặc biệt.';
        }

        setErrors(newErrors);

        return Object.keys(newErrors).length === 0;
    };

    const handleChangeEmail = (e) => {
        const value = e.target.value;

        setEmail(value);

        setErrors((prev) => ({ ...prev, email: undefined }));
    };

    const handleChangePassword = (e) => {
        const value = e.target.value;

        setPassword(value);

        setErrors((prev) => ({ ...prev, password: undefined }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        if (!validate()) return;

        try {
            const res = await login({
                email: email.trim(),
                password: password.trim(),
            });

            if (res.status === 200) {
                Swal.fire({
                    title: 'Thành công!',
                    text: res.data.message,
                    icon: 'success',
                    confirmButtonText: 'OK',
                });

                navigate('/');
            } else {
                Swal.fire({
                    title: 'Thất bại!',
                    text: res.data.message,
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
            <Title>Dulichvivu - Đăng nhập</Title>
            <div className={cx('main')}>
                <div className="container">
                    <div className={cx('row', 'wrapper')}>
                        <div className={cx('col-12 col-md-6', 'image-login')}>
                            <figure>
                                <img src={image_login} alt="" />
                            </figure>
                            <Link className={cx('link')} to="/signin">
                                Tạo tài khoản
                            </Link>
                        </div>
                        <div className={cx('col-12 col-md-6', 'form-login')}>
                            <h2>Đăng nhập</h2>
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
                            <button type="submit" onClick={handleSubmit} className={cx('btn-login')}>
                                Đăng nhập
                            </button>
                            <div className={cx('social')}>
                                <span className={cx('social-label')}>hoặc đăng nhập với</span>
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

export default Login;
