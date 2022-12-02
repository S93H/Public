import { useEffect, useState } from 'react'
import jQuery from 'jquery';
import {Link} from 'react-router-dom'


function Artists() {
  const [artists, setArtists] = useState([]);

  useEffect(() => {
    jQuery.ajax({
      url: 'http://127.0.0.1:8080/Artists.php',
      method: 'GET',
    }).then(response => {
      console.log(JSON.parse(response));
      setArtists(JSON.parse(response));
    }).catch(error => {
      console.log(error);
    })
  }, [])

  return (
    <div className="Artists">
      {artists.map(artist => {
        return <div key={artist.artist_name}>
          <p>{artist.artist_name}</p>
          <p>{artist.artist_description}</p>
          <Link to={'../select_artists/' + artist.artist_id}><img src={artist.artist_photo} alt={artist.artist_photo} /></Link>
          <p>{artist.artist_bio}</p>
        </div>
      })}
    </div>
  );
}


export default Artists 