import config from '~/config';
import Home from '~/pages/Home';
import About from '~/pages/About';
import Error from '~/pages/Error';
import Login from '~/pages/Login';
import Register from '~/pages/Register';
import { TourList } from '~/pages/Tour/List';
import { TourDetail } from '~/pages/Tour/Detail';
import Contact from '~/pages/Contact';
import Help from '~/pages/Help';
import Booking from '~/pages/Booking';
import BookingHistory from '~/pages/BookingHistory';
import Rating from '~/pages/Rating';
import Profile from '~/pages/Profile';
import Favorite from '~/pages/Favorite';

const publicRoutes = [
    { path: config.routes.home, component: Home },
    { path: config.routes.tourList, component: TourList },
    { path: config.routes.tourDetail, component: TourDetail },
    { path: config.routes.tourHistory, component: BookingHistory },
    { path: config.routes.booking, component: Booking },
    { path: config.routes.rating, component: Rating },
    { path: config.routes.about, component: About },
    { path: config.routes.login, component: Login },
    { path: config.routes.register, component: Register },
    { path: config.routes.profile, component: Profile },
    { path: config.routes.favorite, component: Favorite },
    { path: config.routes.contact, component: Contact },
    { path: config.routes.help, component: Help },
    { path: config.routes.error, component: Error },
];

const privateRoutes = [];

export { publicRoutes, privateRoutes };
