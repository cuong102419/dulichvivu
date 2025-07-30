import { Link } from 'react-router-dom';

function MobileMenu() {
    return (
        <div className="navbar-header">
            <div className="mobile-logo">
                <Link to="/">
                    <img className="logo" src="/assets/images/logos/logo-2.png" alt="Logo" title="Logo" />
                </Link>
            </div>

            {/* <!-- Toggle Button --> */}
            <button type="button" className="navbar-toggle" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                <span className="icon-bar"></span>
                <span className="icon-bar"></span>
                <span className="icon-bar"></span>
            </button>
        </div>
    );
}

export default MobileMenu;
