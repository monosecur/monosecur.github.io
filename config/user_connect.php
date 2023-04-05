<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
            include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
            global $db; 

            if(isset($_SESSION['user_token'])){
                $token = $_SESSION['user_token'];
            }else{
                if(isset($_COOKIE['user_token'])){
                    $token = $_COOKIE['user_token'];
                }
            }

            include ($_SERVER['DOCUMENT_ROOT']."/config/updateuser.php");

            

            




?>
<area id="cu">
<script>
          setInterval('uc()', 1000);
                  function uc(){
                          $('#cu').load('https://monosecur.tk/config/check_user.php');
                  }
</script>
</area>