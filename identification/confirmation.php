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
    <link rel="stylesheet" href="https://monosecur.tk/CSStyle/identification/confirmation.css">
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
      <button type="button" class="toggle-btn">Confirmer Mail</button>
      <form method="post" id="confirmation" class="input-group">
        <input type="submit" name="formconfirmmail" id="formconfirmmail" class="submit-btn" value="Confirmer">
      </form>

      <?php include 'confirm.php'?>
    </div>
    <?php echo '<a class="log-btn" href="https://monosecur.tk/identification/annuler?email='.urlencode($email).'&mailconfirmkey='.$mailconfirmkey.'">Annuler</a>';?>
  </div>



</div>    
</body>
</html>