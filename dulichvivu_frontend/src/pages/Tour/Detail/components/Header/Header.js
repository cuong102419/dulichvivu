import { Link } from 'react-router-dom';
import useAuth from '~/hooks/useAuth';

const StarRating = ({ rating }) => {
    const numRating = Number(rating) || 0;
    const safeRating = Math.max(0, Math.min(numRating, 5));

    const fullStars = Math.floor(safeRating);
    const hasHalfStar = safeRating % 1 !== 0;
    const emptyStars = 5 - fullStars - (hasHalfStar ? 1 : 0);

    return (
        <div className="ratting">
            {[...Array(fullStars)].map((_, i) => (
                <i key={`full-${i}`} className="fas fa-star"></i>
            ))}
            {hasHalfStar && <i className="fas fa-star-half-alt"></i>}
            {[...Array(emptyStars)].map((_, i) => (
                <i key={`empty-${i}`} className="far fa-star"></i>
            ))}
        </div>
    );
};

function Header({ title, code, rate }) {
    const { user } = useAuth();
    const userId = user?.id || null;
    const displayRate = rate && rate > 0 ? rate : 5;

    return (
        <section className="tour-header-area pt-70 rel z-1">
            <div className="container">
                <div className="row justify-content-between">
                    <div className="col-xl-8 col-lg-7">
                        <div className="tour-header-content mb-15">
                            <div className="section-title pb-5">
                                <h2>{title}</h2>
                                <h6>
                                    Mã tour: <strong>{code}</strong>
                                </h6>
                            </div>
                            <StarRating rating={displayRate} />({displayRate})
                        </div>
                    </div>
                </div>
                <hr className="mt-50 mb-70" />
            </div>
        </section>
    );
}

export default Header;
