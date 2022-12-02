import { useEffect, useState } from 'react'
import jQuery from 'jquery';
// import { useParams } from 'react-router-dom'
import { Link } from "react-router-dom"

function Genres() {
  const [genres, setGenres] = useState([]);

  useEffect(() => {
    jQuery.ajax({
      url: 'http://127.0.0.1:8080/Genres.php',
      method: 'GET',
    }).then(response => {
      console.log(JSON.parse(response));
      setGenres(JSON.parse(response));
    }).catch(error => {
      console.log(error);
    })
  }, [])

  return (
    <div className="Genre">
      {genres.map(genre => {
        return <div key={genre.name}>
          <p><Link to={"../genre_albums/" + genre.id}>{genre.name}</Link></p>
        </div>
      })}
    </div>
  );
}


export default Genres 