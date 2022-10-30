<?php if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
    global $db;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Mono Secur</title>
  <link rel="stylesheet" href="//monosecur.tk/CSStyle/identification/enregistration.css">
  <script src="https://kit.fontawesome.com/a7819a9eea.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<body>

  <div class="hero"> 
    <nav>
      <a href="https://www.monosecur.tk"><img src="https://monosecur.tk/images/MonoSecurLogoWText.png"></a>

      <div class="nav-links" id="navLinks">
        <ul>
          <li><a href="https://monosecur.tk/menu_redirection">Menu Principal</a></li>
          <li><a href="error404.html">SUPPORT</a></li>
        </ul>
      </div>
    </nav>
    <div class="form-box">

        <button type="button" class="toggle-btn">Enregistration</button>

      <form method="post" id="register" class="input-group">
      <input type="text" name="pseudo" id="pseudo" class="input-field" placeholder="Pseudo" required>
        <input type="email" name="email" id="email" class="input-field" placeholder="Email" required>
        <input type="password" name="password" id="password" class="input-field" placeholder="Mot de Passe" required>
        <input type="password" name="cpassword" id="cpassword" class="input-field" placeholder="Vérifier Mot de Passe" required>
        <input type="checkbox" name="" id="" class="check-box" required>j'accepte les <span><a href="">terms de conditions</a></span>
        <input type="submit" name="formsend" id="formsend" class="submit-btn" value="Créer un compte">
      </form>

      <?php include 'register.php'?>
    </div>
    <a class="log-btn" href="http://monosecur.tk/identification/connexion">Se connecter</a>
  </div>
</body>
</html>