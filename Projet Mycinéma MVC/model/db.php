<?php

function getdb() {
    try {
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=cinema;charset=UTF8", "sylvain", "password");
        return $pdo;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return null;
    }
}