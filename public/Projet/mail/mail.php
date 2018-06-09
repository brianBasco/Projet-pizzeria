<DOCTYPE html>

<html>

    <head>
        <title>NFA017 - Formulaire de contact</title>
        <meta charset="utf-8" />

        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet"> 

    </head>

    <body>

      <div class="bloc_reponse">

        <?php

        include_once("ContactFormulaire.php");
        
        extract($_POST);

        $mail = new ContactFormulaire($nom, $adresseMail, $sujet, $message);

        $mail->envoiMail();


        ?>

         
        <br>
        <a href="formulaire.html"><button class="btn">Retour</button></a>

    </div>
        
    <script type="text/javascript" src="js/verif_envoi.js" ></script>

    </body>   
</html>