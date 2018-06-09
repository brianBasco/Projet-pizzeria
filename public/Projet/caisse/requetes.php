<?php

error_reporting(E_ALL);
ini_set("display_errors", 1); 

session_start();

header('location: index.php');

//extract($_POST);

//récupération de la date
date_default_timezone_set('UTC');
//$jour = date("Y-m-d H:i:s");
$jour = date("Y-m-d");
$heure = date("H:i:s");

//récupération de la taille de $_POST
//Les 2 dernières entrées ne concernent pas les pizzas donc
$taillePOST = sizeof($_POST) - 2;
$taillePOST = $taillePOST / 2;

print_r($_POST);

try {
    $pdo = new PDO('mysql:host=localhost; dbname=atelierCNAM', 'root', 'jordan');
    $pdo->query('SET NAMES UTF8');

    //Insertion d'une ligne pour chaque couple pizzaNo/modifsNo
    
    for ($i = 0 ; $i < $taillePOST; $i++) {
        $req = $pdo->prepare("INSERT INTO caisse (numero, jour, heure, nomCommande, prepare) VALUES (?,?,?,?,?)");

        $numero = $_POST['pizza'.$i];        
        //$modifs = $_POST['modif'.$i];
        $nomCommande = $_POST['nomCommande'];
        $prepare = "n";

        $req->execute(array($numero, $jour, $heure, $nomCommande, $prepare)) or exit("erreur : ".print_r($req->errorInfo()));

        //echo " enregistrement effectué : ".$numero." modifs : ".$modifs." commande : ".$_POST["nomCommande"]. '<br>';
    }
}

catch (PDOException $e) {
    die("erreur ".$e->getMessage());
}