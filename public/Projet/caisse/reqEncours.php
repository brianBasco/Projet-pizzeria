<?php

//récupération de la date
date_default_timezone_set('UTC');
//$jour = date("Y-m-d H:i:s");
$jour = date("Y-m-d");
$heure = date("H:i:s");


$pdo = new PDO('mysql:host=localhost; dbname=atelierCNAM', 'root', 'jordan');
$pdo->query("SET NAMES UTF8");



try {
    $request = $pdo->prepare("SELECT nom, nomCommande, modifs, prepare, caisse.id FROM caisse, pizzas WHERE numero = pizzas.id AND jour = ?");
    
    $request->execute(array($jour));
    
    
    while ($req = $request->fetch(PDO::FETCH_ASSOC)) {

        if($req['prepare'] == "n")  {
            echo '<div class="resultat">
                    <form method="POST" action="barrer.php">
                    <input name="id" value="'.$req["id"].'" style="display:none" />
                    <input class="encours" type="text" value="'.$req["nom"].'" readonly />
                    <input class="encours" type="text" value="'.$req["modifs"].'" readonly />
                    <input class="encours" type="text" value="'.$req["nomCommande"].'" readonly />
                    <button type="submit" name="envoyer">X</button>
                    </form>
                </div>';
        }

        else {
            echo '<div class="resultat">
                                        
                    <input class="encours prepare" type="text" value="'.$req["nom"].'" readonly />
                    <input class="encours prepare" type="text" value="'.$req["modifs"].'" readonly />
                    <input class="encours prepare" type="text" value="'.$req["nomCommande"].'" readonly />
                    <hr>
                    
                </div>';
        }
    }
}

catch (PDOException $e) {
    die ("Erreur : ".$e->getMessage());
}

?>

