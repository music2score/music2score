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
                <NavLink to='/about' activeStyle>
                    About
                </NavLink>
                <NavLink to='/services' activeStyle>
                    Service
                </NavLink>
                <NavLink to='/contact-us' activeStyle>
                    Contact Us
                </NavLink>
                <NavLink to='/sign-up' activeStyle>
                    Sign Up
                </NavLink>
            </NavMenu>
            <NavBtn>
                <NavBtnLink to='signin'>Sign In</NavBtnLink>
            </NavBtn>
        </Nav>
        </div>
    )
}

export default Navbar;
