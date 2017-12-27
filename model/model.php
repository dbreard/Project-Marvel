<?php
    class Model{

        private $database;  // stockage du nom de la bdd
        private $pdo;   // permet l'utilisation de la méthode pdo -> en private personne ne pourra modifier le comportement pdo
        private $table; //stockage de la table -> pour permettre de switcher entre chaque class / model / 1 modele pour chaque table
        

        // au démarrage besoin d'une connexion à la bdd -> dans le construct
        function __construct(){
            $pdo = new PDO("mysql:dbname=".BDDDATABASE.";host=".BDDHOST, BDDUSER, BDDPASS);
            $this->database = BDDDATABASE;
            $this->pdo = $pdo;
            //var_dump($pdo);
        }

         
        // create - read - update - delete
        public function create(array $champs, array $valeur){
            // besoin du nom de la table, les champs, les valeurs des champs
            $sql = "INSERT INTO $this->table (".implode(",", $champs).") VALUES ('".implode("','", $valeur)."')";
            echo $sql;
            $this->pdo->exec($sql);
        }

        public function read($champ, $where){

            $sql = "SELECT ".implode(",", $champ)." FROM $this->table WHERE ".$this->arrayToString($where);
            // echo $sql;
            $request = $this->pdo->prepare($sql);
            $request->execute();
            $data = $request->fetchAll(); //si pas de valeur alors affiche les infos 2 fois associatif et non associatif

            //var_dump($data);
            
             
        }

        public function update($champ, $valeur, $where){

            $sql = "UPDATE $this->table SET $champ = '$valeur' WHERE ".$this->arrayToString($where);
            echo $sql;
            $this->pdo->exec($sql);
        }

        private function delete($where){
            //
            $sql = "DELETE FROM $this->table WHERE ".$this->arrayToString($where);
            echo $sql;
            $this->pdo->exec($sql);
            
        }

        private function arrayToString($array){
            //convertir un array en chaine de caractère
            // verifier que array est un array / sécuriser la fonction

                if(!is_array($array))
                    return false;
                //remplace if(!is_array($array)){return false;}

                $stringRetour = "";

                foreach($array as $key => $val) // Array("name" => "toto")
                    $stringRetour .= $key. "='" .$val."' AND "; //stringRetour = (name = 'toto', )
                
                $stringRetour = Substr($stringRetour, 0, -4); // retranche 4 caractères à partir de la fin pour supprimer le (AND )
                return $stringRetour;    

        }

        /************************************************** GETTER / SETTER ************************************************/
        // permet l'utilisation à l'exterieur de la class
        public function setTable($table){
            $this->table = $table;
        }

        public function getTable(){
            return $this->table;
        }





    }

    

?>
