import classNames from 'classnames/bind';
import Header from '../components/Header';
import styles from './DefaultLayout.module.scss';
import Footer from '../components/Footer';

const cx = classNames.bind(styles);

function DefaultLayout({ children }) {
    return (
        <>
            <div className="preloader">
                <div className="custom-loader"></div>
            </div>
            
            <Header />
            <div className={cx('wrapper')}>{children}</div>
            <Footer />
        </>
    );
}

export default DefaultLayout;
