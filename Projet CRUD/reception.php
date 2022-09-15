<?php
session_start();
require_once('db.php');


$msg = $db->prepare('SELECT * FROM messages WHERE id_destinataire = ?');
$msg->execute(array($_GET['id']));
$msg_nbr = $msg->rowCount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réception</title>
</head>
<body>
    <a href="message.php?id=<?= $_GET['id'] ?>">Nouveau message</a> <br><br><br>
    <h3>Votre boîte de reception:</h3>
    <?php
        if($msg_nbr == 0) { echo "Vous n'avez aucun message...";}
        while($m = $msg->fetch()) { 
            $p_exp = $db->prepare('SELECT email FROM user WHERE id = ?');
            $p_exp->execute(array($m['id_expediteur']));
            $p_exp = $p_exp->fetch();
            $p_exp = $p_exp['email'];

        ?>
        <b><?= $p_exp ?></b>  vous a envoyé: <br>
        <?=  nl2br($m['messages']) ?><br>
        ------------------------------------------------- <br> 
    <?php } ?>
    <a href="read.php">Quitter</a>
</body>
</html>