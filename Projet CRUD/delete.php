<?php
// On démarre une session
session_start();

// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id']))
{
    require_once('db.php');

    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `user` WHERE `id` = :id;';

    // On prépare la requête
    $query  = $db->prepare($sql);

    // On "accroche" les paramètres
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On recupère l'utilisateur
    $member = $query->fetch();

    // On vérifie si l'utilisateur existe
    if(!$member)
    {
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: read.php');
        die();
    }

    $sql = 'DELETE FROM `user` WHERE `id` = :id;';

    // On prépare la requête
    $query  = $db->prepare($sql);

    // On "accroche" les paramètres
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();
    $_SESSION['message'] = "Produit supprimé";
        header('Location: read.php');
} else {
    $_SESSION['erreur'] = "URL invalide";
    header('Location: read.php');
}