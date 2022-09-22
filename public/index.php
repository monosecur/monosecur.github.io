<!DOCTYPE html>
<html>
<head>
    <title>Titre</title>
</head>
<body>

    <form method="post">
        <input type="text" name="pseudo" id="pseudo" placeholder="Pseudonyme" required><br/>
        <input type="text" name="email" id="email" placeholder="Email" required><br/>
        <input type="text" name="password" id="password" placeholder="Mot de Passe" required><br/>
        <input type="submit" name="formsend" id="formsend">
    </form>

    <?php
    
        include'config/database.php';
    
        if(isset($_POST['formsend'])){
            
            if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password'])){

                echo "votre pseudo est ".$_POST['pseudo']." et votre email est ".$_POST['email'];                

            }

        }
    
    ?>
</body>
</html>