<?php
  
  /* Récupération des variables de SESSION
    $_SESSION['lignes']
    $_SESSION['recette']
    $_SESSION['pizzas']
  */

  //print_r($_SESSION);  
  //print_r($_SESSION['pizzas']);
  
  //Si le tableau contenant les résultats existe
  if (isset($_SESSION['pizzas'])) {

    //Si le tableau existe et contient des erreurs
    if (sizeof($_SESSION['erreurs']) != 0 ) {

      echo '<div class="resultats">';
      for ($i=0 ; $i<sizeof($_SESSION['erreurs']); $i++) {
        echo $_SESSION['erreurs'][$i] .'<br>';
      }
      echo '<div>';
    }


    //sinon on affiche toutes les lignes retournées avec le total
    else {
    
        echo '
        <div class="resultats">
        <table>
                <tr>
                  <th>Nom</th>
                  <th>Prix</th>
                  <th>Jour</th>
                  <th>Heure</th>
                </tr>';

        for ($i = 0; $i < sizeof($_SESSION['pizzas']); $i++) {
          //transformation du jour au format Français
          $strJour = strtotime($_SESSION['pizzas'][$i]['jour']);
          $jour = date("d-m-Y", $strJour);
          
          echo '<tr>
                  <td>'.$_SESSION['pizzas'][$i]['nom'].'</td>
                  <td>'.$_SESSION['pizzas'][$i]['prix'].'</td>
                  <td>'.$jour.'</td>
                  <td>'.$_SESSION['pizzas'][$i]['heure'].'</td>
                </tr>';
        
        }

        echo '</table>
        
              <table>
                <tr colspan="2">
                <th>TOTAL</th>
              </tr>

              <tr>
                <td>nbre de Commandes</td>
                <td>'.$_SESSION['lignes'].'</td>
              </tr>

              <tr>
                <td>Recette</td>
                <td>'.$_SESSION['recette'].'</td>
              </tr>
              </table>
              </div>';
      }
    }
        
  ?>