import banner from '~/assets/images/banner/banner.jpg';

function Banner({ title }) {
    return (
        <section
            className="page-banner-area pt-50 pb-120 rel z-1 bgs-cover"
            style={{ backgroundImage: `url(${banner})` }}
        >
            <div className="container">
                <div className="banner-inner text-white">
                    <h2 className="page-title mb-10">{title}</h2>
                </div>
            </div>
        </section>
    );
}

export default Banner;
