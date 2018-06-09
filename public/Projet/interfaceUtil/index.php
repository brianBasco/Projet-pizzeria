<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="modification carte">

    <!-- mettre une icone -->
    <link rel="icon" href="../../../../favicon.ico">

    <title>Modifications</title>

    <!-- Bootstrap core CSS -->
    <link href="../../bootstrapV4/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
  </head>

  <body class="interface">

  <?php

	session_start();
	
	

	//Si l'utilisateur n'a pas ouvert de session il est redirigé vers le formulaire
	// d'authentification

    if(!$_SESSION['connecte']){
       header("Location: ../connexion/authentification.php");
       exit();
    }
 
	//Si je clique sur Déconnexion il y a destruction de la session

    if(isset($_POST['deconnexion'])){
        $_SESSION = array();
        session_destroy();
        unset($_SESSION);
        header("Location: ../../index.html");
        exit();
	}

	
?>


        <!-- -------------------- Header ----------------------- -->  
        <div class="header-caisse container-fluid inner">
              <div class="row justify-content-end">
                <div class="col-2 text-center">
                  <h3 class="masthead-brand">Interface</h3>
                </div>
                <div class="col-3">
                  <nav class="nav nav-masthead">
                  <a class="nav-link" href="../caisse/index.php">caisse</a>
                  </nav>
                </div>
                <div class="col-5">
                  <form method="post">
                    <button class="btn btn-warning float-right" type="submit" name="deconnexion">Déconnection</button>
                  </form>
                </div>
          </div> 
        </div>                
        
        <!-- Le bouton ajouter ouvre une DIV Formulaire pour ajouter une nouvelle pizza -->
        <div>
            <button onclick="ajouter()">Ajouter</button>
        </div>

        <!-- Affichage de toutes les pizzas récupérées depuis la BDD -->
        <div class="container-fluid">
            <div class="row">
                <?php
                
                    include("app.php");
                
                ?>
            </div>
        </div>

        <!-- Page d'insertion de pizza -->
        <div class="ajout">

            <div class="fermer" onclick="fermer()">
                <p>X</p>
            </div>

        <form action="ajout.php" method="POST">

            <input type="text" name="nom" placeholder="nom" required >
            <input type="number" step="0.5" name="prix" placeholder="prix" required >
            <input type="text" name="ingredients" placeholder="ingredients" required >
            <input type="submit" class="bouton" value="enregistrer">
        </form>

        </div>
        <!-- Fin de Page d'insertion de pizza -->

    <script src="../../Jquery/jquery-3.3.1.min.js"></script>
    <script src="../../PopperJs/popper.min.js"></script>
    <script src="../../bootstrapV4/js/bootstrap.min.js"></script>
    
    <script src="../js/ajouter.js"></script>

</body>

</html>