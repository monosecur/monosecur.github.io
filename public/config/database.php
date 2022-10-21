<?php

    define('HOST', 'localhost');
    define('DB_NAME','id19730616_monosecurdb');
    define('USER','id19730616_monosecuradmin');
    define('PASS','Gcwe$4Eo+0e8m_11');

    try{
        $db = new PDO("mysql:host=" . HOST . ";dbname=" .DB_NAME, USER, PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo $e;
    }

?>

