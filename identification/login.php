<?php

    include 'identificationcheck.php';

    if(isset($_POST['formlogin']))
    {
        extract($_POST);
        if(!empty($ltext) && !empty($lpassword))
        {
            
            $q = $db->prepare("SELECT * FROM users WHERE email = :email");
            $q->execute(['email' => $ltext]);
            $result = $q->fetch();


            $ismailconfirmed = $result['ismailconfirmed'];



            

            

            if($result == true)
            {
                
                if($ismailconfirmed == 1) {
                    $hashpassword = $result['password'];
                    if(password_verify($lpassword, $hashpassword))
                    {
                        $token = $result['token'];
                        
                        if(isset($_POST['check-log'])){
                            setcookie('user_token', $token, time()+(12 * 30 * 24 * 3600), '/');
                            header("Location: https://monosecur.tk/menu_redirection");
                            die();
                        }else{
                            $_SESSION['user_token'] = $token;
                            header("Location: https://monosecur.tk/menu_redirection");
                            die();
                        }

                    }else{
                        echo "Mot de Passe invalide !";
                    }}else{
                        echo 'Merci de vérifier votre email ! vérifiez vos spam si vous ne trouvez pas le mail. <a href="https://monosecur.tk/identification/renvoyermail">Renvoyer le mail</a>';
                };

            }else{
                $q = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
                $q->execute(['pseudo' => $ltext]);
                $result = $q->fetch();
                $ismailconfirmed = $result['ismailconfirmed'];

                if($result == true) {
                    if($ismailconfirmed == 1){

                        $token = $result['token'];
                        
                        if(isset($_POST['check-log'])){
                            setcookie('user_token', $token, time()+(12 * 30 * 24 * 3600), '/');
                            header("Location: https://monosecur.tk/menu_redirection");
                            die();
                        }else{
                            $_SESSION['user_token'] = $token;
                            header("Location: https://monosecur.tk/menu_redirection");
                            die();
                        }

                    }else{
                        echo 'Merci de vérifier votre email ! vérifiez vos spam si vous ne trouvez pas le mail. <a href="https://monosecur.tk/identification/renvoyermail">Renvoyer le mail</a>';
                    }}else{
                        echo "Cet email ou pseudo n'a jamais été utiliser !";
                }
            }

        }else{
            echo "Email ou Mot de Passe manquant !";
        }
    }else{

    }

?>