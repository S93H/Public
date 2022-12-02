<?php

require_once('Db.php');

class Tracks extends Db {
    static function getTracks() {
        $db = Db::dbConnect();
        $query = $db->prepare('SELECT t.name AS "track_name", t.id AS "track_id", t.mp3 AS "track_mp3", a.name AS "album_name", a.cover_small AS "album_cover_small" FROM tracks t inner join albums a ON t.album_id = a.id inner join artists ar ON a.artist_id = ar.id inner join genres_albums ga ON a.id = ga.album_id inner join genres g ON ga.genre_id = g.id limit 10');
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($results);
    }
}
    
// CORS headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = Tracks::getTracks($_GET['track_id']);

echo $data;