import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import { getRating, postReview } from '~/services/ratingService';
import { TitleBanner } from './component/Title';
import Gallery from './component/Gallery';
import Header from './component/Header';
import useAuth from '~/hooks/useAuth';
import Swal from 'sweetalert2';

function Rating() {
    const navigate = useNavigate();
    const [booking, setBooking] = useState(null);
    const [tour, setTour] = useState(null);
    const [images, setImages] = useState([]);
    const { code } = useParams();
    const [comment, setComment] = useState('');
    const [rating, setRating] = useState(0);
    const { user, isLog, isLoading } = useAuth();

    useEffect(() => {
        if (!isLoading && !isLog) {
            navigate('/login');
        }
    }, [isLoading, isLog, navigate]);

    useEffect(() => {
        if (isLoading || !user) return;
        const fetchRating = async () => {
            try {
                const data = await getRating(code);

                if (data.data.reviewed) {
                    navigate('/');
                    return;
                }
                setTour(data.data.tour);
                setImages(data.data.image_url);
                setBooking(data.data.booking);
            } catch (error) {
                console.error(error);
                navigate('/error');
            }
        };

        fetchRating();
    }, [code, user, isLoading, navigate]);

    const handleSubmit = async () => {
        try {
            const res = await postReview({
                booking_id: booking.id,
                tour_id: tour.id,
                user_id: user.id,
                rating: rating,
                comment: comment,
            });

            if (res && res.status === true) {
                Swal.fire({
                    title: 'Thành công!',
                    text: res.message,
                    icon: 'success',
                    confirmButtonText: 'OK',
                });

                navigate('/tour/' + tour.slug);
            }
        } catch (error) {
            console.log(error);
        }
    };

    return (
        <>
            <TitleBanner title={tour?.title} />

            <Gallery images={images} />

            <Header title={tour?.title} code={tour?.code} />

            <div id="comment-form" className="container comment-form bgc-lighter z-1 rel mt-30 mb-50">
                <div className="comment-review-wrap">
                    <div className="comment-ratting-item">
                        <span className="title">Chọn sao:</span>
                        <div className="ratting" style={{ cursor: 'pointer' }}>
                            {[1, 2, 3, 4, 5].map((star) => (
                                <i
                                    key={star}
                                    className={star <= rating ? 'fas fa-star' : 'far fa-star'}
                                    onClick={() => setRating(star)}
                                ></i>
                            ))}
                        </div>
                    </div>
                </div>

                <hr className="mt-30 mb-40" />
                <div className="row gap-20 mt-20">
                    <div className="col-md-12">
                        <div className="form-group">
                            <label htmlFor="message">Đánh giá</label>
                            <textarea
                                name="message"
                                id="message"
                                className="form-control"
                                rows="5"
                                value={comment}
                                onChange={(e) => setComment(e.target.value)}
                            ></textarea>
                        </div>
                    </div>
                    <div className="col-md-12">
                        <div className="form-group mb-0">
                            <button type="submit" onClick={handleSubmit} className="theme-btn bgc-secondary style-two">
                                <span data-hover="Gửi đánh giá">Gửi đánh giá</span>
                                <i className="fal fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}

export default Rating;
