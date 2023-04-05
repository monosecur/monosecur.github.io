<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
        $id = htmlspecialchars(urldecode($_GET['id']));


        include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
        global $db;

        if(isset($_SESSION['user_token'])){
            $token = $_SESSION['user_token'];
        }else{
            if(isset($_COOKIE['user_token'])){
                $token = $_COOKIE['user_token'];
            }
        }

        $q = $db->prepare("SELECT * FROM users WHERE token = :token");
        $q->execute(['token' => $token]);
        $result = $q->fetch();
        $q2 = $db->prepare("SELECT * FROM token WHERE token = :token");
        $q2->execute(['token' => $token]);
        $result2 = $q2->fetch();

        $q3 = $db->prepare("SELECT * FROM users WHERE id = :id");
        $q3->execute(['id' => $id]);
        $user = $q3->fetch();
        $q4 = $db->prepare("SELECT * FROM token WHERE id = :id");
        $q4->execute(['id' => $id]);
        $user2 = $q4->fetch();

        if($result2['priority'] == "utilisateur"){
            $grade = '0';
        }
        if($result2['priority'] == "tresorier"){
            $grade = '1';
        }
        if($result2['priority'] == "administrateur"){
            $grade = '2';
        }
        if($result2['priority'] == "developpeur"){
            $grade = '3';
        }

        if($user2['priority'] == "utilisateur"){
            $ugrade = '0';
        }
        if($user2['priority'] == "tresorier"){
            $ugrade = '1';
        }
        if($user2['priority'] == "administrateur"){
            $ugrade = '2';
        }
        if($user2['priority'] == "developpeur"){
            $ugrade = '3';
        }

        if($grade > $ugrade){

        }else{
            header("Location: https://monosecur.tk/staff/utilisateurs");
            die();
        }

            if($result2['priority'] == 'utilisateur'){
                header("Location: https://monosecur.tk/menuprincipal");
                die();
            }
            if($result2['priority'] == 'tresorier'){
                    echo'   <form method="post" id="modify" class="input-group">
                            <label for="priority">Grade :</label>
                            <select name="priority" disabled>
                                <option selected hidden>'.$user2['priority'].'</option>
                                <option>utilisateur</option>
                                <option>operateur</option>
                                <option>dispatch</option>
                                <option>tresorier</option>
                                <option>administrateur</option>
                                <option>developpeur</option>
                            </select>
                            <label for="pseudo">Pseudo :</label>
                            <input type="text" name="pseudo" id="pseudo" class="input-field" placeholder="NE PAS LAISSER VIDE" value="'.$user['pseudo'].'" required disabled>
                            <label for="wallet">Portefeuille :</label>
                            <input type="number" name="wallet" id="wallet" class="input-field" placeholder="PAS DE CHIFFRE NEGATIF" value="'.$user2['wallet'].'" required>
                            <button type="submit" name="modifyuser" id="modifyuser" class="submit-btn">Valider</button>
                            </form>';
            }
            if($result2['priority'] == 'administrateur'){
                echo'   <form method="post" id="modify" class="input-group">
                        <label for="priority">Grade :</label>
                        <select name="priority" id="priority" name="priority">
                            <option selected hidden>'.$user2['priority'].'</option>
                            <option>utilisateur</option>
                            <option>operateur</option>
                            <option>dispatch</option>
                            <option>tresorier</option>
                            <option disabled>administrateur</option>
                            <option disabled>developpeur</option>
                        </select>
                        <label for="pseudo">Pseudo :</label>
                        <input type="text" name="pseudo" id="pseudo" class="input-field" placeholder="NE PAS LAISSER VIDE" value="'.$user['pseudo'].'" required>
                        <label for="wallet">Portefeuille :</label>
                        <input type="number" name="wallet" id="wallet" class="input-field" placeholder="PAS DE CHIFFRE NEGATIF" value="'.$user2['wallet'].'">
                        <button type="submit" name="modifyuser" id="modifyuser" class="submit-btn">Valider</button>
                        </form>';
        }
        if($result2['priority'] == 'developpeur'){
            echo'   <form method="post" id="modify" class="input-group">
                    <label for="priority">Grade :</label>
                    <select name="priority">
                        <option selected hidden>'.$user2['priority'].'</option>
                        <option>utilisateur</option>
                        <option>operateur</option>
                        <option>dispatch</option>
                        <option>tresorier</option>
                        <option>administrateur</option>
                        <option>developpeur</option>
                    </select>
                    <label for="pseudo">Pseudo :</label>
                    <input type="text" name="pseudo" id="pseudo" class="input-field" placeholder="NE PAS LAISSER VIDE" value="'.$user['pseudo'].'" required>
                    <label for="wallet">Portefeuille :</label>
                    <input type="number" name="wallet" id="wallet" class="input-field" placeholder="PAS DE CHIFFRE NEGATIF" value="'.$user2['wallet'].'">
                    <button type="submit" name="modifyuser" id="modifyuser" class="submit-btn">Valider</button>
                    </form>';
    }



?>