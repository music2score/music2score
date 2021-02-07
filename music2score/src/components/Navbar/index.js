// Imports. 
import React from 'react';
import {Nav, NavLink, Bars, NavMenu, NavBtn, NavBtnLink} from './NavbarElements';

const Navbar = () => {
    return (
        <div>
        <Nav>
            <NavLink to='/'>
                {/* <img src={require('../../images/logo.svg')} alt="logo"/> */}
                <h1>Music2Score</h1>
            </NavLink>
            <Bars />
            <NavMenu>
                <NavLink to='/AboutPage' activeStyle>
                    About
                </NavLink>
                <NavLink to='/MusicServicesPage' activeStyle>
                    Sheet Music
                </NavLink>
                <NavLink to='/ContactPage' activeStyle>
                    Contact Info
                </NavLink>
                <NavLink to='/SignUpSignInPage' activeStyle>
                    Sign Up/Sign In
                </NavLink>
            </NavMenu>
            <NavBtn>
                <NavBtnLink to='AccountPage'>Account</NavBtnLink>
            </NavBtn>
        </Nav>
        </div>
    )
}

export default Navbar;
