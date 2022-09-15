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
        require_once("../model/movies.php");
        $movies = getMovies();
        $titres = getTitles();
        $distris = getDistris();
        $dates = getDates();
    ?>
    <?php if (empty($movies || $titres || $distris || $dates)): ?>
        <p>There is no movie.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th class="bla h1">title</th>
                    <th class="bli h1">genre</th>
                    <th class="blo h1">distributor</th>
                    <th class="h1">date</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($movies as $movie): ?>
                <tr>
                    <td class="bla"><?= $movie["title"]; ?></td>
                    <td class="bli"><?= $movie["g_name"]; ?></td>
                    <td class="blo"><?= $movie["d_name"]; ?></td>

                    
                </tr>
            <?php endforeach; ?>

            <?php foreach($titres as $titre): ?>
                <tr>
                    <td class="bla"><?= $titre["title"]; ?></td>
                    <td class="bli"><?= $titre["g_name"]; ?></td>
                    <td class="blo"><?= $titre["d_name"]; ?></td>

                    
                </tr>
            <?php endforeach; ?>

            <?php foreach($distris as $distri): ?>
                <tr>
                    <td class="bla"><?= $distri["title"]; ?></td>
                    <td class="bli"><?= $distri["g_name"]; ?></td>
                    <td class="blo"><?= $distri["d_name"]; ?></td>

                    
                </tr>
            <?php endforeach; ?>


            <?php foreach($dates as $date): ?>
                <tr>
                    <td class="bla"><?= $date["title"]; ?></td>
                    <td class="bli"><?= $date["g_name"]; ?></td>
                    <td class="blo"><?= $date["d_name"]; ?></td>
                    <td><?= $date['date_begin']; ?></td>
                    

                    
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <?php endif ?>
</html>