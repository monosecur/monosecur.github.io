<?php if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
    global $db;
?>
<!DOCTYPE html>
<html>
<head>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9734489296512588" crossorigin="anonymous"></script>
  <title>Mono Secur</title>
  <link rel="stylesheet" href="http://monosecur.tk/CSStyle/identification/connexion.css">
  <script src="https://kit.fontawesome.com/a7819a9eea.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="hero"> 
    <nav>
      <a href="https://monosecur.tk"><img src="https://monosecur.tk/images/MonoSecurLogoWText.png"></a>

      <div class="nav-links" id="navLinks">
        <ul>
          <li><a href="https://monosecur.tk/menu_redirection">Menu Principal</a></li>
          <li><a href="error404.html">SUPPORT</a></li>
        </ul>
      </div>
    </nav>
    <div class="form-box">

      <button type="button" class="toggle-btn">Connexion</button>


      <form method="post" id="login" class="input-group">
        <input type="text" name="ltext" id="ltext" class="input-field" placeholder="Pseudo ou email" required>
        <input type="password" name="lpassword" id="lpassword" class="input-field" placeholder="mot de passe" required>
        <input type="checkbox" id="check-log" name="check-log" placeholder="Rester Connecter">Rester Connecter</input>
        <button type="submit" name="formlogin" id="formlogin" class="submit-btn">Se connecter</button>
      </form>

      <?php include 'login.php' ?>
    </div>
    <a class="log-btn" href="https://monosecur.tk/identification/enregistration">S'enregistrer</a>
  </div>
</body>
</html>