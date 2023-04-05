<?php if (session_status() === PHP_SESSION_NONE) {
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

                if($check == true){
                    echo$check['user_session_id'];
                }else{
                    setcookie('user_token', null, time()-(12 * 30 * 24 * 3600), '/');
                    session_destroy();
                    
                            echo '<script type="text/javascript">';
                            echo 'window.location.href="https://monosecur.tk/config/menucheck.php";';
                            echo '</script>';
                            exit;
                }


?>