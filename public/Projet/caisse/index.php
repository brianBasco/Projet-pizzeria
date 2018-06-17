<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="caisse">

    <!-- mettre une icone de caisse -->
    <link rel="icon" href="../../../../favicon.ico">

    <title>Caisse</title>

    <!-- Bootstrap core CSS -->
    <link href="../../bootstrapV4/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
  </head>

  <body class="caisse">

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
                  <h3 class="masthead-brand">Commandes</h3>
                </div>
                <div class="col-3">
                  <nav class="nav nav-masthead">
                    <a class="nav-link" href="../comptabilite/index.php">Comptabilite</a>
                    <a class="nav-link" href="../interfaceUtil/index.php">Administration</a>
                  </nav>
                </div>
                <div class="col-5">
                  <form method="post">
                    <button class="btn btn-warning float-right" type="submit" name="deconnexion">déconnexion</button>
                  </form>
                </div>
          </div> 
        </div>        
<!-- -----------------------------form ----------------------- -->
<div class="container-fluid">
<div class="row">
  <div class="main col-6">   

      <div id="tableauPizzas">
      <?php

          include("app.php");

      ?>
      </div>

    <div class="unePizza">
      <button class="btn valider" onclick="validerCommande()">Valider</button>
      <button class="btn reset" onclick="reset()">Reset</button>
    </div>
  </div>
  

<!-- -----------------------------Affichage des commandes du jour --------------------- -->
  <div id="commandesEnCours" class="commandesEncours col-6">

  <?php
    include("reqEncours.php");
  ?>

  </div>

  </div>
  </div>


<!-- ------------ Display:none ------------------ -->
<div id="validerCommande" class="validerCommande">
    <button class="btn" onclick="annulerCommande()">Annuler Commande</button>
        <form id="recap" method="POST" action="requetes.php">

          <div id="conteneur">
          </div>
        
        <div class="container">
          <input type="text" name="nomCommande" placeholder="nom de commmande" required />
          <input type="submit" name="envoyer" value="Valider commande" />
        </div>
        
        </form>
    </div>


      <script src="../../Jquery/jquery-3.3.1.min.js"></script>
      <script src="../../PopperJs/popper.min.js"></script>
      <script src="../../bootstrapV4/js/bootstrap.min.js"></script>

      <script src="../js/caisse.js"></script>
    
</body>

</html>
