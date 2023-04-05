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



            $request = $db->prepare("SELECT * FROM token WHERE token = :token AND user_session_id = :user_session_id");
            $request->execute(['token' => $token,
                                'user_session_id' => session_id()]);
            $check = $request->fetch();

            if($check == false){

                setcookie('user_token', null, time()-(12 * 30 * 24 * 3600), '/');
                session_destroy();

                
                        echo '<script type="text/javascript">';
                        echo 'window.location.href="https://monosecur.tk/config/menucheck.php";';
                        echo '</script>';
                        exit;

            }

            $q = $db->query("SELECT * FROM token");

            $user_time = 600;
            $actual_time = time();
            foreach($q as $user){

                $max_time = $user['last_time'] + $user_time;

                if($actual_time < $max_time){
                $update_status = $db->prepare('UPDATE users SET status = ? WHERE token = ?');
                $update_status->execute(array('online', $user['token']));
                                                
                }else{

                    $q = $db->prepare("SELECT * FROM users WHERE token = :token");
                    $q->execute(['token' => $user['token']]);
                    $result = $q->fetch();


                $update_status = $db->prepare('UPDATE users SET status = ? WHERE token = ?');
                $update_status->execute(array('offline', $user['token'])); 

                }
                
            }


?>