import { Link } from 'react-router-dom'
import Banner from './components/Banner.js'
import Logo from './assets/spotify.png'
import './App.css'


function App() {
  return (
    <>
    <div>
      <Banner>
        <h1 className='spotify-title'>Spotify</h1>
        <img className='logo-spotify' src={Logo} alt='logo-spotify'/>
      </Banner>
      <div className='theme'>
        <Link to='/albums' className='Albums'><h1>Albums</h1></Link>
        <Link to='/artists' className='Artists'><h1>Artists</h1></Link>
        <Link to='/genres' className='Genre'><h1>Genres</h1></Link>
      </div>

      <div className='body'>
        <div className='hide'>
        <a href='#'>GET SPOTIFY FREE</a>
        </div>
      </div>

      <div className='footer'>

      </div>
    </div>
    </>
  )
}

export default App; 