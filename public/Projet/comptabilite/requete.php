<?php

header("location: index.php");
session_start();
extract($_POST);

//déclaration des variables de dates pour comparatif
//La format renvoyé par Mysql est de type yyyy-mm-dd
$dateDebut = strtotime($debut);
$dateFin = strtotime($fin);

//Déclaration des variables à mettre en SESSION
$pizzas = array();
$erreurs = array();
$nbreLignes = 0;
$recette = 0; //Chiffre d'affaires

//Statement commun à toutes les requêtes
$statement = "SELECT nom, prix, jour, heure FROM caisse, pizzas WHERE numero = pizzas.id";
$statementEntrees = "SELECT COUNT(*) FROM caisse";
$statementCA = "SELECT SUM(prix) FROM pizzas, caisse WHERE numero = pizzas.id";

//Initialisation à null des variables de SESSION, permet de remettre à 0 pour chaque requête
$_SESSION['lignes'] = null;
$_SESSION['recette'] = null; //Chiffre d'affaires
$_SESSION['pizzas'] = null;
$_SESSION['erreurs'] = null;

try {

    $pdo = new PDO('mysql:host=localhost; dbname=atelierCNAM', 'root', 'jordan');
    $pdo->query('SET NAMES UTF8');

    //Si on veut afficher toutes les commandes :
    if (isset($tout)) {
        
        $req = $pdo->prepare($statement);
        $req->execute();

        //Récupération des résultats de la requête
        while($lignes = $req->fetch(PDO::FETCH_ASSOC)) {
        array_push($pizzas, $lignes);
    }

        //Calcul du nombre d'entrées dans la caisse
        $req2 = $pdo->query($statementEntrees);
        $nbreLignes = $req2->fetch();

        //Calcul du total PRIX de la caisse
        $req3 = $pdo->query($statementCA);
        $recette = $req3->fetch();

    }

    //Si l'utilisateur a choisi une période
    else if(isset($periode)) {
        //gestion des erreurs, si l'ordre des dates sélectionnées n'est pas bon
        if($dateDebut > $dateFin) {
            array_push($erreurs, "erreur, la date de début ne peut être postérieure à la date de fin");
        } 

        //Si les 2 dates sont égales, la période sélectionnée est le jour dateDebut
        else if($dateDebut == $dateFin) {

            $req = $pdo->prepare($statement." AND jour = ?");
            $req->execute(array($debut));

            //Récupération des résultats de la requête
            while($lignes = $req->fetch(PDO::FETCH_ASSOC)) {
            array_push($pizzas, $lignes);
            }   

            //S'il y a eu des résultats on continue les calculs
            if (sizeof($pizzas) != 0) {
            //Calcul du nombre d'entrées dans la caisse
                $req2 = $pdo->prepare($statementEntrees." WHERE jour = ?");
                $req2->execute(array($debut));
                $nbreLignes = $req2->fetch();

                //Calcul du total PRIX de la caisse
                $req3 = $pdo->prepare($statementCA." AND jour = ?");
                $req3->execute(array($debut));
                $recette = $req3->fetch();
            }
        }

        //Si tout est OK, on effectue la requête sur la période sélectionnée
        else {
            $req = $pdo->prepare($statement." AND jour >= ? AND jour <= ?");
            $req->execute(array($debut, $fin));

            //Récupération des résultats de la requête
            while($lignes = $req->fetch(PDO::FETCH_ASSOC)) {
            array_push($pizzas, $lignes);
            }

            //S'il y a eu des résultats on continue les calculs
            if (sizeof($pizzas) != 0) {
                //Calcul du nombre d'entrées dans la caisse
                $req2 = $pdo->prepare($statementEntrees." WHERE jour >= ? AND jour <= ?");
                $req2->execute(array($debut, $fin));
                $nbreLignes = $req2->fetch();

                //Calcul du total PRIX de la caisse
                $req3 = $pdo->prepare($statementCA." AND jour >= ? AND jour <= ?");
                $req3->execute(array($debut, $fin));
                $recette = $req3->fetch();
            }
        }
    }   

    if (sizeof($pizzas) == 0) array_push($erreurs, "Aucun résultat");

    //Récupération des variables dans la SESSION pour importer ces résultats dans app
    $_SESSION['lignes'] = $nbreLignes[0];
    $_SESSION['recette'] = $recette[0]; //Chiffre d'affaires
    $_SESSION['pizzas'] = $pizzas;
    $_SESSION['erreurs'] = $erreurs;
}

catch(PDOException $e) {
    die("Erreur : ".$e->getMessage());
}



?>