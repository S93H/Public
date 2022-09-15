<?php

require_once("db.php");


function getMembers()
{
    if (isset($_GET["name"])) {
        $my_db = getdb();
        $name = $_GET["name"];
        $request = $my_db->prepare("SELECT * from membership ms inner join user u on ms.id_user = u.id inner join subscription s on s.id = ms.id_subscription where u.lastname like ? or u.firstname like ?");
        $request->execute(array("%$name%", "%$name%"));
        $members = $request->fetchAll();
        return $members;
    }


    var_dump($_GET);
    return [];
}