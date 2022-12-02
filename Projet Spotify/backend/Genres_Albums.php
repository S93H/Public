<?php

require_once('db.php');

class Genres_Albums extends Db {
    static function getGenres_Albums() {
        $db = Db::dbConnect();
        $query = $db->prepare('SELECT * FROM genres_albums');
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($results);
    }
}

$genre_album = new Genres_Albums();
header('Content-Type: application/json');
// CORS headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

echo $genre_album->getGenres_Albums();