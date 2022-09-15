<?php

require_once("../model/Db.php");

class Posts extends Db {
    
    static function getPosts() {
        $db = Db::dbConnect();
        $query = $db->query('SELECT p.id, p.id_user, p.content, p.created_at, p.image_url, p.hashtags, p.tags, u.id AS "id_user", u.username, u.profile_picture FROM posts p INNER JOIN users u ON p.id_user = u.id ORDER BY p.created_at DESC');
        $results = $query->fetchAll();
        return $results;
    }

    static function createPost($uid, $content) {
        $db = Db::dbConnect();
        $query = $db->prepare('INSERT INTO posts (id_user, content, created_at) VALUES (:id_user, :content, NOW())');
        $query->execute(array('id_user' => $uid, 'content' => $content));
        $results = Posts::getPosts();
        return $results;
    }

    static function deletePost($postId) {
        $db = Db::dbConnect();
        $query = $db->prepare('DELETE FROM posts WHERE id = :postId');
        $query->execute(array('postId' => $postId));
        $results = Posts::getPosts();
        return $results;
    }

    static function getPost($postId) {
        $db = Db::dbConnect();
        $query = $db->prepare('SELECT p.id, p.id_user, p.content, p.created_at, p.image_url, p.hashtags, p.tags, u.username, u.profile_picture FROM posts p INNER JOIN users u ON p.id_user = u.id WHERE p.id = :postId ORDER BY p.created_at DESC');
        $query->execute(array('postId' => $postId));
        $results = $query->fetch();
        return $results;
    }
}