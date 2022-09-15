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
        require_once("../model/admin.php");
        $name_employees = getName();
        // $job_employees = getJob();

       

    ?>
    <?php if (empty($name_employees || $job_employees)): ?>
        <p>There is no employee.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Job</th>
                    <th>Salaire</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($name_employees as $name_employee): ?>
                <tr>
                    <td><?= $name_employee["firstname"]; ?></td>
                    <td><?= $name_employee['lastname']; ?></td>
                    <td><?= $name_employee["name"]; ?></td>
                    <td><?= $name_employee["salary"]; ?></td>

                </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
    <?php endif ?>
</html>