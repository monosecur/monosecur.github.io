<?php

    include ($_SERVER['DOCUMENT_ROOT']."/config/updateuser.php");
    
    if(isset($_SESSION['user_token'])){
        $token = $_SESSION['user_token'];
    }else{
        if(isset($_COOKIE['user_token'])){
            $token = $_COOKIE['user_token'];
        }
    }

    $q = $db->prepare("SELECT * FROM users WHERE token = :token");
                $q->execute(['token' => $token]);
                $result = $q->fetch();
    $q2 = $db->prepare("SELECT * FROM token WHERE token = :token");
                $q2->execute(['token' => $token]);
                $result2 = $q2->fetch();

    echo'<ul class="account">';
    echo'<li class="account-txt">Bonjour: '.$result['pseudo'].',</li>';
    echo'<li class="account-txt">Vous avez: '.$result2['wallet'].' securo.</li>';
    echo'<button type="submit" name="reaprovision" id="reaprovision" class="rea-btn">Réaprovisionner</button>';
    echo'</ul>';


?>