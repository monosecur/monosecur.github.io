<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
            include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
            global $db;

            if(isset($_SESSION['user_token'])){
                $token = $_SESSION['user_token'];
            }else{
                if(isset($_COOKIE['user_token'])){
                    $token = $_COOKIE['user_token'];
                }
            }

            $q2 = $db->prepare("SELECT * FROM token WHERE token = :token");
            $q2->execute(['token' => $token]);
            $request = $q2->fetch();

            if($request['priority'] == "utilisateur"){
                $grade = '0';
            }
            if($request['priority'] == "tresorier"){
                $grade = '1';
            }
            if($request['priority'] == "administrateur"){
                $grade = '2';
            }
            if($request['priority'] == "developpeur"){
                $grade = '3';
            }

            $q = $db->query("SELECT * FROM token");

            echo'
            <table id="table">
            <tr>            
            <th scope="col">ID</th>
            <th scope="col">PRIORITY</th>
            <th scope="col">PSEUDO</th>
            <th scope="col">MAIL</th>
            <th scope="col">STATUS</th>
            <th scope="col">WALLET</th>
            <th scope="col">GESTION</th>
            </tr>';

            $UserPerPages = 5;
            $EveryUserRequest = $db->query('SELECT id FROM token');
            $EveryUser = $EveryUserRequest->rowCount();

            if(isset($_GET['page']) && !empty($_GET['page'])){
                $_GET['page'] = intval($_GET['page']);
                $ActualPage = $_GET['page'];
            }else{
                $ActualPage = 1;
            }
            
            $start = ($ActualPage-1)*$UserPerPages;

            foreach($q as $user){

                echo"<tr>";

                echo'<th scope="row">'.$user['id'].'</th>';
                echo'<td><button class="td" oncontextmenu="event.preventDefault();">'.$user['priority'].'</button></td>';

                $request = $db->prepare("SELECT * FROM users WHERE token = :token");
                $request->execute(['token' => $user['token']]);
                $result = $request->fetch();

                if($user['priority'] == "utilisateur"){
                    $ugrade = '0';
                }
                if($user['priority'] == "tresorier"){
                    $ugrade = '1';
                }
                if($user['priority'] == "administrateur"){
                    $ugrade = '2';
                }
                if($user['priority'] == "developpeur"){
                    $ugrade = '3';
                }

                echo'<td><button class="td">'.$result['pseudo'].'</button></td>';
                if($grade>'2'){
                    echo'<td><button class="td">'.$result['email'].'</button></td>';
                }else{
                    echo'<td><a >permission insufissante</a></td>';
                }
                echo'<td>'.$result['status'].'</td>';
                echo'<td><button class="td">'.$user['wallet'].'</button></td>';


                if($grade > $ugrade){

                    if($result['status'] == "online"){

                        echo'<td><a href="https://monosecur.tk/staff/utilisateur/disconnect?id='.$user['id'].'" class="disconnect">déconnecter</a></td>';

                    }else{
                        echo'<td><a href="https://monosecur.tk/staff/utilisateur/modifier?id='.$user['id'].'" class="modif">MODIFIER</a></td>';
                    }

                }else{
                    echo'<td><a >permission insufissante</a></td>';
                }
                echo"</tr>";
                echo"</table>";
            }

            

?>