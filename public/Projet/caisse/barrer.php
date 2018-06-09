<?php

header('location: index.php');

$pdo = new PDO('mysql:host=localhost; dbname=atelierCNAM', 'root', 'jordan');
$pdo->query("SET NAMES UTF8");

try {
    $request = $pdo->prepare("UPDATE caisse SET prepare='o' WHERE id = ?");    
    $request->execute(array($_POST['id']));

}

catch (PDOException $e) {
    die ("erreur ".$e->getMessage());
}

?>