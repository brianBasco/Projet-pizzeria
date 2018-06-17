<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	  <meta name="viewport" content="width=device-width, initial-scale=1" />    
    <meta name="description" content="comptabilite">
    
		

    <!-- mettre une icone de caisse -->
    <link rel="icon" href="../../../../favicon.ico">

    <title>Caisse</title>

    <!-- Bootstrap core CSS -->
    <link href="../../bootstrapV4/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
  </head>

  <body class="comptabilite">

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
                  <h3 class="masthead-brand">Caisse</h3>
                </div>
                <div class="col-3">
                  <nav class="nav nav-masthead">
                  <a class="nav-link" href="../caisse/index.php">Caisse</a>
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

    <!-- -----------------------------Contenu principal, class master ---------------- -->
    <div class="master">
    <!-- -----------------------------FORMULAIRE DES REQUTES -------------------------- -->
    <!-- Afficher le grand livre comptable des commandes par période -->
    <form method="POST" action="requete.php" class="form">        
        <h1 class="inline">afficher TOUT</h1>

        <div class="btn-form">
        <input type="submit" name="tout" value="OK" />
        </div>

    </form>

    <form method="POST" action="requete.php" class="form">
        <h1>Sélectionner la période</h1>

        <label for="date">debut</label>
        <input id="date" type="date" name="debut" required>

        <label for="fin">fin</label>
        <input id="fin"  type="date" name="fin" required>

        <div class="btn-form">
        <input type="submit" name="periode" value="OK" />
        <input type="reset" value="reset" />
        </div>

    </form>   

    <!-- ---------------AFFICHAGE DES REQUETES ---------------------- -->
    <?php

        include("app.php");

    ?>

    </div>
    <!-- -----------------Fin de master --------------------------------- -->

    <script src="../../Jquery/jquery-3.3.1.min.js"></script>
    <script src="../../PopperJs/popper.min.js"></script>
    <script src="../../bootstrapV4/js/bootstrap.min.js"></script>
    
</body>

</html>
