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

    <form method="post">
        <input type="text" name="Pseudo" id="pseudo" placeholder="Pseudonyme">
        <input type="text" name="Email" id="email" placeholder="Email">
        <input type="text" name="Mot de Passe" id="password" placeholder="Mot de Passe">
        <input type="submit" name="Envoie du formulaire" id="formsend">
    </form>

    <?php
    
        if(isset($_POST['formsend'])){
            echo "Formulaire envoyer !";
        }
    
    ?>
</body>
</html>