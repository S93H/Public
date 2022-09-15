import React,{ useState } from 'react';
import {Link} from 'react-scroll';

export default function Navbar() {

    const [navbar, setNavbar] = useState(false);
    const changeBg = () => {
        if(window.scrollY >= 100) {
            setNavbar(true)
        }else {
            setNavbar(false)
        }
    }

    window.addEventListener('scroll', changeBg);

    return (
        <>
            {/* <nav className="navbar navbar-expand-sm fixed-top"> */}
            <nav className={navbar ? 'navbar active navbar-expand-sm fixed-top' : 'navbar navbar-expand-sm fixed-top'}>
                <a href="" className="navbar-brand"><span>B</span>asic Gym</a>
                <div>
                    <ul className="navbar-nav">
                        <li className="nav-item"><Link to="head" spy={true} smooth={true} offset={50} duration={500} className="nav-link">Home</Link></li>
                        <li className="nav-item"><Link  to="services" spy={true} smooth={true} offset={50} duration={500}className="nav-link">Services</Link></li>
                        <li className="nav-item"><Link to="about" spy={true} smooth={true} offset={50} duration={500} className="nav-link">About</Link></li>
                        <li className="nav-item"><Link to="team" spy={true} smooth={true} offset={50} duration={500} className="nav-link">Team</Link></li>
                    </ul>
                </div>
            </nav>
        </>
    );
}