<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
        include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
        global $db; 

        if(isset($_SESSION['user_token'])){
            $token = $_SESSION['user_token'];
        }else{
            if(isset($_COOKIE['user_token'])){
                $token = $_COOKIE['user_token'];
            }
        }
        
    if(isset($_POST['formmail'])){
        if(isset($_SESSION['user_token']) || isset($_COOKIE['user_token'])){

            $updateuser = $db->prepare("UPDATE token SET last_time = :last_time WHERE token = :token");
            $updateuser->execute(['last_time' => "0",
                                    'token' => $token]);
    
            $updateuser = $db->prepare("UPDATE token SET user_session_id = :user_session_id WHERE token = :token");
            $updateuser->execute(['user_session_id' => "0",
            'token' => $token]);

            setcookie('user_token', null, time()-(12 * 30 * 24 * 3600), '/');
            session_destroy();

            $q = $db->prepare("SELECT * FROM users WHERE token = :token");
            $q->execute(['token' => $token]);
            $result = $q->fetch();

            $l = $db->prepare("INSERT INTO logs(type, arg1, arg2) VALUES(:type, :arg1, :arg2)");
            $l->execute([
            'type' => 'disconnection',
            'arg1' => $result['id'],
            'arg2' => $result['id']
            ]);

            header("Location: https://monosecur.tk/menu_redirection");
            die();
        }else{
            header("Location: https://monosecur.tk/menu_redirection");
            die();
            }
        }

?>