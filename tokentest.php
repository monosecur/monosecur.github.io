<?php
        include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
        global $db;

        $l = $db->prepare("SELECT * FROM token WHERE token = :token");
        $l->execute(['token' => 'b68caaad6a28eb5b']);
        $result = $l->fetch();


        echo"token = ".$result['token'];
        echo"id = ".$result['id'];


?>