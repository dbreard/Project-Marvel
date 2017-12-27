<?php
    require_once "Model.php";

    class UserModel extends Model{

        // 3 champs username / mdp / email
        public function registerUser(string $email, string $password, string $username){

            $this->create(array("email", "password", "username"), array($email, $password, $username) );
           

        }

    }
?>