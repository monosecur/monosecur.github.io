<?php session_start(); 
    include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
    global $db;
    include ($_SERVER['DOCUMENT_ROOT']."/config/updateuser.php");
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/a7819a9eea.js" crossorigin="anonymous"></script>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9734489296512588" crossorigin="anonymous"></script>
  <title>Mono Secur</title>
  <link rel="stylesheet" href="http://monosecur.tk/CSStyle/offre/operator.css">
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
              <li><a href="https://monosecur.tk/menuprincipal">Menu Principal</a></li>
              <li><a href="https://monosecur.tk/parametres">Paramètres</a></li>
              <li><a href="error404.html">SUPPORT</a></li>
        </ul>
      </div>
    </nav>
    <div class="form">
      <div class="form-value">
        <div class="value-button" id="decrease" onclick="decreaseOperateurValue()" value="Decrease Value">-</div>
        <input type="number" id="number" value="1" disabled/>
        <div class="value-button" id="increase" onclick="increaseOperateurValue()" value="Increase Value">+</div>
        <script src="https://monosecur.tk/JScript/operator-operateur.js"></script>
      </div>
      <div class="form-time">
        <div class="value-button" id="decreasetime" onclick="decreaseTimeValue()" value="Decrease Value">-</div>
        <input type="hour" id="hour" value="0" disabled/>
        <input type="minute" id="minute" value="10" disabled/>
        <div class="value-button" id="increasetime" onclick="increaseTimeValue()" value="Increase Value">+</div>
        <script src="https://monosecur.tk/JScript/operator-time.js"></script>
      </div>
      <input type="number" id="result" value="0" disabled/>
      <script>
         setInterval('refresh_result()', 1000);
        function refresh_result(){
                $('#result').load('https://monosecur.tk/JScript/refresh-result.php');
        }
      </script>
    </div>
</div>
</body>
</html>