<?php

require_once("../model/Db.php");

class Messages extends Db {

    static function getMessages($uid, $to_user) {
        $db = Db::dbConnect();
        $query = $db->prepare('SELECT u.username, u.profile_picture, m.content, m.created_at FROM messages m INNER JOIN users u ON (m.from_user = :user OR m.from_user = :friend) AND (m.to_user = :friend OR m.to_user = :user) AND m.from_user = u.username ORDER BY m.created_at DESC');
        $query->execute(array('user' => $uid, 'friend' => $to_user));
        $results = $query->fetchAll();
        return $results;
    }

    static function newMessage($uid, $to_user, $content) {
        $db = Db::dbConnect();
        $blockedVerif = $db->prepare('SELECT * FROM follow WHERE from_user = :to_user AND status = "F"');
        $blockedVerif->execute(array('to_user' => $to_user));
        $blockedResult = $blockedVerif->rowCount();

        if ($blockedResult == 1) {
            $query = $db->prepare('INSERT INTO messages (from_user, to_user, content, created_at) VALUES (:from_user, :to_user, :content, NOW())');
            $query->execute(array('from_user' => $uid, 'to_user' => $to_user, 'content' => $content));
            $response = Messages::getMessages($uid, $to_user);
            return $response;
        } else {
            $response = "You can't send messages to this user.";
            return $response;
        }
    }
}