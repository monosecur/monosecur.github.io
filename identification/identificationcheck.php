<?php


   if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
        global $db;



        if(!isset($_SESSION['user_token'])){
            if(!isset($_COOKIE['user_token'])){

            }else{    
                $token = $_COOKIE['user_token'];

                $q = $db->prepare("SELECT * FROM users WHERE token = :token");
                $q->execute(['token' => $token]);
                $result = $q->fetch();

                if ($result == true){
                header("Location: https://www.monosecur.tk/identification/deconnexion");
                die();  }else{
                    setcookie('user_token', null, time()-(12 * 30 * 24 * 3600), '/');
                }
                            }
        }else{
            $token = $_SESSION['user_token'];

            $q = $db->prepare("SELECT * FROM users WHERE token = :token");
            $q->execute(['token' => $token]);
            $result = $q->fetch();

            if ($result == true){
            header("Location: https://www.monosecur.tk/identification/deconnexion");
            die();  }else{
                session_destroy();
            }
                        }


?>