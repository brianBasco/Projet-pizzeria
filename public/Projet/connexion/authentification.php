<!DOCTYPE html>

<html>

    <head>
        <title>NFA017 - authentification</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/style.css" />

         <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    </head>

    <body class="authentification" >
        <form method="POST" action="#">          
            <fieldset>
                <legend>Connection</legend>

                <div>
                    <label for="login">Login</label>
                    <input type="text" name="login" id="login" placeholder="Votre nom d'utilisateur"/>
                </div>

                <div>
                    <label for="mdp">Mot de passe</label>
                    <input type="password" name="mdp" id="mdp" placeholder="Votre mot de passe"/>
                </div>

                <div>
                    <label></label> <!-- label vide pour aligner le bouton ci-dessous -->
                    <input class="bouton" type="submit" name="submit" value="Valider" />
                </div>

            </fieldset>
                  
        </form>
        
        <?php



        session_start();

        if(isset($_POST['submit'])){

            // Je teste si les champs sont remplis
            if(empty($_POST['login']) AND empty($_POST['mdp'])){
                echo "<p>Veuillez renseigner vos informations de connexion</p>";
            }
            elseif(empty($_POST['login'])){
                    echo "<p>Veuillez renseigner le login</p>";
            }
            elseif(empty($_POST['mdp'])){
                    echo "<p>Veuillez renseigner le mot de passe</p>";
            }

            // Si les champs sont remplis je teste si le login et le mot de passe sont valides
            else{               
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['mdp'] = $_POST['mdp'];

                //Si c'est ok je crée un booléen qui me dit que la session est ouverte et validée
                if(verif_connexion($_SESSION['login'], $_SESSION['mdp'])){
                    $_SESSION['connecte'] = true;
                     header("Location: ../caisse/index.php");
                     exit();
                }

                //Sinon la session est ouverte mais le booléen en restant à False ne permet pas l'accès
                // aux pages protégées
                else {
                    $_SESSION['connecte'] = false;    
                    echo '<div class="reponse">
                            <p>Vos identifiants de connexion ne sont pas valides</p>
                        </div>';
                    
                }
            }      
        }

    
    function verif_connexion($login, $mdp) {
        //comparaison du login et mdp avec le base de données
        $pdo = new PDO('mysql:host=localhost; dbname=atelierCNAM', 'root', 'jordan');
        $pdo->query('SET NAMES UTF8');
       
        $reponse = $pdo->prepare("SELECT * FROM connexion WHERE pseudo= :login AND mdp= :password")or exit(print_r($pdo->errorInfo()));
        $reponse->bindParam(':login', $login, PDO::PARAM_STR);
        $reponse->bindParam(':password', $mdp, PDO::PARAM_STR);
        $reponse->execute();

        if ($reponse->rowCount()==1) return true;
    }
        ?>

        </div>

      

    </body>
</html>