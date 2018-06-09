<?php

class Pizza {

        private $id;
        private $nom;

        public function __construct($id, $nom){
            $this->id = $id;
            $this->nom = $nom;
        }

        public function afficherInterface(){

            //Affiche le contenu du fichier
            include("balise.php");
        }
       
}
?>