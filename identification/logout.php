<?php
        
    if(isset($_POST['formmail'])){
        if(isset($_SESSION['user_token']) || isset($_COOKIE['user_token'])){
            setcookie('user_token', null, time()-(12 * 30 * 24 * 3600), '/');
            session_destroy();
            header("Location: https://monosecur.tk/menu_redirection");
            die();
        }else{
            header("Location: https://monosecur.tk/menu_redirection");
            die();
            }
        }

?>