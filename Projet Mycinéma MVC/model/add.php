<?php

require_once("db.php");

     function addMembership($uid, $membership, $price, $duration, $reduction){
        if($membership == 'vip'){
            $subId = 1;
            $descSub = 'Mois complet tout compris';
        } elseif($membership == 'gold'){
            $subId = 2;
            $descSub = "Année complète";
        } elseif($membership == 'classic'){
            $subId = 3;
            $descSub = 'Abonnement mensuel classique';
        } elseif($membership == 'passday'){
            $subId = 4;
            $descSub = 'Pass une journée';
        }

        $my_db = getdb($uid, $membership, $price, $duration, $reduction);

        $query = $my_db->prepare('INSERT INTO membership(id_user, id_subscription, date_begin) VALUES (:userId, :idSub, NOW())');
        $query->execute(array('userId' => $uid, 'idSub' => $subId));

        $query = $my_db->prepare('INSERT INTO subscription(name, description, price, duration, reduction) VALUES (:subName, :descSub, :price, :duration, :reduction');
        $query->execute(array('subName' => $membership, 'descSub' => $descSub, 'price' => $price, 'duration' => $duration, 'reduction' => $reduction));
    }



    function add($email, $firstname, $lastname , $birthdate, $address, $zipcode, $city, $country)
{
    if(isset($_POST['addEmail'])) 
    {
        $my_db = getdb();
        $request = $my_db -> prepare("INSERT INTO user (email, firstname, lastname, birthdate, adress, zipcode, city, country) VALUES ($email, $firstname, $lastname, $birthdate, $address, $zipcode, $city, $country)");
        $request -> execute(array($email, $firstname, $lastname, $birthdate, $address, $zipcode, $city, $country));
        $request -> closeCursor();
    }
}

