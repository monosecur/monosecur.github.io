<?php
        include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
        global $db;

        if(isset($_SESSION['user_token'])){
            $token = $_SESSION['user_token'];
        }else{
            if(isset($_COOKIE['user_token'])){
                $token = $_COOKIE['user_token'];
            }
        }

        $q = $db->prepare("SELECT * FROM token WHERE token = :token");
        $q->execute(['token' => $token]);
        $result = $q->fetch();

    
        echo'<li><a href="https://monosecur.tk/identification/deconnexion">Se Déconnecter</a></li>';
        echo'<li><a href="https://monosecur.tk/parametres">Paramètres</a></li>';

        if($result['priority'] == 'staff'){
            echo'<li><a href="https://monosecur.tk/administrateur">ADMIN</a></li>';
        }
        if($result['priority'] == 'developer'){
            echo'<li><a href="https://monosecur.tk/administrateur">ADMIN</a></li>';
            echo'<li><a href="https://dev.monosecur.tk">DEV</a></li>';
        }
        if($result['priority'] == 'owner'){
            echo'<li><a href="https://monosecur.tk/administrateur">ADMIN</a></li>';
            echo'<li><a href="https://dev.monosecur.tk">DEV</a></li>';
        }
        echo'<li><a href="error404.html">SUPPORT</a></li>';


?>