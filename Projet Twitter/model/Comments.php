<?php

require_once("../model/Db.php");

class Comments extends Db {

    static function getComments($postId) {
        $db = Db::dbConnect();
        $query = $db->prepare('SELECT c.content, c.created_at, u.username, u.profile_picture FROM comments c INNER JOIN posts p ON p.id = c.id_post INNER JOIN users u ON p.id_user = u.id WHERE p.id = :postId ORDER BY c.created_at DESC');
        $query->execute(array('postId' => $postId));
        $results = $query->fetchAll();
        return $results;
    }

    static function addComment($uid, $postId, $content) {
        $db = Db::dbConnect();
        $query = $db->prepare('INSERT INTO comments (id_user, id_post, content, created_at) VALUES (:id_user, :id_post, :content, NOW())');
        $query->execute(array('id_user' => $uid, 'id_post' => $postId, 'content' => $content));
        $results = Comments::getComments($postId);
        return $results;
    }

    static function deleteComment($commentId, $postId) {
        $db = Db::dbConnect();
        $query = $db->prepare('DELETE FROM comments WHERE id = :commentId');
        $query->execute(array('commentId' => $commentId));
        $results = Comments::getComments($postId);
        return $results;
    }
}