<?php

//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;
//require 'phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
//require'phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';
//require'phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
    

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
                        
                        include 'hello.php';
                        //require 'phpmailer/vendor/autoload.php';

                        //$mail = new PHPMailer(true);

                       // try {
                            //Server settings
                           // $mail->SMTPDebug = 2;                      //Enable verbose debug output
                           // $mail->isSMTP();                                            //Send using SMTP
                           // $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                           // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                           // $mail->Username   = 'darkside.monolith@gmail.com';                     //SMTP username
                            //$mail->Password   = 'kvtjguknaeaptcks';                               //SMTP password
                          //  $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                         //   $mail->Port       = 587;///465                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                            //Recipients
                           // $mail->setFrom('darkside.monolith@gmail.com', 'Mono Secur');
                          //  $mail->addAddress($email);     //Add a recipient


                            //Content
                           // $mail->isHTML(true);                                  //Set email format to HTML
                           // $mail->Subject = 'Here is the subject';
                           // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                           // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                           // $mail->send();
                          //  echo 'Message has been sent';
                     //   } catch (Exception $e) {
                     //       echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                     //   }

                        //$mheader="MIME-VERSION: 1.0\r\n";
                        //$mheader.='From: Mono Secur <darkside.monolith@gmail.com>'."\n";
                        //$mheader.='Content-Type:text/html; charset="uft-8"'."\n";
                        //$mheader.='Content-Transfer-Encoding: 8bit';

                        //$mmessage='
                        
                            //<html>
                                //<body>
                                    //<div align="center">
                                        //<a href="https://monosecur.epizy.com/public/emailverify.php?token='.urlencode($token).'">Confirmez votre adresse mail !</a>
                                    //</div>
                                //</body>
                            //</html>
                        
                        //';

                        if (mail($email, "Comfirmer votre addresse mail", $mmessage, $mheader))
                            echo "Nous avons envoyer un mail à ".$email.", merci de confirmer votre email pour vous connecter !";
                        else
                            echo "stuff went wrong";
                        
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