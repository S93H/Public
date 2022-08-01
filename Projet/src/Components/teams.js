import Team1 from "../Components/images/fitwoman.jpg";
import Team2 from "../Components/images/man2.jpg";
import Team3 from "../Components/images/man3.jpg";
import Aos from "aos";
import "aos/dist/aos.css";
import { useEffect } from 'react';

export default function Teams() {

    useEffect(() => {
        Aos.init({duration: 2000});
    }, [])

    return (
        <>

            <div className="teams container">
                <div className="row">

                    <div data-aos="fade-right" className="col-sm-4">
                        <div className="box">
                            <img src={Team1} className="img-fluid" alt="" />
                            <div className="content">
                                <h6>Basic Gym Team</h6>
                            </div>
                        </div>
                    </div>

                    <div data-aos="fade-right" className="col-sm-4">
                        <div className="box">
                            <img src={Team2} className="img-fluid" alt="" />
                            <div className="content">
                                <h6>Basic Gym Team</h6>
                            </div>
                        </div>
                    </div>

                    <div data-aos="fade-right" className="col-sm-4">
                        <div className="box">
                            <img src={Team3} className="img-fluid" alt="" />
                            <div className="content">
                                <h6>Basic Gym Team</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </>
        
    )
}