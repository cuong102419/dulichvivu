import Banner from "~/components/Banner";
import AboutCompany from "./component/AboutCompany";
import Title from "~/components/Title";
import Achiviment from "./component/Achievement";

function About() {
    return ( 
        <>
            <Title>
                Dulichvivu - Giới thiệu chúng tôi
            </Title>
            <Banner title="Giới thiệu chúng tôi"/>
            <AboutCompany/>
            <Achiviment/>
        </>
     );
}

export default About;