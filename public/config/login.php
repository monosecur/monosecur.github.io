<?php 

    if(isset($_POST['formlogin']))
    {
        extract($_POST);
        if(!empty($lemail) && !empty($lpassword))
        {
            
            $q = $db->prepare("SELECT * FROM users WHERE email = :email");
            $q->execute(['email' => $lemail]);
            $result = $q->fetch();

            if($result == true)
            {

                $hashpassword = $result['password'];
                if(password_verify($lpassword, $hashpassword))
                {

                    echo "Comtpe trouver connection effectuée.";

                    $_SESSION['email'] = $result['email'];
                    $_SESSION['date'] = $result['date'];


                    

                    

                }else{
                    echo "Mot de Passe invalide !";
                }

            }else{
                echo "l'email " . $lemail . " n'a jamais été utiliser !";
            }

        }else{
            echo "Email ou Mot de Passe manquant !";
        }
    }

?>