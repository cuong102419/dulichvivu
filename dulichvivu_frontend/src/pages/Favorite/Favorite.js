import Title from "~/components/Title";
import Sidebar from "./components/Sidebar";
import List from "./components/List";

function Favorite() {
    return <>
         <Title>Dulichvivu - Tour đã đặt</Title>
            <section className="tour-list-page py-100 rel z-1">
                <div className="container">
                    <div className="row">
                        <Sidebar />
                        <List />
                    </div>
                </div>
            </section>
    </>;
}

export default Favorite;