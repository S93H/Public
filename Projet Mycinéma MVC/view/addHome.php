<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../controller/add.php" method="POST">
        <input type="email" name="addEmail" placeholder="Entrez une adresse mail..">
        <input type="text" name="addFirstname" placeholder="Entrer un prenom..">
        <input type="text" name="addLastname" placeholder="Entrez un nom..">
        <input type="date" name="addBirth" placeholder="Entrez une date de naissance..">
        <input type="text" name="addAdress" placeholder="Entrez votre adresse..">
        <input type="text" name="addZipcode" placeholder="Entrez un code postal..">
        <input type="text" name="addCity" placeholder="Entrez une ville..">
        <input type="text" name="addCountry" placeholder="Entrez un pays..">
        <button type="submit">Valider</button>
    </form>
</body>
</html>