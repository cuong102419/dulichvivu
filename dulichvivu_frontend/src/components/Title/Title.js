import { Helmet } from 'react-helmet-async';

function Title({ children }) {
    return (
        <Helmet>
            <title>{children}</title>
        </Helmet>
    );
}

export default Title;
