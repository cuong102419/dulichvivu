import { Helmet } from "react-helmet-async";
import Banner from "~/components/Banner";
import Newletter from "~/components/Newletter";
import Search from "~/components/Search";
import Content from "./Content";



function List() {
    return ( 
        <>
            <Helmet>
                <title>
                    Tour du lịch
                </title>
            </Helmet>
            <Banner title="TOUR" />
            <Search/>
            <Content/>
            <Newletter/>
        </>
     );
}

export default List;