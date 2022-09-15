<?php

require_once("../model/UserCreate.php");
require_once("../model/UserConnect.php");
require_once("../model/Posts.php");
require_once("../model/Comments.php");
require_once("../model/Messages.php");
require_once("../model/Users.php");
require_once("../model/Follow.php");

session_start();
// session_destroy();
class Controller {
    private static function verifyConnection() {
        if (isset($_SESSION['username'], $_SESSION['profile_picture'])) {
            return true;
        } else {
            return false;
        }
    }

    static function redirect() {
            
        if (Controller::verifyConnection()) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                switch ($_POST['page']) 
                {
                    case $_POST['page'] == "newPost":
                        $data = Posts::createPost($_POST['uid'], $_POST['content']);
                        return json_encode($data);
                        break;
                    case $_POST['page'] == "deletePost":
                        $data = Posts::deletePost($_POST['postId']);
                        return json_encode($data);
                        break;
                    case $_POST['page'] == "newComment":
                        $comments = Comments::addComment($_POST['uid'], $_POST['postId'], $_POST['content']);
                        $post = Posts::getPost($_POST['postId']);
                        $data = ['post' => $post, 'comments' => $comments];
                        return json_encode($data);
                        break;
                    case $_POST['page'] == "deleteComment":
                        $data = Comments::deleteComment($_POST['commentId'], $_POST['postId']);
                        return json_encode($data);
                        break;
                    case $_POST['page'] == "newFollow":
                        $data = Follow::newFollow($_POST['uid'], $_POST['to_user']);
                        return $data;
                        break;
                    case $_POST['page'] == "blockUser":
                        Follow::blockUser($_POST['uid'], $_POST['to_user']);
                        return true;
                        break;
                    case $_POST['page'] == "unblockUser":
                        Follow::unblockUser($_POST['uid'], $_POST['to_user']);
                        return true;
                        break;
                    case $_POST['page'] == "newMessage":
                        $data = Messages::newMessage($_POST['uid'], $_POST['to_user'], $_POST['content']);
                        return json_encode($data);
                        break;
                    case $_POST['page'] == "searchUser":
                        $data = Users::lookfor($_POST['search']);
                        return json_encode($data);
                        // $data = "searching users";
                        return $data;
                        break;
                    case $_POST['page'] == "userProfile":
                        $data = Users::getProfile($_POST['uid']);
                        return json_encode($data);
                        break;
                    case $_POST['page'] == 'updateUsername':
                        $data = Users::modifyUsername($_POST['uid'], $_POST['username']);
                        return json_encode($data);
                        break;
                }
            } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['page'])) {
                    switch ($_GET['page']) 
                    {
                        case $_GET['page'] == "getComments":
                            $comments = Comments::getComments($_GET['postId']);
                            $post = Posts::getPost($_GET['postId']);
                            $data = ['post' => $post, 'comments' => $comments];
                            return json_encode($data);
                            break;
                        case $_GET['page'] == "getFollow":
                            $followers = Follow::getFollowers($_GET['uid']);
                            $following = Follow::getFollowing($_GET['uid']);
                            $data = ['followers' => $followers, 'following' => $following];
                            return json_encode($data);
                            break;
                        case $_GET['page'] == "getMessages":
                            $data = Messages::getMessages($_GET['uid'], $_GET['to_user']);
                            return json_encode($data);
                            break;
                        case $_GET['page'] == "deco":
                            session_destroy();
                            $data = "deconected";
                            return $data;
                            break;
                        case $_GET['page'] == "home":
                            $data = Posts::getPosts();
                            return json_encode($data);
                            break;
                    }
                } elseif (isset($_GET['session'])) {
                    $session = [$_SESSION["username"], $_SESSION["profile_picture"], $_SESSION["id"]];
                    return json_encode($session);
                } else {
                    $data = Posts::getPosts();
                    return json_encode($data);
                    // return $data;
                }
            }
        } elseif (isset($_POST['page']) && $_POST['page'] == "registerUser" && !empty($_POST['username']) && !empty($_POST['mail1']) && !empty($_POST['pass1'])) {
            UserCreate::createUser($_POST['username'], $_POST['pass1'], $_POST['pass2'], $_POST['mail1'], $_POST['mail2'], $_POST['dob'], $_POST['firstname'], $_POST['lastname']);
            return json_encode($_POST);
        } elseif (isset($_POST['page']) && $_POST['page'] == "connectionUser") {
            $data = UsersConnect::login($_POST['mail'], $_POST['pass']);
            return $data;
        } else {
            $data = "connectionPage";
            return $data;
        }
    }
}

$data = Controller::redirect();
echo $data;