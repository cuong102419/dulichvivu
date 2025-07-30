import classNames from 'classnames/bind';
import styles from './Info.module.scss';

const cx = classNames.bind(styles);

function Info({ formData, setFormData }) {
    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData((prev) => ({ ...prev, [name]: value }));
    };

    return (
        <div>
            <div className="title">
                <h5 className="fw-bold">Thông Tin Liên Lạc</h5>
            </div>
            <div className={cx('content')}>
                <div className="row">
                    <div className="col-6">
                        <p className={cx('label')}>
                            Họ và tên<em className="text-danger ps-1">*</em>
                        </p>
                        <div>
                            <input
                                type="text"
                                className={cx('input-info')}
                                placeholder="Nhập Họ và tên"
                                name="fullname"
                                value={formData.fullname}
                                onChange={handleChange}
                            />
                        </div>
                    </div>
                    <div className="col-6">
                        <p className={cx('label')}>
                            Email<em className="text-danger ps-1">*</em>
                        </p>
                        <div>
                            <input
                                type="email"
                                className={cx('input-info')}
                                placeholder="sample@gmail.com"
                                name="email"
                                value={formData.email}
                                onChange={handleChange}
                            />
                        </div>
                    </div>
                </div>
                <div className="row pt-15">
                    <div className="col-6">
                        <p className={cx('label')}>
                            Số điện thoại<em className="text-danger ps-1">*</em>
                        </p>
                        <div>
                            <input
                                type="tel"
                                className={cx('input-info')}
                                pattern="[0-9]{10,11}"
                                placeholder="Nhập số điện thoại"
                                name="phone"
                                value={formData.phone}
                                onChange={handleChange}
                            />
                        </div>
                    </div>
                    <div className="col-6">
                        <p className={cx('label')}>
                            Địa chỉ<em className="text-danger ps-1">*</em>
                        </p>
                        <div>
                            <input
                                type="text"
                                className={cx('input-info')}
                                placeholder="Nhập địa chỉ liên hệ"
                                name="address"
                                value={formData.address}
                                onChange={handleChange}
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Info;
