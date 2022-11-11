<?php if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
    global $db;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9734489296512588" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://monosecur.tk/CSStyle/identification/annuler.css">
    <title>Mono Secur</title>
</head>
<body>
<div class="hero">
    <nav>
      <a href="https://www.monosecur.tk"><img src="https://monosecur.tk/images/MonoSecurLogoWText.png"></a>

      <div class="nav-links" id="navLinks">
        <ul>
          <li><a href="https://monosecur.tk/menu_redirection">Menu Principal</a></li>
          <li><a href="https://monosecur.tk/identification/connexion">Se Connecter</a></li>
          <li><a href="error404.html">SUPPORT</a></li>
        </ul>
      </div>
    </nav>
    <div class="form-box">
      <button type="button" class="toggle-btn" value=>Cliquer sur annuler si vous n'avez jamais entrer votre email sur ce site</button>

      <form method="post" id="cancel" class="input-group">
        <input type="submit" name="formcancel" id="formcancel" class="submit-btn" value="Annuler">
      </form>
      <?php include 'cancel.php'?>
    </div>

    </div>



</div>    
</body>
</html>