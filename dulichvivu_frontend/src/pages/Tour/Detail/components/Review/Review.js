import { useEffect, useState } from 'react';
import { getListReview } from '~/services/ratingService';

function Review({ tourId }) {
    const [reviews, setReviews] = useState([]);

    useEffect(() => {
        const fetchReviews = async () => {
            try {
                const res = await getListReview(tourId);

                console.log(res.data);
                setReviews(res.data);
            } catch (error) {
                console.error(error);
                return;
            }
        };

        fetchReviews();
    }, [tourId]);

    console.log(reviews);
    

    return (
        <>
            <h3>Đánh giá của khách hàng</h3>
            <div className="comments mt-30 mb-60">
                {reviews.length > 0 ? (
                    reviews.map((review) => (
                        <div key={review.id} className="comment-body">
                            <div className="author-thumb">
                                <img src={review.user.avatar ? review.user.avatar_url : '/assets/images/features/user-rate.png'} alt="Author" />
                            </div>
                            <div className="content">
                                <h6>{review.user.name}</h6>
                                <div className="ratting">
                                    {[...Array(5)].map((_, i) => (
                                        <i key={i} className={i < review.rating ? 'fas fa-star' : 'far fa-star'} />
                                    ))}
                                </div>
                                <p>{review.comment}</p>
                            </div>
                        </div>
                    ))
                ) : (
                    <div className="comment-body">
                        <p>Chưa có đánh giá nào</p>
                    </div>
                )}
            </div>
        </>
    );
}

export default Review;
