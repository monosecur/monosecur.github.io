<?php


$header="MIME-Version: 1.0\r\n";
$header.='From:"MonoSecur.tk"<no-reply@monosecur.tk>'."\n";
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
$email = 'hattamuhammad286@gmail.com';

mail($email, "confirmation de compte", $message, $header);

?>