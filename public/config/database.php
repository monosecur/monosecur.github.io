<?php

    define('HOST', 'sql213.epizy.com');
    define('DB_NAME','epiz_32620880_MonoSecurDB');
    define('USER','epiz_32620880');
    define('PASS','mvBvR65IYoYYa');

    try{
        $db = new PDO("mysql:host=" . HOST . ";dbname=" .DB_NAME, USER, PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected succesfully to DB <br>";
    } catch(PDOException $e){
        echo $e;
    }

?>