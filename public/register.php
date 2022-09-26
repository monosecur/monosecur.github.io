<?php session_start(); 
    include 'config/database.php';
    global $db;

    


    

?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="CSStyle/style.css">
  <script src="https://kit.fontawesome.com/a7819a9eea.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<body>

    

    <?php
        if(isset($_SESSION['user_token']))
        {
            ?>

            <p>Votre token : <?= $_SESSION['user_token']; ?></p>
            

            <?php
    
        }else{
            echo "Veuillez vous connecter à un compte valide.";
        }

    ?>

<div class="hero"> 
    <div class="nav-links" id="navLinks">
      <ul>
        <li><a href="index.html">HOME</a></li>
        <li><a href="error404.html">SUPPORT</a></li>
      </ul>
    </div>
    <a href="index.html"><img src="images/MonoSecurLogoWText.png"></a>
    <div class="form-box">
      <div class="button-box">
        <div id="btn"></div>
        <button type="button" class="toggle-btn" onclick="loginSide()">Log In</button>
        <button type="button" class="toggle-btn" onclick="registerSide()">Register</button>
      </div>
      <div class="social-icons">
      
      </div>
      <form method="post" id="login" class="input-group">
        <input type="email" name="lemail" id="lemail" class="input-field" placeholder="User Id">
        <input type="password" name="lpassword" id="lpassword" class="input-field" placeholder="Enter Password">
        <input type="checkbox" class="check-box"><span>Remember Password</span>
        <button type="submit" name="formlogin" id="formlogin" class="submit-btn">Login</button>
      </form>

      <?php include 'config/login.php' ?>

      <form method="post" id="register" class="input-group">
        <input type="email" name="email" id="email" class="input-field" placeholder="Email" required>
        <input type="password" name="password" id="password" class="input-field" placeholder="Enter Password" required>
        <input type="password" name="cpassword" id="cpassword" class="input-field" placeholder="Verify Password" required>
        <input type="checkbox" name="" id="" class="check-box" required>I agree to<span><a href="">terms of conditions</a></span>
        <input type="submit" name="formsend" id="formsend" class="submit-btn" value="Register">
      </form>
      <?php include 'config/register.php'?>
      <?php include 
           $_SESSION['user token']= $token;

           echo "votre est".$_SESSION['user token'];
        ?>
    </div>
  </div>
  

    <script>
      var x = document.getElementById("login");
      var y = document.getElementById("register");
      var z = document.getElementById("btn");

      function registerSide(){
        x.style.left = "-400px";
        y.style.left = "50px";
        z.style.left = "110px";
      }

      function loginSide(){
        x.style.left = "50px";
        y.style.left = "450px";
        z.style.left = "0";
      }
      
    </script>
</body>
</html>