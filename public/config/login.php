<?php 

    if(isset($_POST['formlogin']))
    {
        extract($_POST);
        if(!empty($ltext) && !empty($lpassword))
        {
            
            $q = $db->prepare("SELECT * FROM users WHERE email = :email");
            $q->execute(['email' => $ltext]);
            $result = $q->fetch();

            if($result == true)
            {

                $hashpassword = $result['password'];
                if(password_verify($lpassword, $hashpassword))
                {

                    echo "Comtpe trouver connection effectuée.";

                    $_SESSION['email'] = $result['email'];
                    $_SESSION['date'] = $result['date'];
                    $token = $result['token'];

                    setcookie('user_token', $token, time()+(12 * 30 * 24 * 3600), "/");


                    

                    

                }else{
                    echo "Mot de Passe invalide !";
                }

            }else{
                $q = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
                $q->execute(['pseudo' => $ltext]);
                $result = $q->fetch();

                if($result == true){

                    echo "Comtpe trouver connection effectuée.";

                    $_SESSION['email'] = $result['email'];
                    $_SESSION['pseudo'] = $result['pseudo'];
                    $_SESSION['date'] = $result['date'];
                    $token = $result['token'];

                    setcookie('user_token', $token, time()+(12 * 30 * 24 * 3600), "/");

                }else{
                    echo "Cet email ou pseudo n'a jamais été utiliser !";
                }
            }

        }else{
            echo "Email ou Mot de Passe manquant !";
        }
    }

?>