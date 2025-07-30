import { Link } from 'react-router-dom';

function Review() {
    return (
        <>
            <h3>Clients Comments</h3>
            <div className="comments mt-30 mb-60">
                <div className="comment-body">
                    <div className="author-thumb">
                        <img src="/assets/images/blog/comment-author1.jpg" alt="Author" />
                    </div>
                    <div className="content">
                        <h6>Lonnie B. Horwitz</h6>
                        <div className="ratting">
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star-half-alt"></i>
                        </div>
                        <span className="time">Venice, Rome and Milan – 9 Days 8 Nights</span>
                        <p>
                            Tours and travels play a crucial role in enriching lives by offering unique experiences,
                            cultural exchanges, and the joy of exploration.
                        </p>
                        <Link className="read-more" to="#">
                            Reply <i className="far fa-angle-right"></i>
                        </Link>
                    </div>
                </div>
                <div className="comment-body comment-child">
                    <div className="author-thumb">
                        <img src="/assets/images/blog/comment-author2.jpg" alt="Author" />
                    </div>
                    <div className="content">
                        <h6>William G. Edwards</h6>
                        <div className="ratting">
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star-half-alt"></i>
                        </div>
                        <span className="time">Venice, Rome and Milan – 9 Days 8 Nights</span>
                        <p>
                            Tours and travels play a crucial role in enriching lives by offering unique experiences,
                            cultural exchanges, and the joy of exploration.
                        </p>
                        <Link className="read-more" to="#">
                            Reply <i className="far fa-angle-right"></i>
                        </Link>
                    </div>
                </div>
                <div className="comment-body">
                    <div className="author-thumb">
                        <img src="/assets/images/blog/comment-author3.jpg" alt="Author" />
                    </div>
                    <div className="content">
                        <h6>Jaime B. Wilson</h6>
                        <div className="ratting">
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star-half-alt"></i>
                        </div>
                        <span className="time">Venice, Rome and Milan – 9 Days 8 Nights</span>
                        <p>
                            Tours and travels play a crucial role in enriching lives by offering unique experiences,
                            cultural exchanges, and the joy of exploration.
                        </p>
                        <Link className="read-more" to="#">
                            Reply <i className="far fa-angle-right"></i>
                        </Link>
                    </div>
                </div>
            </div>

            <h3>Add Reviews</h3>
            <form
                id="comment-form"
                className="comment-form bgc-lighter z-1 rel mt-30"
                name="review-form"
                action="#"
                method="post"
            >
                <div className="comment-review-wrap">
                    <div className="comment-ratting-item">
                        <span className="title">Services</span>
                        <div className="ratting">
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    <div className="comment-ratting-item">
                        <span className="title">Guides</span>
                        <div className="ratting">
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    <div className="comment-ratting-item">
                        <span className="title">Price</span>
                        <div className="ratting">
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    <div className="comment-ratting-item">
                        <span className="title">Safety</span>
                        <div className="ratting">
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    <div className="comment-ratting-item">
                        <span className="title">Foods</span>
                        <div className="ratting">
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    <div className="comment-ratting-item">
                        <span className="title">Hotels</span>
                        <div className="ratting">
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star"></i>
                            <i className="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <hr className="mt-30 mb-40" />
                <h5>Leave Feedback</h5>
                <div className="row gap-20 mt-20">
                    <div className="col-md-6">
                        <div className="form-group">
                            <label htmlFor="full-name">Name</label>
                            <input type="text" id="full-name" name="full-name" className="form-control" required="" />
                        </div>
                    </div>
                    <div className="col-md-6">
                        <div className="form-group">
                            <label htmlFor="phone">Phone</label>
                            <input type="text" id="phone" name="phone" className="form-control" required="" />
                        </div>
                    </div>
                    <div className="col-md-12">
                        <div className="form-group">
                            <label htmlFor="email-address">Email</label>
                            <input type="email" id="email-address" name="email" className="form-control" required="" />
                        </div>
                    </div>
                    <div className="col-md-12">
                        <div className="form-group">
                            <label htmlFor="message">Comments</label>
                            <textarea
                                name="message"
                                id="message"
                                className="form-control"
                                rows="5"
                                required=""
                            ></textarea>
                        </div>
                    </div>
                    <div className="col-md-12">
                        <div className="form-group mb-0">
                            <button type="submit" className="theme-btn bgc-secondary style-two">
                                <span data-hover="Submit reviews">Submit reviews</span>
                                <i className="fal fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </>
    );
}

export default Review;
