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
        <button type="button" class="toggle-btn">Log In</button>
      </div>

      <form method="post" id="login" class="input-group">
        <input type="text" name="ltext" id="ltext" class="input-field" placeholder="Pseudo or email">
        <input type="password" name="lpassword" id="lpassword" class="input-field" placeholder="Enter Password">
        <input type="checkbox" class="check-box"><span>Remember Password</span>
        <button type="submit" name="formlogin" id="formlogin" class="submit-btn">Login</button>
      </form>

      <?php include 'login.php' ?>
    </div>
  </div>
</body>
</html>