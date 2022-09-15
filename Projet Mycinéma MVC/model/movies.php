<?php

require_once("db.php");


function getMovies()
{
    if (isset($_GET["genre"])) {
        $my_db = getdb();
        $genre = $_GET["genre"];
        $request = $my_db->prepare("SELECT m.title as 'title', g.name as 'g_name', d.name as 'd_name' from movie m inner join movie_genre mg on m.id = mg.id_movie inner join genre g on g.id = mg.id_genre inner join distributor d on m.id_distributor = d.id where g.name like ?");
        $request->execute(array("%$genre%"));
        $movies = $request->fetchAll();
        //var_dump(count($movies));
        return $movies;
    }

    
    //var_dump($_GET);
    //return [];
}

function getTitles()
{
    if (isset($_GET["title"])) {
        $my_db = getdb();
        $title = $_GET["title"];
        $request = $my_db->prepare("SELECT m.title as 'title', g.name as 'g_name', d.name as 'd_name' from movie m inner join movie_genre mg on m.id = mg.id_movie inner join genre g on g.id = mg.id_genre inner join distributor d on m.id_distributor = d.id where title like ?");
        $request->execute(array("%$title%"));
        $titres = $request->fetchAll();
        //var_dump(count($titres));
        return $titres;
    }


    //var_dump($_GET);
    //return [];
}

function getDistris()
{
    if (isset($_GET["distri"])) {
        $my_db = getdb();
        $distri = $_GET["distri"];
        $request = $my_db->prepare("SELECT m.title as 'title', g.name as 'g_name', d.name as 'd_name' from movie m inner join movie_genre mg on m.id = mg.id_movie inner join genre g on g.id = mg.id_genre inner join distributor d on m.id_distributor = d.id where d.name like ?");
        $request->execute(array("%$distri%"));
        $distris = $request->fetchAll();
        //var_dump(count($distris));
        return $distris;
    }


    //var_dump($_GET);
    //return [];
}

function getDates()
{
    if (isset($_GET["date"])) {
        $my_db = getdb();
        $date = $_GET["date"];
        $request = $my_db->prepare("SELECT m.title as 'title', g.name as 'g_name', d.name as 'd_name', ms.date_begin from movie m inner join movie_genre mg on m.id = mg.id_movie inner join genre g on g.id = mg.id_genre inner join distributor d on m.id_distributor = d.id inner join movie_schedule ms on m.id = ms.id_movie where date_begin like ?");
        $request->execute(array("%$date%"));
        $dates = $request->fetchAll();
        //var_dump(count($dates));
        return $dates;
    }


    //var_dump($_GET);
    //return [];
}

//SELECT title, date_begin from movie m inner join movie_schedule ms on m.id = ms.id_movie inner join room r on ms.id_room = r.id where date_begin like ?