<?php session_start();
    include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
    global $db;


    if(isset($_COOKIE['user_token'])){
        $l = $db->prepare("SELECT * FROM token WHERE token = :token");
        $l->execute(['token' => $_COOKIE['user_token']]);
        $result = $l->fetch();

        if($result == true){
            header("Location: https://monosecur.tk/menuprincipal");
            die();
        }else{
                header("Location: https://monosecur.tk/login_menu");
                die();
                }   
    }else{
            if(isset($_SESSION['user_token'])){
                $l = $db->prepare("SELECT * FROM token WHERE token = :token");
                $l->execute(['token' => $_SESSION['user_token']]);
                $result = $l->fetch();

                if($result == true){
                    header("Location: https://monosecur.tk/menuprincipal");
                    die();
                }else{
                        header("Location: https://monosecur.tk/login_menu");
                        die();
                        }   
                    }else{
                        header("Location: https://monosecur.tk/login_menu");
                        die();
                    }
        }
?>