<?php


    

    if(isset($_POST['formsend'])){

        extract($_POST);

        

        if(!empty($password) && !empty($cpassword) && !empty($email)){
            

            if($password == $cpassword){
                $options = [
                    'cost' => 12,
                ];

                $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);
                
                $token = bin2hex(random_bytes(8));

                

                $c = $db->prepare("SELECT email FROM users WHERE email = :email");
                $c->execute(['email' => $email]);

                $result = $c->rowCount();
                

                if($result == 0){
                    $q = $db->prepare("INSERT INTO users(token,email,password) VALUES(:token,:email,:password)");
                $q->execute([
                    'token' => $token,
                    'email' => $email,
                    'password' => $hashpass
                ]);
                setcookie('user_token', $token, time()+(30*24*3600), "/");
                
                echo "Votre compte à été créer avec succès token:";

                }else{
                    echo "un email existe deja !";
                }

            }else{
                echo "Les deux mot de passes ne correspondent pas !";
            }

        }else{
            echo "Les champs ne sont pas tous remplies";
        }
    }

?>