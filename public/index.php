<?php session_start(); 

    $_SESSION['pseudo'] = "MonPseudo";

    var_dump($_SESSION);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Titre</title>
</head>
<body>

    <h1>Bienvenu sur votre profile</h1>
    <p>votre Pseudo : <?= $_SESSION['pseudo'];?></p>

    <form method="post">
    <input type="email" name="email" id="email" placeholder="Email" required><br/>
    <input type="password" name="password" id="password" placeholder="Mot de Passe" required><br/>
    <input type="password" name="cpassword" id="cpassword" placeholder="Confirmer Mot de Passe" required><br/>
    <input type="submit" name="formsend" id="formsend">
    </form>

    <?php
    

        if(isset($_POST['formsend'])){

            extract($_POST);

            

            if(!empty($password) && !empty($cpassword) && !empty($email)){
                

                if($password == $cpassword){
                    $options = [
                        'cost' => 12,
                    ];
    
                    $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);

                    include'config/database.php';
                    global $db;

                    $c = $db->prepare("SELECT email FROM users WHERE email = :email");
                    $c->execute(['email' => $email]);

                    $result = $c->rowCount();
                    

                    if($result == 0){
                        $q = $db->prepare("INSERT INTO users(email,password) VALUES(:email,:password)");
                    $q->execute([
                        'email' => $email,
                        'password' => $hashpass
                    ]);
                    echo "Formulaire rempli avec succes";
                    }else{
                        echo "un email existe deja !";
                    }

                }else{
                    echo "Les deux mot de passes ne correspondent pas !";
                }

            }else{
                echo "Les champs ne sont pas tous remplies";
            }
        }

    ?>
</body>
</html>