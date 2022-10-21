<?php
        include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
        global $db;

        if(isset($_GET['mail']) AND !empty($_GET['mail'])){

        $email = htmlspecialchars(urldecode($_GET['email']));

        $header="MIME-Version: 1.0\r\n";
        $header.='From:"MonoSecur.tk"<Monosecur@no-reply.fr>'."\n";
        $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfert-Encoding: 8bits';

        $message = '
        <html>
            <body>
                <div align="center">
                    <a href="www.monosecur.tk/public/config/confirmation.php?pseudo='.urlencode($pseudo).'&mailconfirmkey='.$mailconfirmkey.'">Confirmez votre compte !</a>
                </div>

            </body>
        </html>
        ';

        mail($email, "confirmation de compte", $message, $header);

        
        echo "Nous avons envoyer un mail à ".$email.", merci de confirmer votre email pour vous connecter !";
        }



?>