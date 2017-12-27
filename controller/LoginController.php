<?php

    class LoginController {
        public function login(array $user): ?string { 

            // typer les variables de retour ?string chaine de caractère ou null / php7
            // typer les variables d'entrée ici un array / php7

            //verifier que données existent
            if(!isset($user["email"]) || !isset($user["password"]) )
                return "view/no-connect/login.php";
            
            //verifier que donnees ne soient pas vides
            if(empty(trim($user["email"])) || trim(empty($user["password"])) )
                //trim supprime les espaces au début de l'expression, il s'arrete des le premier caractere 
                return "view/no-connect/login.php";    

            // pour éviter injection javascript et html // Encode les balises html / javascript   
            $email = htmlspecialchars(trim($user["email"]));
            $password = htmlspecialchars(trim($user["password"]));

            // Vérification de l'email
            if(!$this->validateEmail($email))
                return "view/no-connect/login.php";   

            if($email == "toto@toto.toto" && $password ="toto"){
                $_SESSION['user']=$user;
                return "view/no-connect/index.php";
            }
            else
                return "view/no-connect/login.php";    
        }

        // vérifier que le contenu du champ email soit de type mail
        public function validateEmail(string $email): bool {
            return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false;
        }

        // vérifier le champ password

    }

?>    