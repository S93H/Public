<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/style.css">
    <title>Document</title>
</head>
<body class="bodymember">
    <?php
        require_once("../model/members.php");
        $members = getMembers();
    ?>
    <?php if (empty($members)): ?>
        <p>There is no member.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th class="bla h1">Firstname</th>
                    <th class="bli h1">Lastname</th>
                    <th class="blo h1">Email</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($members as $member): ?>
                <tr>
                    <td class="bla"><?= $member["firstname"]; ?></td>
                    <td class="bli"><?= $member["lastname"]; ?></td>
                    <td class="blo"><?= $member["email"]; ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif ?>
</html>