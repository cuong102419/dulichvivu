import Gallery from './components/Gallery';
import Header from './components/Header';
import Description from './components/Description/Description';
import Review from './components/Review';
import Title from '~/components/Title';
import Intinerary from './components/Itinerary';
import { TitleBanner } from './components/Title';
import { useCallback, useEffect, useState } from 'react';
import { getTour } from '~/services/getTourService';
import { useNavigate, useParams } from 'react-router-dom';
import Regulation from './components/Regulation';
import Sidebar from './components/Sidebar';
import useRealtime from '~/hooks/useRealtime';
import { debounce } from 'lodash';

function Detail() {
    const [tour, setTour] = useState(null);
    const [images, setImages] = useState([]);
    const [timelines, setTimelines] = useState([]);
    const [departures, setDepartures] = useState([]);
    const { slug } = useParams();
    const navigate = useNavigate();

    const fetchTour = useCallback(async () => {
        try {
            const data = await getTour(slug);

            setTour(data.data.tour);
            setImages(data.data.image_url);
            setTimelines(data.data.timelines);
            setDepartures(data.data.departures);
        } catch (error) {
            console.error(error);
            setTour(null)
            navigate('/error');
        }
    }, [slug, navigate]);

    useEffect(() => {
        fetchTour();
    }, [fetchTour]);

    useRealtime('tours', 'TourChanged', debounce(fetchTour, 1000));

    return (
        <>
            <Title>{tour?.title}</Title>

            <TitleBanner title={tour?.title} />

            <Gallery images={images} />

            <Header title={tour?.title} code={tour?.code} rate={tour?.reviews} />

            <section className="tour-details-page pb-100">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-8">
                            <Description description={tour?.description} />

                            <h3>Chương trình</h3>
                            <Intinerary timelines={timelines} />

                            <Regulation rules={tour?.rules} />

                            <Review tourId={tour?.id} />
                        </div>
                        <div className="col-lg-4 col-md-8 col-sm-10 rmt-75">
                            <Sidebar departures={departures} tour={tour} />
                        </div>
                    </div>
                </div>
            </section>
        </>
    );
}

export default Detail;
