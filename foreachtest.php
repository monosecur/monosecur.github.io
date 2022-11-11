<?php
        include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
        global $db;

        echo'<!DOCTYPE html>
        <html>
        <head>
          <title>Mono Secur</title>
          <link rel="stylesheet" href="http://monosecur.tk/CSStyle/foreachtest.css">
          <script src="https://kit.fontawesome.com/a7819a9eea.js" crossorigin="anonymous"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
          <link rel="preconnect" href="https://fonts.googleapis.com"> 
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
          <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300;500;700&display=swap" rel="stylesheet">
        </head>
        <body class="hero">';


        echo'<div class="list">';

        include($_SERVER['DOCUMENT_ROOT']."/config/updateuser.php");
        $user_time = 30;

        $q = $db->query("SELECT * FROM token");

        $online_user = 0;
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
        echo'</div>';
        echo"<script>;
        setInterval('test_user()', 1000);
        function test_user(){
                $('.list').load('https://monosecur.tk/load_message.php');
        }
        </script>";
        echo'</body>';



?>