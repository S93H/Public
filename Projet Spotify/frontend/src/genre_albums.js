import { useEffect, useState } from 'react'
import jQuery from 'jquery';
import { useParams } from 'react-router-dom'
import { Link } from 'react-router-dom'


function Genre_Albums() {
  const [genre_albums, setGenre_Albums] = useState([]);
  const {genreId} = useParams();

  useEffect(() => {
    console.log(genreId);
    if (genreId !== undefined) {
      jQuery.ajax({
        url: 'http://127.0.0.1:8080/Albums.php?genreId=' + genreId,
        method: 'GET',
      }).then(response => {
        console.log(JSON.parse(response));
        setGenre_Albums(JSON.parse(response));
      }).catch(error => {
        console.log(error);
      })
    }
  }, [genreId])

  return (
    <div className="Tracks">
      {genre_albums.map(genre_album => {
        return <div key={genre_album.album_name}>
            <p>{genre_album.album_name}</p>
            <Link to={'../tracks/' + genre_album.album_id }><img src={genre_album.album_cover}></img></Link>
        </div>
      })}
    </div >
  );
}


export default Genre_Albums 