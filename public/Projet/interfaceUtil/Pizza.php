<?php

class Pizza {

        private $id;
        private $nom;
        private $prix;
        private $ingredients;

        public function __construct($id, $nom, $prix, $ingredients){
            $this->id = $id;
            $this->nom = $nom;
            $this->prix = $prix;
            $this->ingredients = $ingredients;
        }

        public function afficherInterface(){

            //Affiche le contenu du fichier
            include("balisePizza.php");
        }
       
}


?>