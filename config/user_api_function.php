<?php
        function get_database(){
                include ($_SERVER['DOCUMENT_ROOT']."/config/database.php");
                global $db;   
        }

        function get_token(){
                get_database();
                if(isset($_SESSION['user_token'])){
                        $token = $_SESSION['user_token'];
                    }else{
                        if(isset($_COOKIE['user_token'])){
                            $token = $_COOKIE['user_token'];
                        }
                    }
        }

        function is_token_valid($db,$token){
                $q = $db->prepare("SELECT * FROM token WHERE pseudo = :token");
                $q->execute(['pseudo' => $token]);
                $result = $q->fetch();
        }

        function verify_session_id(){

        }

        function check_user_priority(){
                get_database();
                global $db;
                get_token();
                global $token;

                $request = $db->prepare("SELECT * FROM token WHERE priority = :priority");
                $request->execute(['priority' => $token['priority']]);
                $check = $request->fetch();

                echo'this user as id: '.$check['id'].' i hope its the right id..';

        }

        function test_echo(){
                echo "echo_();";
        }

        function echo_(){
                echo "hello !";
        }


?>