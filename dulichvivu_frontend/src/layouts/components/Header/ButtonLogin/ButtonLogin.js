import { Link } from 'react-router-dom';
import classNames from 'classnames/bind';
import Tippy from '@tippyjs/react/headless';

import styles from './ButtonLogin.module.scss';
import useAuth from '~/hooks/useAuth';
import avatar from '~/assets/images/tho/tho_13.png';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faHeart, faMap, faUser } from '@fortawesome/free-regular-svg-icons';
import { faRightFromBracket } from '@fortawesome/free-solid-svg-icons';
import { logout } from '~/services/logoutService';
import Swal from 'sweetalert2';

const cx = classNames.bind(styles);

function ButtonLogin() {
    const { user, isLog, isLoading } = useAuth();

    if (isLoading) {
        return <div></div>;
    }

    const handleLogout = async () => {
        const success = await logout();

        if (success) {
            Swal.fire({
                title: 'Thành công!',
                text: null,
                icon: 'success',
                confirmButtonText: 'OK',
            });

        }
    };

    return (
        <div className={cx('btn-group', 'd-none', 'd-lg-block')}>
            {isLog ? (
                <Tippy
                    trigger="click"
                    interactive
                    render={(attrs) => (
                        <div className={cx('menu-dropdown')} tabIndex="-1" {...attrs}>
                            <ul>
                                <Link to="/profile" className={cx('user')}>
                                    <div className={cx('avatar-tippy')}>
                                        <div className={cx('avatar-box')}>
                                            <img src={user.avatar ? user.avatar_url : avatar} alt="avatar" />
                                        </div>
                                        <div className={cx('info')}>
                                            <span className={cx('name')}>{user.name}</span>
                                            <div className={cx('email')}>{user.email}</div>
                                        </div>
                                    </div>
                                </Link>
                                <br />
                                <li>
                                    <Link to="/profile" className={cx('link-item')}>
                                        <span>
                                            <FontAwesomeIcon className={cx('icon')} icon={faUser} /> Trang cá nhân
                                        </span>
                                    </Link>
                                </li>
                                <li>
                                    <Link className={cx('link-item')} to="/tours-history">
                                        <span>
                                            <FontAwesomeIcon className={cx('icon')} icon={faMap} /> Tour đã đặt
                                        </span>
                                    </Link>
                                </li>
                                <li>
                                    <Link to='/tour-favorite' className={cx('link-item')}>
                                        <span>
                                            <FontAwesomeIcon className={cx('icon')} icon={faHeart} /> Tour yêu thích
                                        </span>
                                    </Link>
                                </li>
                                <li>
                                    <button onClick={handleLogout} className={cx('btn-logout')}>
                                        <span>
                                            <FontAwesomeIcon className={cx('icon')} icon={faRightFromBracket} /> Đăng
                                            xuất
                                        </span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    )}
                >
                    <div className={cx('wrapper-avatar')}>
                        <span>
                            Xin chào: <strong>{user.name}</strong>
                        </span>
                        <div>
                            <img className={cx('avatar')} src={user.avatar ? user.avatar_url : avatar} alt="avatar" />
                        </div>
                    </div>
                </Tippy>
            ) : (
                <>
                    <Link to="/signin" className={cx('theme-btn', 'style-three', 'btn-register', 'shadow')}>
                        <span data-hover="Đăng ký">Đăng ký</span>
                    </Link>
                    <Link to="/login" className={cx('theme-btn', 'bgc-secondary', 'btn-login', 'shadow')}>
                        <span data-hover="Đăng nhập">Đăng nhập</span>
                    </Link>
                </>
            )}
        </div>
    );
}

export default ButtonLogin;
