<?php

    $pseudo = "Flush";
    $email = "flush@mail.com";
    $password = "theflusher286";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Titre</title>
</head>
<body>
    <p>Nom : <?= $pseudo; ?></p>
    <p>Email : <?= $email; ?></p>
    <p>Mot de Passe : <?= $password; ?></p>

    <form>
        <input type="text" name="Pseudo" id="pseudo">
        <input type="text" name="Email" id="email">
        <input type="text" name="Mot de Passe" id="password">
        <input type="submit" name="Envoie du formulaire" id="formsend">
    </form>
</body>
</html>