<?php if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
    global $db;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://monosecur.tk/CSStyle/identification/deconnexion.css">
    <title>Mono Secur</title>
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

      <button type="button" class="toggle-btn">Se Déconnecter</button>

      <form method="post" id="resendmail" class="input-group">
        <input type="submit" name="formmail" id="formmail" class="submit-btn" value="Déconnexion">
      </form>

      <?php include 'logout.php'?>
    </div>

    </div>



</div>    
</body>
</html>