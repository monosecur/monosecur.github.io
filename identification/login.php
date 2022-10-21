<?php 

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

                        echo "Comtpe trouver connection effectuée.";
                        $token = $result['token'];

                        setcookie('user_token', $token, time()+(12 * 30 * 24 * 3600), '/');


                        

                        

                    }else{
                        echo "Mot de Passe invalide !";
                    }}else{
                        echo 'Merci de vérifier votre email ! vérifiez vos spam si vous ne trouvez pas le mail <a href="https://www.monosecur.tk/identification/resendmail>Reenvoyer le mail</a>';
                };

            }else{
                $q = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
                $q->execute(['pseudo' => $ltext]);
                $result = $q->fetch();
                $ismailconfirmed = $result['ismailconfirmed'];

                if($ismailconfirmed == 1) {        
                    if($result == true){

                        echo "Comtpe trouver connection effectuée.";


                        $token = $result['token'];

                        setcookie('user_token', $token, time()+(12 * 30 * 24 * 3600), '/');

                    }else{
                        echo "Cet email ou pseudo n'a jamais été utiliser !";
                    }}else{
                        echo "Merci de vérifier votre email ! vérifiez vos spam si vous ne trouvez pas le mail";
                };
            }

        }else{
            echo "Email ou Mot de Passe manquant !";
        }
    }

?>