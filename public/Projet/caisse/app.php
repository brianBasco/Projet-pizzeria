<?php

    include_once("Pizza.php");

    try {
        $bdd = new PDO('mysql:host=localhost; dbname=atelierCNAM', 'root', 'jordan'  );
        $bdd->query('SET NAMES UTF8');        
        
        $query = $bdd->query("SELECT * FROM pizzas");
        
        //Sélection de toutes les pizzas de la BDD et instanciation de chaque objet
        //Puis création de chaque balise grâce  à la méthode afficherInterface()
        while($row = $query->fetch()) {

            $balise = new Pizza($row['id'], $row['nom']);
            $balise->afficherInterface();
        }
    }

    catch(PDOException $e){
        die("Erreur : ".$e->getMessage());
    }
?>