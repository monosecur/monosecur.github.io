<?php session_start(); 
    include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
    global $db;
?>
<!DOCTYPE html>
<html>
<head>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9734489296512588" crossorigin="anonymous"></script>
  <title>Mono Secur</title>
  <link rel="stylesheet" href="http://monosecur.tk/CSStyle/menuprincipal.css">
  <script src="https://kit.fontawesome.com/a7819a9eea.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
        <?php include ($_SERVER['DOCUMENT_ROOT']."/config/navlinks.php");?>
        </ul>
      <div class="check-session">
      <script>
          setInterval('user_session()', 1000);
                  function user_session(){
                          $('.check-session').load('https://monosecur.tk/config/checksessionid.php');
                  }
        </script>
      </div>
      </div>
    </nav>
    <?php include 'mainmenu.php'?>
    
    <ul class="users-count">
      <li class="user-txt">Actuellement 0 membres sont connecter.</li>
        <script>
          setInterval('user_count()', 1000);
                  function user_count(){
                          $('.users-count').load('https://monosecur.tk/config/usercheck.php');
                  }
        </script>
    </ul>
    <div class="list">
      <div>
        <a href="https://monosecur.tk/offre/operator">
        <button class="item">Operator<br>Cette offre vous permet d'avoir des operateurs et un dispatch pour une durée défini.</button>
        </a>
      </div>
      <div>
        <button class="item">/!\ NON DISPONIBLE /!\<br>Travel<br>Cette offre vous permet d'avoir un camion de transport escorter par des opérateur et un dispatch, pour transporter tout type de marchandise d'un point A à un point B.</button>
      </div>
      <div>
        <button class="item">/!\ NON DISPONIBLE /!\<br>Security<br>Cette offre vous permet d'avoir des operateur et un dispatch pour vous escorter pour une durée défini.</button>
      </div>
      <div>
        <button class="important-item">/!\ NON DISPONIBLE /!\<br>/!\NON DISPONIBLE AU GRAND PUBLIC/!\<br>Evacuation<br>Cette offre vous permet d'avoir des operateur et un dispatch pour évacuer des personnes ou des biens.</button>
      </div>
      <div>
        <button class="important-item">/!\ NON DISPONIBLE /!\<br>/!\NON DISPONIBLE AU GRAND PUBLIC/!\<br>Tactical Support<br>Cette offre vous permet d'avoir des operateur et un dispatch pour un support tactique.</button>
      </div>
      
      
    </div>
</div>
</body>
</html>