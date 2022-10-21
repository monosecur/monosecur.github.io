<?php
    include 'database.php';
    global $db;


    if(isset($_GET['pseudo'], $_GET['mailconfirmkey']) AND !empty($_GET['pseudo']) AND !empty($_GET['mailconfirmkey'])) {
    $pseudo = htmlspecialchars(urldecode($_GET['pseudo']));
    $mailconfirmkey = htmlspecialchars($_GET['mailconfirmkey']);

    $requser = $db->prepare("SELECT * FROM users WHERE pseudo = ? AND mailconfirmkey = ?");
    $requser->execute(array($pseudo,$mailconfirmkey));
    $userexist = $requser->rowCount();

    if($userexist == 1){
        $user = $requser->fetch();
        if($user['ismailconfirmed'] == 0){
            $updateuser = $db->prepare("UPDATE users SET ismailconfirmed = 1 WHERE pseudo = ? AND mailconfirmkey = ?");
            $updateuser->execute(array($pseudo,$mailconfirmkey));
            echo "Votre compte a été comfirmé avec succès !";
        } else {
            echo "Votre compte a déjà été confirmé ! fermeture de la page.";
            echo "<script>window.close();</script>";
        }
    } else {
        echo "L'utilisateur n'existe pas !";
    }
        }else{
            echo "Erreur de vérification de mail (voir avec le support code d'erreur EVM#1))";
        }
?>