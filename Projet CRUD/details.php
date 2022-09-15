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
    }
} else {
    $_SESSION['erreur'] = "URL invalide";
    header('Location: read.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Details utilisateur</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Détails utilisateur : <?= $member['member']?></h1>
                <p>ID : <?= $member['id']?></p>
                <p>Lastname : <?= $member['lastname']?></p>
                <p>Firstname : <?= $member['firstname']?></p>
                <p>Email : <?= $member['email']?></p>
                <p><a href="read.php">Retour</a>  <a href="update.php?id=<?=$member['id'] ?>">Modifier</a> <a href="reception.php?id=<?= $_GET['id'] ?>">Boîte de reception</a></p>

            </section>
        </div>
    </main>
</body>
</html>