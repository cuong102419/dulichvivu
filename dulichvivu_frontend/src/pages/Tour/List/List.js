import { Helmet } from "react-helmet-async";
import Banner from "~/components/Banner";
import Newletter from "~/components/Newletter";
import Search from "~/components/Search";
import Content from "./Content";
import { useState } from "react";



function List() {
    const [filters, setFilters] = useState({
        destination: null,
        startDate: null,
        endDate: null
    });

    const handleSearch = (values) => {
        setFilters(values);
    }

    return ( 
        <>
            <Helmet>
                <title>
                    Dulichvivu - Tour du lịch
                </title>
            </Helmet>
            <Banner title="TOUR" />
            <Search onSearch={handleSearch} />
            <Content filters={filters}/>
            <Newletter/>
        </>
     );
}

export default List;