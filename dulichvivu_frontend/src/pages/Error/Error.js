import Title from "~/components/Title";

function Error() {
    return (
        <>
            <Title>
                Lỗi - 404 not found
            </Title>
            <section className="error-area pt-70 pb-100 rel z-1">
                <div className="container">
                    <div className="row align-items-center justify-content-between">
                        <div className="col-xl-5 col-lg-6">
                            <div className="error-content rmb-55">
                                <h1>OPPS! </h1>
                                <div className="section-title mt-15 mb-25">
                                    <h2>This Page Can’t be Found</h2>
                                </div>
                                <p>
                                    Best features to include on business landing page are those that quickly convey your
                                    value proposition, build trust, and encourage action. Here are six essential features
                                </p>
                                <form className="newsletter-form mt-40 mb-50" action="#">
                                    <input id="news-email" type="text" placeholder="Search keyword" required />
                                    <button type="submit" className="theme-btn bgc-secondary style-two">
                                        <span data-hover="Search">Search</span>
                                        <i className="fal fa-arrow-right"></i>
                                    </button>
                                </form>
                                <div className="keywords">
                                    <a href="blog.html">Travel</a>
                                    <a href="blog.html">Luxury Hotel</a>
                                    <a href="blog.html">Indonesia</a>
                                    <a href="blog.html">Sea Beach</a>
                                    <a href="blog.html">Camping</a>
                                    <a href="blog.html">Hiking</a>
                                    <a href="blog.html">Fishing</a>
                                </div>
                            </div>
                        </div>
                        <div className="col-xl-5 col-lg-6">
                            <div className="error-images">
                                <img src="/assets/images/newsletter/404.png" alt="404 Error" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </>
    );
}

export default Error;
