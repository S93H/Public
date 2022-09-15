import Custom1 from '../Components/images/salledemuscu.jpg'
import Custom2 from '../Components/images/sallepiscine.jpg'
import Custom3 from '../Components/images/boxe.jpg'
import Aos from "aos";
import "aos/dist/aos.css";
import { useEffect } from 'react';
export default function Custom() {

    useEffect(() => {
        Aos.init({duration: 2000});
    }, [])

    return (
        <>
            <section>
                <div id='services' className="custom container">
                    <div className="row">

                        <div className="col-sm-4">
                            <div data-aos="flip-left" className="box">
                                <img src={Custom1} className="img-fluid" alt="" />
                            </div>
                        </div>

                        <div className="col-sm-4">
                            <div data-aos= "fade-down" className="box">
                                <img src={Custom2} className="img-fluid" alt="" />
                            </div>
                        </div>

                        <div className="col-sm-4">
                            <div data-aos="flip-right" className="box">
                                <img src={Custom3} className="img-fluid" alt="" />
                            </div>
                            <div id='about'></div>
                        </div>

                    </div>

                </div>
            </section>
        </>
    )
}