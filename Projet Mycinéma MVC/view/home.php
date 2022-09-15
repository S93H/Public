<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/style.css">
    <title>Home</title>
</head>

<body>
    <nav>
        <div class="container">
            <div class="Bigbox1">
                <div class="box1">
                    <form action="../controller/movies.php">
                        <p>Rechercher un film par (distributeur)</p>
                        <input class="distributor" name="distri" type="text" placeholder="Recherhcer un film par son distributeur..">
                        <button><img src="../view/img/movie-ticketcol.png" height="35em" width="35em" alt=""></button>
                    </form>
                </div>
                <div class="box2">
                    <form action="../controller/movies.php">
                        <p>Rechercher un film par (genre)</p>
                        <input class="gender" name="genre" type="text" placeholder="Rechercher un film par son genre..">
                        <button><img src="../view/img/movie-ticketcol.png" height="35em" width="35em" alt=""></button>
                    </form>
                </div>
            </div>
            
            <div class="box3">
                <h1>Cinéma</h1>
                <form action="../controller/movies.php">
                    <p>Rechercher un film par (titre)</p>
                    <input class="titre" name="title" type="text" placeholder="Rechercher un titre de film..">
                    <button><img src="../view/img/movie-ticketcol.png" height="35em" width="35em" alt=""></button>
                </form>
            </div>
            <div class="Bigbox2">
                <div class="box4">
                    <form action="../controller/members.php" method="GET">
                        <p>Rechercher un membre (nom / prénom)</p>
                        <input class="membre" name="name" type="text" placeholder="Rechercher un abonné..">
                        <button type="submit"><img src="../view/img/movie-ticketcol.png" height="35em" width="35em" alt=""></button>
                    </form>
                </div>
                <div class="box5">
                    <form action="../controller/movies.php">
                        <p>Rechercher un film par (date)</p>
                        <input class="session" name="date" type="date">
                        <button><img src="../view/img/movie-ticketcol.png" height="35em" width="35em" alt=""></button>
                    </form>
                </div>
            </div>


        </div>
    </nav>
    <div class="section">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/LEqbMl-lqfs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <?php
    //var_dump($_GET);
    ?>
</body>

</html>