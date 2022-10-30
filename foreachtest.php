<?php
        include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
        global $db;

        $q = $db->query("SELECT * FROM items");

        echo'<!DOCTYPE html>
        <html>
        <head>
          <title>Mono Secur</title>
          <link rel="stylesheet" href="http://monosecur.tk/CSStyle/foreachtest.css">
          <script src="https://kit.fontawesome.com/a7819a9eea.js" crossorigin="anonymous"></script>
          <link rel="preconnect" href="https://fonts.googleapis.com"> 
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
          <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300;500;700&display=swap" rel="stylesheet">
        </head>
        <body class="hero">';

        echo'<div class="list">';
        foreach($q as $item){

                $name = $item['name'];
                $description = $item['description'];
                $price = $item['price'];
                echo"<div>";
                echo'<ul class="item">'.$name.'';
                echo'<li>'.$description.'</li>';
                echo'<li>Prix : '.$price.'</li>';
                echo"</li>";
                echo"</div>";
                
                
        }
        echo'</div>
        </body>';



?>