import banner from '~/assets/images/destinations/destination4.jpg';

function Banner() {
    return (
        <section
            className="page-banner-area pt-50 pb-120 z-1 bgs-cover"
            style={{ backgroundImage: `url(${banner})` }}
        >
            <div className="container-fluid">
                <h1 className="hero-title">Đi và khám phá</h1>
            </div>
        </section>
    );
}

export default Banner;
