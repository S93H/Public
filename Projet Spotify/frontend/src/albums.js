import { useEffect, useState } from 'react'
import jQuery from 'jquery';
import { Link } from 'react-router-dom'

function Albums() {
  const [albums, setAlbums] = useState([]);

  useEffect(() => {
    jQuery.ajax({
      url: 'http://127.0.0.1:8080/Albums.php?allAlbum',
      method: 'GET',
    }).then(response => {
      console.log(JSON.parse(response));
      setAlbums(JSON.parse(response));
    }).catch(error => {
      console.log(error);
    })

  }, [])

  return (
    <div className="Albums">
      {albums.map(album => {
        return <div key={album.album_name}>
          <p><Link to={'../artists/' + album.album_id}></Link>{album.album_name}</p>
          <p className='text2'>{album.artist_name}</p>
          <p>{album.album_description}</p>
          <p>{album.genre}</p>
          <p>Popularity : {album.album_popularity}</p>
          <p>Release date : {album.album_release_date}</p>
          <p><Link to={'../tracks/' + album.album_id}><img src={album.album_cover} alt={album.album_cover}></img></Link></p>
          <p>{album.track_name}</p>
        </div>
      })}
    </div >
  );
}


export default Albums 