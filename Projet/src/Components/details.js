import DetailsImg from '../Components/images/muscu.png'
import Aos from "aos";
import "aos/dist/aos.css";
import { useEffect } from 'react';

export default function Details() {

    useEffect(() => {
        Aos.init({duration: 2000});
    }, [])

   return (

    <>
        <div className="container details">
            <div className="row">
                <div data-aos="fade-right" className="col-sm-5">
                    <h6 ><span id='B'>B</span>asic Gym</h6>
                    <h4>Be Stronger Than Your Excuses</h4>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quis voluptas harum, earum fuga quos dolorem ab dignissimos nulla? Amet quam odio corrupti, illo officiis labore neque ex nesciunt facere? <br /> <br /> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam quaerat minima quasi sapiente quam delectus aliquam id dolorem numquam, sequi voluptatum error, quidem consequatur veniam corporis? Voluptas atque distinctio similique? <br /> <br /> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum ex sequi modi ipsam voluptate corporis obcaecati consectetur, voluptatibus neque. Possimus, sit dicta. Non porro laborum aut omnis sint enim ex! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non, iusto fuga! Molestiae autem ea velit deserunt quasi ab harum inventore blanditiis omnis fuga veniam beatae ipsam, nihil aspernatur officia doloremque.
                    </p>
                    <button id='team' className="btn">View More</button>
                </div>
                <div data-aos="fade-left" id='imgdetail' className="offset-sm-2 col-sm-5">
                    <img src={DetailsImg} alt="" />
                </div>
            </div>
        </div>
    </>
   )
}