<?php 
    class Controler {
        
        // le fait de creer en static permet d'appeler des methodes sans creer une instance

        


        // vérifier que le contenu du champ email soit de type mail
        protected function validateEmail(string $email): bool {
            return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false;
        }

        

    } 