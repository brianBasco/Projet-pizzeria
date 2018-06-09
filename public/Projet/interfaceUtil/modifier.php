<?php

print_r($_POST);

extract($_POST);

//Ajout d'antislashs devant le caractère ' sinon erreur avec sql
$bddNom = addcslashes($nom,"'");
$bddIngredients = addcslashes($ingredients, "'");


try {
    $pdo= new PDO('mysql:host=localhost; dbname=atelierCNAM', 'root', 'jordan');
    $pdo->query('SET NAMES UTF8');

    
    if(isset($modifier)) {
        $req = $pdo->exec("UPDATE pizzas SET nom='$bddNom', prix='$prix', ingredients='$bddIngredients' WHERE id='$id'") or die(print_r($req->errorInfo()));
    }

    else if(isset($supprimmer)) {
        $req = $pdo->exec("DELETE FROM pizzas WHERE id='$id'") or die(print_r($req->errorInfo()));
    }

    echo 'nombre d\'entrées modifiées : '.$req;
}

catch(PDOEXception $e) {
    die("Erreur : ".$e->getMessage());
}


?>