<?php

require_once("../model/Db.php");

class Follow extends Db {

    static function getFollowers($uid) {
        $db = Db::dbConnect();
        $query = $db->prepare('SELECT * FROM follow WHERE to_user = :userId AND status = "F"');
        $query->execute(array('userId' => $uid));
        $result = $query->rowCount();
        return $result;
    }

    static function getFollowing($uid) {
        $db = Db::dbConnect();
        $query = $db->prepare('SELECT * FROM follow WHERE from_user = :userId AND status = "F"');
        $query->execute(array('userId' => $uid));
        $result = $query->rowCount();
        return $result;
    }

    static function newFollow($uid, $toUser) {
        $db = Db::dbConnect();
        $getToId = $db->prepare('SELECT id FROM users WHERE username = :username');
        $getToId->execute(array('username' => $toUser));
        $result = $getToId->fetch();
        // return $result['id'];
        // $getToId->closeCursor();
        $query = $db->prepare('INSERT INTO follow (from_user, to_user, status) VALUES (:from_user, :to_user, "F")');
        $query->execute(array('from_user' => $uid, 'to_user' => $result['id']));
    }

    static function blockUser($uid, $to_user) {
        $db = Db::dbConnect();
        $query = $db->prepare('UPDATE follow SET status = "B" WHERE from_user = :from_user AND to_user = :to_user');
        $query->execute(array('from_user' => $uid, 'to_user' => $to_user));
    }

    static function unblockUser($uid, $to_user) {
        $db = Db::dbConnect();
        $query = $db->prepare('UPDATE follow SET status = "F" WHERE from_user = :from_user AND to_user = :to_user');
        $query->execute(array('from_user' => $uid, 'to_user' => $to_user));
    }
}