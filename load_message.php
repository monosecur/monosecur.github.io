<?php
        include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
        global $db;

$q = $db->query("SELECT * FROM token");

$online_user = 0;
$user_time = 60;
$actual_time = time("U");

foreach($q as $user){

    $max_time = $user['last_time'] + $user_time;

    if($actual_time < $max_time){
       $online_user = $online_user + 1;
       $update_status = $db->prepare('UPDATE users SET status = ? WHERE token = ?');
       $update_status->execute(array('online', $user['token']));
                                       
    }else{
       $update_status = $db->prepare('UPDATE users SET status = ? WHERE token = ?');
       $update_status->execute(array('offline', $user['token']));
    }
       
}
echo"Nombre d'utilisateur en ligne = ".$online_user;


?>