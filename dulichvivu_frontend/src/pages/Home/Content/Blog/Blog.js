import { Link } from 'react-router-dom';
import classNames from 'classnames/bind';
import styles from './Blog.module.scss';

const cx = classNames.bind(styles);

function Blog() {
    return (
        <section className="blog-area py-70 rel z-1">
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-lg-12">
                        <div className="section-title text-center counter-text-wrap mb-70">
                            <h2>Tin tức</h2>
                        </div>
                    </div>
                </div>
                <div className="row justify-content-center">
                    <div className="col-xl-4 col-md-6">
                        <div className={cx('blog-item', 'blog')} >
                            <div className="content">
                                <h5>
                                    <Link to="#">
                                        Hướng dẫn cơ bản để lên kế hoạch cho kỳ nghỉ mơ ước của bạn với Dulichvivu
                                    </Link>
                                </h5>
                                <ul className="blog-meta">
                                    <li>
                                        <i className="far fa-calendar-alt"></i> <Link to="#">25/02/2024</Link>
                                    </li>
                                </ul>
                            </div>
                            <div className="image">
                                <img src="assets/images/blog/blog1.jpg" alt="Blog" />
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-4 col-md-6">
                        <div className={cx('blog-item', 'blog')} >
                            <div className="content">
                                <h5>
                                    <Link to="#">
                                        Cuộc phiêu lưu khó quên Trải nghiệm danh sách nhóm
                                    </Link>
                                </h5>
                                <ul className="blog-meta">
                                    <li>
                                        <i className="far fa-calendar-alt"></i> <Link to="#">25/02/2024</Link>
                                    </li>
                                </ul>
                            </div>
                            <div className="image">
                                <img src="assets/images/blog/blog2.jpg" alt="Blog" />
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-4 col-md-6">
                        <div className={cx('blog-item', 'blog')} >
                            <div className="content">
                                <h5>
                                    <Link to="#">
                                       Khám phá văn hóa và cách thức ẩm thực tốt nhất của mỗi địa điểm
                                    </Link>
                                </h5>
                                <ul className="blog-meta">
                                    <li>
                                        <i className="far fa-calendar-alt"></i> <Link to="#">25/02/2024</Link>
                                    </li>
                                </ul>
                            </div>
                            <div className="image">
                                <img src="assets/images/blog/blog3.jpg" alt="Blog" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
}

export default Blog;
