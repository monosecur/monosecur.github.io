<?php

    include 'identificationcheck.php';
    
    if(isset($_POST['formcancel'])){
        if(isset($_GET['email'], $_GET['mailconfirmkey']) AND !empty($_GET['email']) AND !empty($_GET['mailconfirmkey'])) {
            $email = htmlspecialchars(urldecode($_GET['email']));
            $mailconfirmkey = htmlspecialchars($_GET['mailconfirmkey']);
            $requser = $db->prepare("SELECT * FROM users WHERE email = ? AND mailconfirmkey = ?");
            $requser->execute(array($email,$mailconfirmkey));
            $userexist = $requser->rowCount();
            if($userexist == 1){
                $user = $requser->fetch();
                if($user['ismailconfirmed'] == 0){
                $delete = $db->prepare("DELETE FROM users WHERE email = ? AND mailconfirmkey = ?");
                $delete->execute(array($email,$mailconfirmkey));
                echo("le compte associé à l'adresse ".$email." a été annuler avec succès !");
                }else{echo"Le compte associé à l'adresse ".$email." à déjà été validé !Si vous n'êtes pas à l'origine de cette validation contactez le support.";}
            }else{echo("Cette email n'a jamais été utiliser !");}
        }else{echo("voir avec le support code d'erreur #ACDC1");}
    }


?>