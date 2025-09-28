import classNames from "classnames/bind";
import styles from './Gallery.module.scss';

const cx = classNames.bind(styles);

function Gallery({ images }) {
    return (
        <div className="tour-gallery">
            <div className="container-fluid">
                <div className="row gap-10 justify-content-center rel">
                    <div className="col-lg-6 col-md-6">
                        <div className="gallery-item">
                            <img className={cx('thumbnail')} src={`${images[0]} ?? /assets/images/destinations/destination-details2.jpg`} alt="Destination" />
                        </div>
                    </div>
                    <div className="col-lg-3 col-md-6">
                        <div className="gallery-item">
                            <img className={cx('image-center')} src={`${images[1]} ?? /assets/images/destinations/destination-details2.jpg`} alt="Destination" />
                        </div>
                        <div className="gallery-item">
                            <img className={cx('image-center')} src={`${images[2]} ?? /assets/images/destinations/destination-details2.jpg`} alt="Destination" />
                        </div>
                    </div>
                    <div className="col-lg-3 col-md-6">
                        <div className="gallery-item">
                            <img className={cx('image-right')} src={`${images[3]} ?? /assets/images/destinations/destination-details2.jpg`} alt="Destination" />
                        </div>
                        <div className="gallery-item">
                            <img className={cx('image-right')} src={`${images[4]} ?? /assets/images/destinations/destination-details2.jpg`} alt="Destination" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Gallery;
