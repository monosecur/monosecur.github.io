<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
        $id = htmlspecialchars(urldecode($_GET['id']));


        include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
        global $db;

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

        $l = $db->prepare("INSERT INTO logs(type, arg1, arg2) VALUES(:type, :arg1, :arg2)");
        $l->execute([
        'type' => 'disconnection',
        'arg1' => $id,
        'arg2' => $result['id']
        ]);

        $request = $db->prepare("SELECT * FROM users WHERE id = :id");
        $request->execute(['id' => $id]);
        $result = $request->fetch();

        $updateuser = $db->prepare("UPDATE token SET last_time = :last_time WHERE id = :id");
        $updateuser->execute(['last_time' => "0",
                                'id' => $id]);

        $updateuser = $db->prepare("UPDATE token SET user_session_id = :user_session_id WHERE id = :id");
        $updateuser->execute(['user_session_id' => "0",
        'id' => $id]);
                                
        header("Location: https://monosecur.tk/staff/utilisateurs");
        die();



?>