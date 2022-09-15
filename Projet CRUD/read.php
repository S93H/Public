<?php
session_start();
// On inclut la connexion à la base de donéée.
require_once('db.php');

$sql = 'SELECT * FROM user';

//On prépare la requette
$query = $db->prepare($sql);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau assiociatif
// PDO::FETCH_ASSOC permet d'afficher uniquement les informations qui sont précéder d'un titre des différentes colonnes de la db . ce n'est pas obligatoire !
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Liste des utilisateurs</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
            <?php
                    if(!empty($_SESSION['erreur'])) {
                        echo '<div class="alert alert-danger" role="alert">
                        '. $_SESSION['erreur'].'
                        </div>';
                    $_SESSION['erreur'] = "";
                    }
                ?>

            <?php
                    if(!empty($_SESSION['message'])) {
                        echo '<div class="alert alert-success" role="alert">
                        '. $_SESSION['message'].'
                        </div>';
                    $_SESSION['message'] = "";
                    }
                ?>
                <h1>Tous les utilisateurs :</h1>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php
                        // On boucle sur la variable $result
                            foreach($result as $member) {
                        ?> 
                        <tr>
                            <td><?= $member['id'] ?></td>
                            <td><?= $member['firstname'] ?></td>
                            <td><?= $member['lastname'] ?></td>
                            <td><?= $member['email'] ?></td>
                            <td><a href="details.php?id=<?= $member['id'] ?>">Profil</a> <a href="message.php?id=<?= $member['id'] ?>">Envoyer un message</a> <a href="update.php?id=<?= $member['id'] ?>">Modifier</a> <a href="delete.php?id=<?= $member['id'] ?>">Supprimer</a></td>
                        </tr> 
                        <?php     
                            }
                        ?>
                        

                    </tbody>
                </table>
                <a href="create.php" class="btn btn-primary">Créer un compte</a>
            </section>
        </div>
    </main>
</body>
</html>

