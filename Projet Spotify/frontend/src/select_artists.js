import { useEffect, useState } from 'react'
import jQuery from 'jquery';


function Select_Artists() {
  const [selects_artists, setSelect_Artists] = useState([]);

  useEffect(() => {
    jQuery.ajax({
      url: 'http://127.0.0.1:8080/Artists.php',
      method: 'GET',
    }).then(response => {
      console.log(JSON.parse(response));
      setSelect_Artists(JSON.parse(response));
    }).catch(error => {
      console.log(error);
    })
  }, [])

  return (
    <div className="Select_Artists">
      {selects_artists.map(select_artist => {
        return <div key={select_artist.artist_id}>
          <p>{select_artist.artist_name}</p>
          <p>{select_artist.artist_description}</p>
          <img src={select_artist.artist_photo} alt={select_artist.artist_photo} />
          <p>{select_artist.artist_bio}</p>
        </div>
      })}
    </div>
  );
}


export default Select_Artists 