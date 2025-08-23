import Title from '~/components/Title';
import List from './components/List';
import Sidebar from './components/Sidebar';

function BookingHistory() {
    return (
        <>
            <Title>Dulichvivu - Tour đã đặt</Title>
            <section className="tour-list-page py-100 rel z-1">
                <div className="container">
                    <div className="row">
                        <Sidebar />
                        <List />
                    </div>
                </div>
            </section>
        </>
    );
}

export default BookingHistory;
