<?php

    include 'identificationcheck.php';

    if(isset($_POST['formsend'])){

        extract($_POST);

        

        if(!empty($password) || !empty($cpassword) && !empty($email) && !empty($pseudo)){
            

            if($password == $cpassword){
                $options = [
                    'cost' => 12,
                ];

                $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);
                
                $token = bin2hex(random_bytes(8));
                $mailconfirmkey = bin2hex(random_bytes(5));
                $temporarypseudo = "prepare";

                

                $c = $db->prepare("SELECT email FROM users WHERE email = :email");
                $c->execute(['email' => $email]);

                $result = $c->rowCount();
                

                if($result == 0){

                    $c = $db->prepare("SELECT email FROM users WHERE pseudo = :pseudo");
                    $c->execute(['pseudo' => $pseudo]);
    
                    $result = $c->rowCount();

                    if($result == 0){

                        $q = $db->prepare("INSERT INTO users(token, pseudo, email, mailconfirmkey, password) VALUES(:token,:pseudo,:email,:mailconfirmkey,:password)");
                        $q->execute([
                        'token' => $token,
                        'pseudo' => $temporarypseudo,
                        'email' => $email,
                        'mailconfirmkey' => $mailconfirmkey,
                        'password' => $hashpass
                        ]);

                        $newid = $db->lastInsertId();

                        $encryptedpseudo = 'user'.$newid.'_'.bin2hex($pseudo);

                        $updateuser = $db->prepare("UPDATE users SET pseudo = ? WHERE id = ?");
                        $updateuser->execute(array($encryptedpseudo, $newid));

                        $header="MIME-Version: 1.0\r\n";
                        $header.='From:"monosecur.tk"<support@monosecur.tk>'."\n";
                        $header.='Content-Type:text/html; charset="uft-8"'."\n";
                        $header.='Content-Transfert-Encoding: 8bits';

                        $message = '
                        <html>
                            <body>
                                <div align="center">
                                    <a href="https://monosecur.tk/identification/confirmation?email='.urlencode($email).'&mailconfirmkey='.$mailconfirmkey.'">Confirmez votre compte !</a>
                                    <a href="https://monosecur.tk/identification/annuler?email='.urlencode($email).'&mailconfirmkey='.$mailconfirmkey.'">Je ne suis pas à l origine de cette requete</a>
                                </div>
                            </body>
                        </html>
                        ';

                        mail($email, "confirmation de compte", $message, $header);

                        $l = $db->prepare("INSERT INTO logs(type, arg1, arg2) VALUES(:type, :arg1, :arg2)");
                        $l->execute([
                        'type' => 'account_creation',
                        'arg1' => $newid,
                        'arg2' => $newid
                        ]);

                        header("Location: https://monosecur.tk/identification/connexion");
                        die();
                        
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