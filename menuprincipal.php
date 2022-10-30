<?php session_start(); 
    include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
    global $db;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Mono Secur</title>
  <link rel="stylesheet" href="http://monosecur.tk/CSStyle/menuprincipal.css">
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
            <li><a href="https://monosecur.tk/identification/deconnexion">Se Déconnecter</a></li>
            <li><a href="error404.html">SUPPORT</a></li>
        </ul>
      </div>
    </nav>
    <?php include 'mainmenu.php'?>
  </div>
</body>
</html>