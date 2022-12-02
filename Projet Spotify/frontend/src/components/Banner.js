import '../styles/Banner.css'
import logo from '../assets/spotify.png'

function Banner({children}) {
    const title = 'Spotify'
    return <div className='spotify-banner'>{children}</div>
}

export default Banner