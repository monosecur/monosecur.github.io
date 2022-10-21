<?php session_start(); 
    include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
    global $db;

    


    

?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="http://www.monosecur.tk/CSStyle/identification.css">
  <script src="https://kit.fontawesome.com/a7819a9eea.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="hero"> 
    <div class="nav-links" id="navLinks">
      <ul>
        <li><a href="login_menu">MENU PRINCIPALE</a></li>
        <li><a href="error404.html">SUPPORT</a></li>
      </ul>
    </div>
    <a href="index.html"><img src="images/MonoSecurLogoWText.png"></a>
    <div class="form-box">
      <div class="button-box">
        <div id="btn"></div>
        <button type="button" class="toggle-btn">Enregistration</button>
      </div>

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
  </div>
  <a href="http://monosecur.tk/identification/connexion">Ce connecter</a>
</body>
</html>