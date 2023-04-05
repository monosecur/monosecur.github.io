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

        if(isset($_POST['modifyuser'])){

            extract($_POST);

                if($grade == '1'){

                    $q = $db->prepare("SELECT * FROM token WHERE id = :id");
                    $q->execute(['id' => $id]);
                    $result = $q->fetch();

                    $q = $db->prepare("SELECT * FROM users WHERE token = :token");
                    $q->execute(['token' => $token]);
                    $result2 = $q->fetch();

                    if($result['wallet'] != $wallet){

                        $l = $db->prepare("INSERT INTO logs(type, arg1, arg2, arg3, arg4) VALUES(:type, :arg1, :arg2, :arg3, :arg4)");
                        $l->execute([
                        'type' => 'modify_wallet',
                        'arg1' => $result['id'],
                        'arg2' => $result2['id'],
                        'arg3' => $result['wallet'],
                        'arg4' => $wallet
                        ]);

                    }
        
                    $updateuser = $db->prepare("UPDATE token SET wallet = :wallet WHERE id = :id");
                    $updateuser->execute(['wallet' => $wallet,
                                            'id' => $id]);
        
                    header("Location: https://monosecur.tk/staff/utilisateurs");
                    die();

                }
                if($grade == '2'){

                    $q = $db->prepare("SELECT * FROM token WHERE id = :id");
                    $q->execute(['id' => $id]);
                    $result = $q->fetch();

                    $q = $db->prepare("SELECT * FROM users WHERE token = :token");
                    $q->execute(['token' => $token]);
                    $result2 = $q->fetch();

                    $q = $db->prepare("SELECT * FROM users WHERE id = :id");
                    $q->execute(['id' => $id]);
                    $result3 = $q->fetch();

                    if($result['wallet'] != $wallet){

                        $l = $db->prepare("INSERT INTO logs(type, arg1, arg2, arg3, arg4) VALUES(:type, :arg1, :arg2, :arg3, :arg4)");
                        $l->execute([
                        'type' => 'modify_wallet',
                        'arg1' => $result['id'],
                        'arg2' => $result2['id'],
                        'arg3' => $result['wallet'],
                        'arg4' => $wallet
                        ]);

                    }

                    if($result['priority'] != $priority){

                        $l = $db->prepare("INSERT INTO logs(type, arg1, arg2, arg3, arg4) VALUES(:type, :arg1, :arg2, :arg3, :arg4)");
                        $l->execute([
                        'type' => 'modify_priority',
                        'arg1' => $result['id'],
                        'arg2' => $result2['id'],
                        'arg3' => $result['priority'],
                        'arg4' => $priority
                        ]);

                    }

                    if($result3['pseudo'] != $pseudo){

                        $l = $db->prepare("INSERT INTO logs(type, arg1, arg2, arg3, arg4) VALUES(:type, :arg1, :arg2, :arg3, :arg4)");
                        $l->execute([
                        'type' => 'modify_pseudo',
                        'arg1' => $result['id'],
                        'arg2' => $result2['id'],
                        'arg3' => $result3['pseudo'],
                        'arg4' => $pseudo
                        ]);

                    }

                    $updateuser = $db->prepare("UPDATE token SET priority = :priority WHERE id = :id");
                    $updateuser->execute(['priority' => $priority,
                                            'id' => $id]);
        
                    $updateuser = $db->prepare("UPDATE token SET wallet = :wallet WHERE id = :id");
                    $updateuser->execute(['wallet' => $wallet,
                                            'id' => $id]);
                                            
                    $updateuser = $db->prepare("UPDATE users SET pseudo = :pseudo WHERE id = :id");
                    $updateuser->execute(['pseudo' => $pseudo,
                                            'id' => $id]);
        
                    header("Location: https://monosecur.tk/staff/utilisateurs");
                    die();

                }
                if($grade == '3'){

                    $q = $db->prepare("SELECT * FROM token WHERE id = :id");
                    $q->execute(['id' => $id]);
                    $result = $q->fetch();

                    $q = $db->prepare("SELECT * FROM users WHERE token = :token");
                    $q->execute(['token' => $token]);
                    $result2 = $q->fetch();

                    $q = $db->prepare("SELECT * FROM users WHERE id = :id");
                    $q->execute(['id' => $id]);
                    $result3 = $q->fetch();

                    if($result['wallet'] != $wallet){

                        $l = $db->prepare("INSERT INTO logs(type, arg1, arg2, arg3, arg4) VALUES(:type, :arg1, :arg2, :arg3, :arg4)");
                        $l->execute([
                        'type' => 'modify_wallet',
                        'arg1' => $result['id'],
                        'arg2' => $result2['id'],
                        'arg3' => $result['wallet'],
                        'arg4' => $wallet
                        ]);

                    }

                    if($result['priority'] != $priority){

                        $l = $db->prepare("INSERT INTO logs(type, arg1, arg2, arg3, arg4) VALUES(:type, :arg1, :arg2, :arg3, :arg4)");
                        $l->execute([
                        'type' => 'modify_priority',
                        'arg1' => $result['id'],
                        'arg2' => $result2['id'],
                        'arg3' => $result['priority'],
                        'arg4' => $priority
                        ]);

                    }

                    if($result3['pseudo'] != $pseudo){

                        $l = $db->prepare("INSERT INTO logs(type, arg1, arg2, arg3, arg4) VALUES(:type, :arg1, :arg2, :arg3, :arg4)");
                        $l->execute([
                        'type' => 'modify_pseudo',
                        'arg1' => $result['id'],
                        'arg2' => $result2['id'],
                        'arg3' => $result3['pseudo'],
                        'arg4' => $pseudo
                        ]);

                    }

                    $updateuser = $db->prepare("UPDATE token SET priority = :priority WHERE id = :id");
                    $updateuser->execute(['priority' => $priority,
                                            'id' => $id]);
        
                    $updateuser = $db->prepare("UPDATE token SET wallet = :wallet WHERE id = :id");
                    $updateuser->execute(['wallet' => $wallet,
                                            'id' => $id]);
                                            
                    $updateuser = $db->prepare("UPDATE users SET pseudo = :pseudo WHERE id = :id");
                    $updateuser->execute(['pseudo' => $pseudo,
                                            'id' => $id]);
        
                    header("Location: https://monosecur.tk/staff/utilisateurs");
                    die();

                }


        }


?>