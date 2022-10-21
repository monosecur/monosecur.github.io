<?php



require_once 'vendor/autoload.php';


// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'tls'))
  ->setUsername('darkside.monolith@gmail.com')
  ->setPassword('lfohlujthgugckkf')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(['MonoSecur@DoNotReply.com' => 'Mono Secur'])
  ->setTo(['hattamuhammad286@gmail.com', 'kingconstrushen@gmail.com' => 'U SOMEONE'])
  ->setBody('Here is the message itself')
  ;

// Send the message
$result = $mailer->send($message);







?>