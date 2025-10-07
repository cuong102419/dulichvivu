import { Link } from 'react-router-dom';
import classNames from 'classnames/bind';
import MobileMenu from '../MobileMenu';
import styles from './MainMenu.module.scss';
import avatar from '~/assets/images/tho/tho_12.png';
import useAuth from '~/hooks/useAuth';
import Tippy from '@tippyjs/react/headless';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faRightFromBracket, faUser } from '@fortawesome/free-solid-svg-icons';
import { faHeart, faMap } from '@fortawesome/free-regular-svg-icons';
import { logout } from '~/services/logoutService';
import Swal from 'sweetalert2';

const cx = classNames.bind(styles);

function MainMenu() {
    const { user, isLog } = useAuth();

    const handleLogout = async () => {
        const success = await logout();

        if (success) {
            Swal.fire({
                title: 'Thành công!',
                icon: 'success',
                confirmButtonText: 'OK',
            });
        }
    };

    return (
        <div className="nav-outer mx-lg-auto ps-xxl-5 clearfix">
            <nav className="main-menu navbar-expand-lg">
                <MobileMenu />

                <div className="navbar-collapse collapse clearfix">
                    <ul className="navigation clearfix">
                        <li className="active">
                            <Link to="/tour">Tour</Link>
                        </li>
                        <li className="active">
                            <Link to="/about">Giới thiệu</Link>
                        </li>
                        <li className="active">
                            <Link to="/contact">Liên hệ</Link>
                        </li>
                        <li className="active">
                            <Link to="/help">Trợ giúp</Link>
                        </li>

                        {isLog ? (
                            <Tippy
                                trigger="click"
                                interactive
                                appendTo={document.body}
                                offset={[20, 0]}
                                placement="bottom-start"
                                render={(attrs) => (
                                    <div className={cx('menu-dropdown')} tabIndex="-1" {...attrs}>
                                        <ul>
                                            <Link   className={cx('user')}>
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
                                                        <FontAwesomeIcon className={cx('icon')} icon={faUser} /> Trang
                                                        cá nhân
                                                    </span>
                                                </Link>
                                            </li>
                                            <li>
                                                <Link to='/tours-history' className={cx('link-item')}>
                                                    <span>
                                                        <FontAwesomeIcon className={cx('icon')} icon={faMap} /> Tour đã
                                                        đặt
                                                    </span>
                                                </Link>
                                            </li>
                                            <li>
                                                <Link to='/tour-favorite' className={cx('link-item')}>
                                                    <span>
                                                        <FontAwesomeIcon className={cx('icon')} icon={faHeart} /> Tour
                                                        yêu thích
                                                    </span>
                                                </Link>
                                            </li>
                                            <li>
                                                <button onClick={handleLogout} className={cx('btn-logout')}>
                                                    <span>
                                                        <FontAwesomeIcon
                                                            className={cx('icon')}
                                                            icon={faRightFromBracket}
                                                        />{' '}
                                                        Đăng xuất
                                                    </span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                )}
                            >
                                <div>
                                    <li className="d-lg-none">
                                        <Link to="/profile">
                                            Xin chào <strong>{user.name}</strong>
                                            <img className={cx('avatar')} src={user.avatar ? user.avatar_url : avatar} alt="avatar" />
                                        </Link>
                                    </li>
                                </div>
                            </Tippy>
                        ) : (
                            <div className="d-lg-none mt-3 px-3 d-flex justify-content-around">
                                <Link to="/signin" className="theme-btn style-three btn-mobile">
                                    <span data-hover="Đăng ký">Đăng ký</span>
                                </Link>
                                <Link to="/login" className="theme-btn bgc-secondary btn-mobile">
                                    <span data-hover="Đăng nhập">Đăng nhập</span>
                                </Link>
                            </div>
                        )}
                    </ul>
                </div>
            </nav>
        </div>
    );
}

export default MainMenu;
