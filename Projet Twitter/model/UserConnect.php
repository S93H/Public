<?php

require_once("../model/Db.php");
require_once("../model/Posts.php");

class UsersConnect extends Db {

    static function login($mail, $pass) {
        $db = Db::dbConnect();

        $salt = "vive le projet tweet_academy";
        $hashed = hash('ripemd160', $pass.$salt);
        $requirePwd = $db->prepare("SELECT id, username, mail, pass, profile_picture FROM users WHERE mail = ?");
        $requirePwd->execute(array($mail));
        $userExists = $requirePwd->rowCount();

        if(!empty($mail) && !empty($pass)){
            if($userExists != 0){
                $user_infos = $requirePwd->fetch();
                if($hashed == $user_infos['pass']) {
                    $_SESSION['username'] = $user_infos['username'];
                    $_SESSION['profile_picture'] = $user_infos['profile_picture'];
                    $_SESSION['id'] = $user_infos['id'];
                    // $result = "connected";
                    $userSession = [$_SESSION['username'], $_SESSION['profile_picture']];
                    $data = Posts::getPosts();
                    return json_encode($data);
                    // return json_encode($userSession);
                } else {
                    throw new Exception('Wrong username or password');
                }
            } else {
                throw new Exception('Wrong username or password');
            }
        } else {
        throw new Exception('All fields must be filled');
        }
    }
}