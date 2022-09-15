<?php
session_start();
require_once('db.php');
if(isset($_POST['envoi_message'])) {
    if(isset($_POST['destinataire'], $_POST['message']) && !empty($_POST['destinataire']) && !empty($_POST['message'])) {
        $destinataire = htmlspecialchars($_POST['destinataire']);
        $message = htmlspecialchars($_POST['message']);

        $id_destinataire = $db->prepare('SELECT id FROM user WHERE email = ?');
        $id_destinataire->execute(array($destinataire));
        $id_destinataire = $id_destinataire->fetch();
        $id_destinataire = $id_destinataire['id'];

        $ins = $db->prepare('INSERT INTO `messages`(`id_expediteur`, `id_destinataire`, `messages`) VALUES (?,?,?)');
        $ins->execute(array($_GET['id'], $id_destinataire, $message));
        $error = 'Votre message a bien été envoyé';
    } else {
        $error = "Veuillez compléter tous les champs";
    }

}

$destinataire = $db->query('SELECT email FROM user ORDER BY email');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoi de message</title>
</head>
<body>
    <form method="POST">
        <label>Destinataires:</label>
    <select name="destinataire">
        <?php while($d = $destinataire->fetch()) { ?>
        <option><?= $d['email'] ?></option>
       <?php } ?>
        
    </select>
    <br><br>
    <textarea name="message" id="" cols="30" rows="10" placeholder="Votre message.."></textarea>
    <br><br>
    <input type="submit" value="Envoyer" name="envoi_message">
    <br><br>
    <?php if(isset($error)) { echo $error; } ?> 
    </form>
    <br>
    <a href="reception.php?id=<?= $_GET['id'] ?>">Boîte de reception</a>
    <a href="read.php">Retour</a>
</body>
</html>