import HeaderImg from '../Components/images/gymheader.jpg'
export default function Header() {
    return (
        
            <>
                <section>
                    <div id='head' className="header">
                        <div>
                            <div className="img">
                                <img className='headerImg' src={HeaderImg} alt="" />
                            </div>
                            <div className="Overlay"></div>
                        </div>
                        <div id='services' className="Content">
                            <h6>Go Beyond Your Limits</h6>
                        </div>
                    </div>
                </section>
            </>
    )
}