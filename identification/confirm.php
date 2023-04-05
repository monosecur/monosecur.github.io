<?php

    include 'identificationcheck.php';

    if(isset($_GET['email'], $_GET['mailconfirmkey']) AND !empty($_GET['email']) AND !empty($_GET['mailconfirmkey'])) {

    $email = htmlspecialchars(urldecode($_GET['email']));
    $mailconfirmkey = htmlspecialchars($_GET['mailconfirmkey']);
        if(isset($_POST['formconfirmmail']))
        {
            $requser = $db->prepare("SELECT * FROM users WHERE email = ? AND mailconfirmkey = ?");
            $requser->execute(array($email,$mailconfirmkey));
            $userexist = $requser->rowCount();

            if($userexist == 1){
                $user = $requser->fetch();
                if($user['ismailconfirmed'] == 0){
                    $updateuser = $db->prepare("UPDATE users SET ismailconfirmed = 1 WHERE email = ? AND mailconfirmkey = ?");
                    $updateuser->execute(array($email,$mailconfirmkey));
                    
                    $token = $user['token'];

                    $encryptedpseudo = $user['pseudo'];
                    $decriptedpseudo = substr($encryptedpseudo, strpos($encryptedpseudo, "_") + 1);
                    $pseudo = (hex2bin($decriptedpseudo));
                    $id = $user['id'];
                    $c = $db->prepare("INSERT INTO token(token,id,last_time) VALUES(:token, :id, :last_time)");
                    $c->execute(['token' => $token,
                                     'id' => $id,
                                            'last_time' => date("U")]);

                    $upus = $db->prepare("UPDATE users SET pseudo = ? WHERE token = ?");
                    $upus->execute(array($pseudo, $token));
                    echo "Votre compte a été comfirmé avec succès !";

                    $l = $db->prepare("INSERT INTO logs(type, arg1, arg2) VALUES(:type, :arg1, :arg2)");
                    $l->execute([
                    'type' => 'account_verified',
                    'arg1' => $id,
                    'arg2' => $id
                    ]);

                    header("Location: https://monosecur.tk/identification/connexion");
                    die();
                } else {
                    echo "Votre compte a déjà été confirmé !";
                }
            } else { echo "Le compte n'existe pas !";}
                }
    }else{echo("voir avec le support code d'erreur #VDM1");}

?>