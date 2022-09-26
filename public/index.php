<?php session_start(); 
    include 'config/database.php';
    global $db;

    setcookie('pseudo', 'MyPseudo', time() + (30*24*3600));
    var_dump($_COOKIE);


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

    <h1>Bienvenu sur votre profile</h1>

    <?php
        if(isset($_SESSION['email']) && (isset($_SESSION['date'])))
        {
            #?>

            #<p>Email : <?= $_SESSION['email']; ?></p>
            #<p>Date de création de votre compte : <?= $_SESSION['date']; ?></p>

            <?php
    
        }else{
            echo "Veuillez vous connecter à un compte valide.";
        }

    ?>

    <h1>Login</h1>
    <form method="post">
    <input type="email" name="lemail" id="lemail" placeholder="Email" required><br/>
    <input type="password" name="lpassword" id="lpassword" placeholder="Mot de Passe" required><br/>
    <input type="submit" name="formlogin" id="formlogin" value="Login">
    </form>

    <?php include 'config/login.php' ?>

    <h1>register</h1>
    <form method="post">
    <input type="email" name="email" id="email" placeholder="Email" required><br/>
    <input type="password" name="password" id="password" placeholder="Mot de Passe" required><br/>
    <input type="password" name="cpassword" id="cpassword" placeholder="Confirmer Mot de Passe" required><br/>
    <input type="submit" name="formsend" id="formsend" value="Register">
    </form>

    <?php include 'config/register.php'?>
</body>
</html>