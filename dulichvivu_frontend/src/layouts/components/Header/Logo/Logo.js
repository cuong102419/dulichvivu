import { Link } from 'react-router-dom';
import logo from '~/assets/images/logos/logo-2.png';


function Logo() {
    return (
        <div className="logo-outer">
            <div className="logo">
                <Link to="/">
                    <img src={logo} alt="Logo" title="Logo"></img>
                </Link>
            </div>
        </div>
    );
}

export default Logo;
