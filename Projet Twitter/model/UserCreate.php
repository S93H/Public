<?php

require_once("../model/Db.php");

class UserCreate extends Db {
    
    private static function checkUsername($username) {
        $db = Db::dbConnect();
        $usernameLength  = strlen($username);

        $reqUsername = $db->prepare('SELECT * FROM users WHERE username = ?');
        $reqUsername->execute(array($username));
        $userExists = $reqUsername->rowCount();

        if ($userExists == 0 && $usernameLength <= 20) {
            return true;
        } elseif ($userExists != 0) {
            throw new Exception('Username already taken');
        } elseif ($usernameLength > 20) {
            throw new Exception('Your username shouldn\'t be longer than 20 characters');
        }
    }

    private static function checkEmail($mail1, $mail2) {
        $db = Db::dbConnect();
        $reqEmail = $db->prepare('SELECT * FROM users WHERE mail = ?');
        $reqEmail->execute(array($mail1));
        $mailExists = $reqEmail->rowCount();

        if ($mailExists == 0 && $mail1 == $mail2) {
            return true;
        } elseif ($mailExists != 0) {
            throw new Exception('Email address already used');
        } elseif ($mail1 != $mail2) {
            throw new Exception('The email addresses don\'t match');
        }
    }

    private static function checkAge($dob) {
        $currentDate = date("d-m-Y");
        $ageTemp = date_diff(date_create($dob), date_create($currentDate));
        $age = $ageTemp->format("%y");
        
        if ($age >= 13) {
            return true;
        } else {
            throw new Exception('You must be 13 or over to create an acount');
        }
    }

    private static function checkHashPass($pass1, $pass2) {
        if ($pass1 == $pass2) {
            $salt = "vive le projet tweet_academy";
            $hashed = hash('ripemd160', $pass1.$salt);
            return $hashed;
        } else {
            throw new Exception('The passwords don\'t match');
        }
    }

    static function createUser($username, $pass1, $pass2, $mail, $mail2, $dob, $firstname, $lastname) {
        $db = Db::dbConnect();

        if (!empty($username) && !empty($mail) && !empty($mail2) && !empty($pass1) && !empty($pass2)) {

            $age = UserCreate::checkAge($dob);
            $userChecked = UserCreate::checkUsername($username);
            $mailChecked = UserCreate::checkEmail($mail, $mail2);
            $hashedPass = UserCreate::checkHashPass($pass1, $pass2);
            $profilePicture = '../view/media/user.png';

            if ($age && $userChecked && $mailChecked) {
                $query = $db->prepare(
                    'INSERT INTO users (username, pass, mail, birthdate, firstname, lastname, profile_picture) 
                    VALUES (:username, :pass, :mail, :birthdate, :firstname, :lastname, :profile_picture)');
                $query->execute(array(
                    'username' => $username, 
                    'pass' => $hashedPass, 
                    'mail' => $mail,
                    'birthdate' => $dob,
                    'firstname' => $firstname, 
                    'lastname' => $lastname,
                    'profile_picture' => $profilePicture
                ));
            }
        }
    }
}