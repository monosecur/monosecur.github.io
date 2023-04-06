<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mono Secur</title>
  <link rel="stylesheet" href="CSStyle/login_menu.css">
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300;500;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a7819a9eea.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <style>
    /* Add your custom styles here */
  </style>
</head>
<body>
  <section class="header">
    <nav>
      <a href="index.html"><img src="images/MonoSecurLogoWText.png"></a>
      <img src="images/xmark.png" class="phone-logo">
      <div class="nav-links" id="navLinks">
        <i class="fa-sharp fa-xmark" onclick="HideMenu()"></i>
        <ul>
          <li><a href="https://monosecur.tk/identification/connexion">Se connecter</a></li>
          <li><a href="error404.html">SUPPORT</a></li>
        </ul>
      </div>
      <i class="fa-sharp fa-bars" onclick="ShowMenu()"></i>
    </nav>
    <div class="text-box">
      <h1>Mono Secur</h1>
      <p class="index-text">Ce site est entièrement une fiction créée pour un serveur d'un jeu vidéo,<br>pour plus d'information cliquez sur le lien ci-dessous :</p>
      <p class="phone-text">Sorry but this website doesn't work on your web browser or device.<br>désolé mais ce site ne fonctionne pas sur votre navigateur internet ou votre appareil.</p>
      <a href="https://monolithservers.fr" target="_blank" class="hero-btn">Accéder au site officiel de Monolith.</a>
    </div>
  </section>

  <!-- JavaScript for menu buttons -->
  <script>
    var navLinks = document.getElementById("navLinks")
    function ShowMenu(){
      navLinks.style.right = "0";
    }
    function HideMenu(){
      navLinks.style.right = "-200px";
    }
  </script>
</body>
</html>
