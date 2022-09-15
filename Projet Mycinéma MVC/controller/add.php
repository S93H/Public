<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once("../model/add.php");
        $adds = add($email, $firstname, $lastname , $birthdate, $address, $zipcode, $city, $country);
    ?>
    <?php if (empty($adds)): ?>
        <p>No movement</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($adds as $add): ?>
                <tr>
                    <td><?= $add["Email"]; ?></td>
                    <td><?= $add["lastname"]; ?></td>
                    <td><?= $add["email"]; ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif ?>
</html>