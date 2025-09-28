import { Link } from 'react-router-dom';

function Header({ title, code }) {
    return (
        <section className="tour-header-area pt-70 rel z-1">
            <div className="container">
                <div className="row justify-content-between">
                    <div className="col-xl-8 col-lg-7">
                        <div className="tour-header-content mb-15">
                            <div className="section-title pb-5">
                                <h2>{title}</h2>
                                <h6>Mã tour: <strong>{code}</strong></h6>
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-4 col-lg-5 text-lg-end">
                        <div className="tour-header-social mb-10">
                            <Link to="#">
                                <i className="far fa-share-alt"></i>Chia sẻ
                            </Link>
                            <Link to="#">
                                <i className="fas fa-heart bgc-secondary"></i>Thêm vào yêu thích
                            </Link>
                        </div>
                    </div>
                </div>
                <hr className="mt-50 mb-70" />
            </div>
        </section>
    );
}

export default Header;
