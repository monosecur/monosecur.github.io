<?php

    if (!defined('HOST')) define('HOST', 'localhost');
    if(!defined('PORT')) define('PORT', '3306');
    if (!defined('DB_NAME')) define('DB_NAME','monosecur_db');
    if (!defined('USER')) define('USER','bob31');
    if (!defined('PASS')) define('PASS','w_3Fj18m4');

    try{
        $db = new PDO("mysql:host=" . HOST . ";port=" . PORT . ";dbname=" .DB_NAME, USER, PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo $e;
    }

?>

