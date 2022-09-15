<?php
// On démarre une session
session_start();

if ($_POST)
{
    if(isset($_POST['lastname']) && !empty($_POST['lastname'])
    && isset($_POST['firstname']) && !empty($_POST['firstname'])
    && isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['pass']) && !empty($_POST['pass']))
    {
        // On inclut la connexion à la base de donéée.
        require_once('db.php');

        // On nettoie les données envoyées
        $nom = strip_tags($_POST['lastname']);
        $prenom = strip_tags($_POST['firstname']);
        $mail = strip_tags($_POST['email']);
        $pass = strip_tags($_POST['pass']);

        $sql = 'INSERT INTO `user` (`firstname`, `lastname`, `email`, `pass`) VALUES (:firstname, :lastname, :email, :pass);';
        $query = $db->prepare($sql);

        $query->bindValue(':lastname', $nom, PDO::PARAM_STR);
        $query->bindValue(':firstname', $prenom, PDO::PARAM_STR);
        $query->bindValue(':email', $mail, PDO::PARAM_STR);
        $query->bindValue(':pass', $pass, PDO::PARAM_STR);

        $query->execute();

        $_SESSION['message'] = "Compte créé avec succès";
        header('Location: read.php');
    } else {
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Création de compte</title>
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
                <h1>Créer un compte :</h1>
                    <form method="POST">
                        <div class="form-group">
                            <label for="lastname">Nom</label>
                            <input id="lastname" name="lastname" class="form-control" type="text" placeholder="Renseignez votre nom..">
                        </div>
                        <div class="form-group">
                            <label for="firstname">Prénom</label>
                            <input id="firstname" name="firstname" class="form-control" type="text" placeholder="Renseignez votre prénom..">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" name="email" class="form-control" type="email" placeholder="Renseignez votre adresse mail..">
                        </div>
                        <div class="form-group">
                            <label for="pass">Mot de passe</label>
                            <input id="pass" name="pass" class="form-control" type="password" placeholder="Définissez votre mot de passe..">
                        </div>
                        <button class="btn btn-primary">Créer</button>
                    </form>
            </section>
        </div>
    </main>
</body>
</html>

