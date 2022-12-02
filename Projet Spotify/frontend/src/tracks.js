import { useEffect, useState } from 'react'
import jQuery from 'jquery';
import { useParams } from 'react-router-dom'


function Tracks() {
  const [tracks, setTracks] = useState([]);
  const {albumId} = useParams();

  useEffect(() => {
    console.log(albumId);
    if (albumId !== undefined) {
      jQuery.ajax({
        url: 'http://127.0.0.1:8080/Albums.php?albumId=' + albumId,
        method: 'GET',
      }).then(response => {
        console.log(JSON.parse(response));
        setTracks(JSON.parse(response));
      }).catch(error => {
        console.log(error);
      })
    }
  }, [albumId])

  return (
    <div className="Tracks">
      {tracks.map(track => {
        return <div key={track.track_name}>
          <img src={track.album_cover}></img>
          <p>{track.track_name}</p>
          <audio controls src={track.track_mp3}></audio>
        </div>
      })}
    </div >
  );
}


export default Tracks 