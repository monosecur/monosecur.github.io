<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="with=device-width, initial-scale=1.0">
  <title class="indextitle">MonoSecur</title>
  <link rel="stylesheet" href="CSStyle/index.css">
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300;500;700&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/a7819a9eea.js" crossorigin="anonymous"></script>

</head>
<body>
  <section class="header">
    <nav>
      <a href="index.html"><img src="images/MonoSecurLogoWText.png"></a>
      
      <?php
      echo $_COOKIE['user_token'];
      //if(isset($_COOKIE['user_token'])){
        //$q = $db->prepare("SELECT * FROM users WHERE token = :token");
        //$q->execute(['token' => $_COOKIE['user_token']]);
        //$result = $q->fetch();
        //echo "coded";
        //echo var_dump($_COOKIE['user_token']);
      //}
      //if($result == true){
        //echo "Logged";
      ?>
        <!--Enter token-->
      <?php
      //}else{
      ?>
        <!--<h1>Please Log In</h1>-->
      <?php

      //echo var_dump($_COOKIE['user_token']);
      //}
      ?>

      <img src="images/xmark.png" class="phone-logo">
      <div class="nav-links" id="navLinks">
        <i class="fa-sharp fa-xmark" onclick="HideMenu()"></i>
        <ul>
          <li><a href="register.php">S'identifier</a></li>
          <li><a href="error404.html">SUPPORT</a></li>
        </ul>
      </div>
      <i class="fa-sharp fa-bars" onclick="ShowMenu()"></i>
    </nav>

<div class="text-box">

  <h1>Mono Secur</h1>
  <p class="index-text">Service Provided by Dark Side.<br>Service proposer par Dark Side.</p>
  <p class="phone-text">Sorry but this website don't work on you'r web browser or device.<br>désolé mais ce site ne fonctionne pas sur votre navigateur internet ou votre appareil.</p>
  <a href="https://monolithservers.com" class="hero-btn">Acces to Monolith official website. Acces au site officiel de Monolith.</a>
</div>

  </section>


<!----Javascript for menu buttons---->
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