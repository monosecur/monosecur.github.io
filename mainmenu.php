<?php

    include ($_SERVER['DOCUMENT_ROOT']."/config/menucheck.php");
    
    if(isset($_SESSION['user_token'])){
        $token = $_SESSION['user_token'];
        echo"session :";
        echo$_SESSION['user_token'];
    }else{
        if(isset($_COOKIE['user_token'])){
            $token = $_COOKIE['user_token'];
            echo"cookie :";
            echo$_COOKIE['user_token'];
        }
    }


?>