<?php

    if (!defined('HOST')) define('HOST', 'localhost');
    if (!defined('DB_NAME')) define('DB_NAME','id19730616_monosecurdb');
    if (!defined('USER')) define('USER','id19730616_monosecuradmin');
    if (!defined('PASS')) define('PASS','Gcwe$4Eo+0e8m_11');

    try{
        $db = new PDO("mysql:host=" . HOST . ";dbname=" .DB_NAME, USER, PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo $e;
    }

?>

