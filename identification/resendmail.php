<?php

    include 'identificationcheck.php';

    if(isset($_POST['formmail']))
    {  
        extract($_POST);
        if(!empty($ltext))
        {
            $q = $db->prepare("SELECT * FROM users WHERE email = :email");
            $q->execute(['email' => $ltext]);
            $result = $q->fetch();
            $ismailconfirmed = $result['ismailconfirmed'];
            $pseudo = $result['pseudo'];
            $email = $result['email'];
            $mailconfirmkey = $result['mailconfirmkey'];

            if($result == true)
            {
                if($ismailconfirmed == 0)
                {
                    $header="MIME-Version: 1.0\r\n";
                    $header.='From:"MonoSecur.tk"<Monosecur@no-reply.fr>'."\n";
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
                        
                        echo "Nous avons envoyer un mail à ".$email." ,merci de confirmer votre email pour vous connecter !";
                }else{echo"L'email ".$ltext." a déjà été vérifier.";}
            }else{echo"L'email ".$ltext." n'a jamais été utiliser.";}
        }
    }


?>