import ButtonLogin from './ButtonLogin';
import Logo from './Logo';
import MainMenu from './MainMenu';

function Header() {

    return (
        <>
            <header className="main-header header-one fixed-header">
                <div className="header-upper bg-white py-30 rpy-0">
                    <div className="container clearfix">
                        <div className="header-inner rel d-flex align-items-center">
                            <Logo />
                            <MainMenu />
                            <ButtonLogin/>
                        </div>
                    </div>
                </div>
            </header>
        </>
    );
}

export default Header;
