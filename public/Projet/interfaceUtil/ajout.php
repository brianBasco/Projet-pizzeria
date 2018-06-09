<?php

extract($_POST);

echo 'nom : '.$nom; 
echo 'prix : '.$prix; 
echo 'ingredients : '.$ingredients;

//Ajout d'antislashs devant le caractère ' sinon erreur avec sql
$bddNom = addcslashes($nom,"'");
$bddIngredients = addcslashes($ingredients, "'");

try {

    $pdo = new PDO('mysql:host=localhost; dbname=atelierCNAM', 'root', 'jordan');
    $pdo->query('SET NAMES UTF8');
    
    //$pdo->query("INSERT INTO pizzas VALUES (default, '$bddNom', '$prix', '$bddIngredients')") or exit(print_r($pdo->errorInfo()));
    
    $reponse = $pdo->prepare("INSERT INTO pizzas (nom,prix,ingredients) VALUES (:nom, :prix, :ingredients)") or exit(print_r($pdo->errorInfo()));
    $reponse->bindParam(':nom', $bddNom, PDO::PARAM_STR);
    $reponse->bindParam(':prix', $prix, PDO::PARAM_STR);
    $reponse->bindParam(':ingredients', $bddIngredients, PDO::PARAM_STR);
    $reponse->execute();

    echo 'Votre pizza a bien été ajoutée';
}

catch(PDOException $e){
    die('Erreur : '. $e->getMessage());
}

?>