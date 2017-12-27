<?php
    
    require_once "controler.php";   

    class RegisterControler extends Controler {

        public function register(array $user): ?string { 
            
                        // typer les variables de retour ?string chaine de caractère ou null / php7
                        // typer les variables d'entrée ici un array / php7
            
                        //verifier que données existent
                        if(!isset($user["email"]) || !isset($user["password"]) || !isset($user["username"]) )
                            return "view/no-connect/register.php";
                        
                        //verifier que donnees ne soient pas vides
                        if(empty(trim($user["email"])) || trim(empty($user["password"])) || trim(empty($user["username"])) )
                            //trim supprime les espaces au début de l'expression, il s'arrete des le premier caractere 
                            return "view/no-connect/register.php";    
            
                        // pour éviter injection javascript et html // Encode les balises html / javascript   
                        $email = htmlspecialchars(trim($user["email"]));
                        $password = htmlspecialchars(trim($user["password"]));
                        $username = htmlspecialchars(trim($user["username"]));
                        
            
                        // Vérification de l'email
                        if(!$this->validateEmail($email))
                            return "view/no-connect/register.php";   
            
                        if($email == "toto@toto.toto" && $password ="toto"){
                            $_SESSION['user']=$user;
                            return "view/no-connect/index.php";
                        }
                        else
                            return "view/no-connect/register.php";    
                    }

    }
?>