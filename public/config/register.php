<?php


    

    if(isset($_POST['formsend'])){

        extract($_POST);

        

        if(!empty($password) && !empty($cpassword) && !empty($email) && !empty($pseudo)){
            

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

                    $c = $db->prepare("SELECT email FROM users WHERE pseudo = :pseudo");
                    $c->execute(['pseudo' => $pseudo]);
    
                    $result = $c->rowCount();

                    if($result == 0){

                        $q = $db->prepare("INSERT INTO users(token, pseudo, email,password) VALUES(:token,:pseudo,:email,:password)");
                        $q->execute([
                        'token' => $token,
                        'pseudo' => $pseudo,
                        'email' => $email,
                        'password' => $hashpass
                        ]);
                        echo "Vous pouvez désormais vous connecter.";
                    }else{
                        echo "Ce pseudo est déjà utiliser !";
                    }


                }else{
                    echo "cet email est déjà utiliser !";
                }

            }else{
                echo "Les deux mot de passes ne correspondent pas !";
            }

        }else{
            echo "Les champs ne sont pas tous remplies";
        }
    }

?>