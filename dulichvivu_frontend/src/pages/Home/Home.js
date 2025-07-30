import Title from '~/components/Title';

import Content from './Content';

import Search from '~/components/Search';
import Banner from './Content/Banner';
import Newletter from '~/components/Newletter';

function Home() {

    return (
        <>
            <Title>Dulichvivu - Du lịch và booking tour dễ dàng</Title>
            <Banner />
            <Search />
            <Content />
            <Newletter />
        </>
    );
}

export default Home;
