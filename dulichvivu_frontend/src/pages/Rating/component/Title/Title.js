import classNames from "classnames/bind";
import styles from './Title.module.scss';

const cx = classNames.bind(styles);

function Title({ title }) {
    return (
        <section className={cx("page-banner-two", "rel", "z-1")}>
            <div className={cx("container-fluid")}>
                <hr className="mt-0" />
                <div className={cx("container")}>
                    <div className={cx("banner-inner", "pt-15", "pb-25")}>
                        <h2 className={cx("mb-10", 'title')}>{title}</h2>
                    </div>
                </div>
            </div>
        </section>
    );
}

export default Title;
