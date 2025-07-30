import Banner from '~/components/Banner';

function Destination() {
    return (
        <>
            <Banner title="Điểm đến" />

            <section className="popular-destinations-area pt-100 pb-90 rel z-1">
                <div className="container">
                    <div className="row justify-content-center">
                        <div className="col-lg-12">
                            <div className="section-title text-center counter-text-wrap mb-40">
                                <h2>Explore Popular Destinations</h2>
                                <p>
                                    One site <span className="count-text plus">34500</span> most popular experience
                                </p>
                                <ul className="destinations-nav mt-30">
                                    <li data-filter="*" className="active">
                                        Show All
                                    </li>
                                    <li data-filter=".features">Features</li>
                                    <li data-filter=".recent">Recent</li>
                                    <li data-filter=".city">City</li>
                                    <li data-filter=".rating">Rating</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div className="container">
                        <div className="row gap-10 destinations-active justify-content-center">
                            <div className="col-xl-3 col-md-6 item recent rating">
                                <div className="destination-item style-two">
                                    <div className="image">
                                        <a href="#" className="heart">
                                            <i className="fas fa-heart"></i>
                                        </a>
                                        <img src="/assets/images/destinations/destination1.jpg" alt="Destination" />
                                    </div>
                                    <div className="content">
                                        <h6>
                                            <a href="destination-details.html">Thailand beach</a>
                                        </h6>
                                        <span className="time">5352+ tours & 856+ Activity</span>
                                        <a href="#" className="more">
                                            <i className="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div className="col-xl-3 col-md-6 item features">
                                <div className="destination-item style-two">
                                    <div className="image">
                                        <a href="#" className="heart">
                                            <i className="fas fa-heart"></i>
                                        </a>
                                        <img src="/assets/images/destinations/destination2.jpg" alt="Destination" />
                                    </div>
                                    <div className="content">
                                        <h6>
                                            <a href="destination-details.html">Parga, Greece</a>
                                        </h6>
                                        <span className="time">5352+ tours & 856+ Activity</span>
                                        <a href="#" className="more">
                                            <i className="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div className="col-xl-3 col-md-6 item features">
                                <div className="destination-item style-two">
                                    <div className="image">
                                        <a href="#" className="heart">
                                            <i className="fas fa-heart"></i>
                                        </a>
                                        <img src="/assets/images/destinations/destination4.jpg" alt="Destination" />
                                    </div>
                                    <div className="content">
                                        <h6>
                                            <a href="destination-details.html">Parga, Greece</a>
                                        </h6>
                                        <span className="time">5352+ tours & 856+ Activity</span>
                                        <a href="#" className="more">
                                            <i className="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div className="col-xl-3 col-md-6 item features">
                                <div className="destination-item style-two">
                                    <div className="image">
                                        <a href="#" className="heart">
                                            <i className="fas fa-heart"></i>
                                        </a>
                                        <img src="/assets/images/destinations/destination3.jpg" alt="Destination" />
                                    </div>
                                    <div className="content">
                                        <h6>
                                            <a href="destination-details.html">Parga, Greece</a>
                                        </h6>
                                        <span className="time">5352+ tours & 856+ Activity</span>
                                        <a href="#" className="more">
                                            <i className="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div className="col-xl-3 col-md-6 item recent">
                                <div className="destination-item style-two">
                                    <div className="image">
                                        <a href="#" className="heart">
                                            <i className="fas fa-heart"></i>
                                        </a>
                                        <img src="/assets/images/destinations/destination5.jpg" alt="Destination" />
                                    </div>
                                    <div className="content">
                                        <h6>
                                            <a href="destination-details.html">Dubai united states</a>
                                        </h6>
                                        <span className="time">5352+ tours & 856+ Activity</span>
                                        <a href="#" className="more">
                                            <i className="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div className="col-xl-3 col-md-6 item features rating">
                                <div>
                                    <div className="image">
                                        <a href="#" className="heart">
                                            <i className="fas fa-heart"></i>
                                        </a>
                                        <img src="/assets/images/destinations/destination6.jpg" alt="Destination" />
                                    </div>
                                    <div className="content">
                                        <h6>
                                            <a href="destination-details.html">Milos, Greece</a>
                                        </h6>
                                        <span className="time">5352+ tours & 856+ Activity</span>
                                        <a href="#" className="more">
                                            <i className="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div className="col-xl-3 col-md-6 item features rating">
                                <div>
                                    <div className="image">
                                        <a href="#" className="heart">
                                            <i className="fas fa-heart"></i>
                                        </a>
                                        <img src="/assets/images/destinations/destination6.jpg" alt="Destination" />
                                    </div>
                                    <div className="content">
                                        <h6>
                                            <a href="destination-details.html">Milos, Greece</a>
                                        </h6>
                                        <span className="time">5352+ tours & 856+ Activity</span>
                                        <a href="#" className="more">
                                            <i className="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div className="col-xl-3 col-md-6 item features rating">
                                <div>
                                    <div className="image">
                                        <a href="#" className="heart">
                                            <i className="fas fa-heart"></i>
                                        </a>
                                        <img src="/assets/images/destinations/destination6.jpg" alt="Destination" />
                                    </div>
                                    <div className="content">
                                        <h6>
                                            <a href="destination-details.html">Milos, Greece</a>
                                        </h6>
                                        <span className="time">5352+ tours & 856+ Activity</span>
                                        <a href="#" className="more">
                                            <i className="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </>
    );
}

export default Destination;
