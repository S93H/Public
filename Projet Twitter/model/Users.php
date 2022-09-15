<?php

require_once("../model/Db.php");

class Users extends Db {

    static function lookfor($search) {
        $db = Db::dbConnect();
        $searched = "%".$search."%";
        $query = $db->prepare('SELECT birthdate, profile_picture, lastname, firstname, username FROM users WHERE firstname LIKE :search OR lastname LIKE :search OR username LIKE :search');
        $query-> execute(array("search" => $searched));
        $result = $query->fetchAll();
        return $result;
    }

    static function getProfile($uid) {
        $db = Db::dbConnect();
        $query = $db->prepare('SELECT * FROM users WHERE id = :id_user');
        $query->execute(array('id_user' => $uid));
        $result = $query->fetch();
        return $result;
    }

    static function modifyUsername($uid, $username) {
        $db = Db::dbConnect();
        $query = $db->prepare('SELECT * FROM users WHERE username = ?');
        $query->execute(array($username));
        $user_infos = $query->fetch();
        $user_exists = $query->rowCount();

        if ($user_exists == 0 || ($user_exists == 1 && $user_infos['id'] == $_SESSION['id'])) {
            $query2 = $db->prepare('UPDATE users SET username = :username WHERE id = :id');
            $query2->execute(array('username' => $username, 'id' => $uid));
        }
    }
}