import classNames from 'classnames/bind';
import styles from './Profile.module.scss';
import useAuth from '~/hooks/useAuth';
import { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { updateUser } from '~/services/getUserService';
import Swal from 'sweetalert2';
import Title from '~/components/Title';

const cx = classNames.bind(styles);

function Profile() {
    const { user, isLoading, isLog } = useAuth();
    const navigate = useNavigate();
    const [name, setName] = useState('');
    const [address, setAddress] = useState('');
    const [phoneNumber, setPhoneNumber] = useState('');
    const [avatar, setAvatar] = useState(null);

    console.log(user);

    useEffect(() => {
        if (user) {
            setName(user.name || '');
            setAddress(user.address || '');
            setPhoneNumber(user.phone_number || '');
        }
    }, [user]);

    useEffect(() => {
        if (isLoading) return;

        if (!isLog) {
            navigate('/login');
            return;
        }
    }, [isLog, isLoading, navigate]);

    const handleFileChange = (e) => {
        setAvatar(e.target.files[0]);
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        const formData = new FormData();
        formData.append('name', name);
        formData.append('address', address);
        formData.append('phone_number', phoneNumber);

        if (avatar) {
            formData.append('avatar', avatar);
        }

        try {
            const res = await updateUser(user.id, formData);
            if (res) {
                Swal.fire({
                    title: 'Thành công!',
                    text: 'Cập nhật thông tin thành công.',
                    icon: 'success',
                    confirmButtonText: 'OK',
                });
            }
        } catch (error) {
            console.error(error);
            Swal.fire({
                title: 'Lỗi!',
                text: 'Cập nhật thông tin thất bại. Vui lòng thử lại.',
                icon: 'error',
                confirmButtonText: 'OK',
            });
        }
    };

    return (
        <>
            <Title>Dulichvivu - Trang cá nhân</Title>

            <div className={cx('container', 'd-flex', 'justify-content-center', 'mb-100', ' ')}>
                <div className={cx('profile', 'mt-50', 'mb-50')}>
                    <div className={cx('avatar-section')}>
                        <div className={cx('avatar')}>
                            <img
                                src={user?.avatar ? user?.avatar_url : '/assets/images/features/user-rate.png'}
                                alt="Avatar"
                            />
                        </div>
                        <p className={cx('note')}>JPG hoặc PNG không lớn hơn 5 MB</p>
                        <input
                            type="file"
                            id="avatar"
                            style={{ display: 'none' }}
                            accept="image/*"
                            onChange={handleFileChange}
                        />
                        <label htmlFor="avatar" className={cx('btn', 'upload')}>
                            Tải ảnh lên
                        </label>
                        {/* <button className={cx('btn', 'password')}>Đổi mật khẩu</button> */}
                    </div>

                    <div className={cx('info-section')}>
                        <h3>Thông tin tài khoản</h3>
                        <form>
                            <label>Email</label>
                            <input type="email" placeholder="Email" value={user?.email || ''} disabled />

                            <label>Họ và tên</label>
                            <input
                                type="text"
                                value={name || ''}
                                onChange={(e) => setName(e.target.value)}
                                placeholder="Họ và tên"
                            />

                            <label>Địa chỉ</label>
                            <input
                                type="text"
                                placeholder="Địa chỉ"
                                value={address || ''}
                                onChange={(e) => setAddress(e.target.value)}
                            />

                            <label>Phone number</label>
                            <input
                                type="text"
                                placeholder="Số điện thoại"
                                value={phoneNumber || ''}
                                onChange={(e) => setPhoneNumber(e.target.value)}
                            />

                            <button type="submit" onClick={handleSubmit} className={cx('btn', 'save')}>
                                Lưu thông tin
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </>
    );
}

export default Profile;
