<?php   if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
    global $db;
    include($_SERVER['DOCUMENT_ROOT']."/config/menucheck.php");

    $actual_time = date("U");

    $q = $db->prepare('SELECT * FROM token WHERE token = ?');
    $q->execute(array($token));
    $result = $q->rowCount();


    if($result == true){
        $set_time = $db->prepare('UPDATE token SET last_time = ? WHERE token = ?');
        $set_time->execute(array($actual_time, $token));
    }

?>