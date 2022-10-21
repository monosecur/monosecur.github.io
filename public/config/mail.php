<?php


    $to = "mail@gmail.com";

    $subject = "Lien pour vérifier votre compte MonoSecur";

    $message = "Nous avons reçu une demande de création de compte depuis votre mail si vous êtes à l'origine de cette demande merci de cliquer sur ce lien :";

    $message = wordwrap($message, 70, "\r\n");

    $headers = [
        "From" => "MonoSecur@no-reply.fr",
        "Reply-To" => "monosecur@no-reply.fr",
        "Content-Type" => "text/html; charset=uft-8"
    ];

    mail($to, $subject, $message, $headers);

?>