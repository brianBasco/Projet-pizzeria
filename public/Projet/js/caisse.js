function ouvrir(div) {
    var div = document.getElementById(div);
    div.style.display = "block";
}

function fermer(div){
    var div = document.getElementById(div);
    div.style.display = "none";
}

function ajoutPizza(modificateur, id) {
    var pizza = document.getElementById(id);
    var input = document.getElementById("qte"+id);
    var qte = parseInt(input.value);
    //var buttonModfis = document.getElementById("disabled"+id);

    if(modificateur == "+") {
        qte = qte +  1;
        input.value = qte;
        //buttonModfis.removeAttribute("disabled");
        pizza.classList.add("selected");
    }

    else {
        if(qte > 0) {
            qte = qte - 1;
            input.value = qte;
            if(qte == 0) {
                //buttonModfis.setAttribute("disabled", "disabled");
                pizza.classList.remove("selected");
            }
        }
    }
}

/* function validerCommande() {
    var div = document.getElementById("validerCommande");
    var div1 = document.getElementById("div1").parentNode;
    var div2 = document.getElementById("div1");
    div.style.display = "block";

    //Permet de compter le nombre de pizzas créées
    var nbre = 0;

    //Récupérer toutes les entrées où la qté est différente de 0 et afficher les inputs
    var tableau = document.getElementsByClassName("selected");
        
    
    //var nom = document.getElementById()
    for (var i = 0; i < tableau.length; i++) {

        // ici j'ai l' ID donc je peux avoir le nom et la qte :
        var id = tableau[i].getAttribute("id");
        var qte = document.getElementById("qte" + id).value;

        //Rajouter autant de lignes que de quantités !!! <----------------------------------
        //si qte = 2 alors créer 2 pizzas avec la même id et les modifs
        for (var j = 0; j < qte; j++) {

        var divContainer = document.createElement("div");
        divContainer.setAttribute("class", "container");
        div1.insertBefore(divContainer, div2);

        var inputId = document.createElement("input");
        inputId.setAttribute("name", "pizza" + nbre);        
        inputId.value = id;

        div1.insertBefore(inputId, div2);

        //Pas besoin de passer le nom pour mysql, juste pour info utilisateur
        var inputNom = document.createElement("input");        
        inputNom.value = document.getElementById("nom" + id).value;

        div1.insertBefore(inputNom, div2);

        //Input des modifs pour chaque pizza, s'il y en a
        var inputModifs = document.createElement("input");
        inputModifs.value = "modifs";
        inputModifs.setAttribute("name", "modif" + nbre);

        div1.insertBefore(inputModifs, div2);

        nbre++;
        }
    }
} */

function validerCommande() {
    var div = document.getElementById("validerCommande");
    var test = document.getElementById("conteneur");
    //var div1 = document.getElementById("div1").parentNode;
    //var div2 = document.getElementById("div1");
    div.style.display = "block";

    //Permet de compter le nombre de pizzas créées
    var nbre = 0;

    //Récupérer toutes les entrées où la qté est différente de 0 et afficher les inputs
    var tableau = document.getElementsByClassName("selected");
        
    
    //var nom = document.getElementById()
    for (var i = 0; i < tableau.length; i++) {

        // ici j'ai l' ID donc je peux avoir le nom et la qte :
        var id = tableau[i].getAttribute("id");
        var qte = document.getElementById("qte" + id).value;

        //Rajouter autant de lignes que de quantités !!! <----------------------------------
        //si qte = 2 alors créer 2 pizzas avec la même id et les modifs
        for (var j = 0; j < qte; j++) {

        var divContainer = document.createElement("div");
        divContainer.setAttribute("class", "container");
        //div1.insertBefore(divContainer, div2);
        test.appendChild(divContainer);

        

        var inputId = document.createElement("input");
        inputId.setAttribute("name", "pizza" + nbre);        
        inputId.value = id;

        divContainer.appendChild(inputId);
        //div1.insertBefore(inputId, div2);

        //Pas besoin de passer le nom pour mysql, juste pour info utilisateur
        var inputNom = document.createElement("input");        
        inputNom.value = document.getElementById("nom" + id).value;

        divContainer.appendChild(inputNom);
        //div1.insertBefore(inputNom, div2);

        //Input des modifs pour chaque pizza, s'il y en a
        var inputModifs = document.createElement("input");
        inputModifs.setAttribute("placeholder", "Mes modifs");
        inputModifs.setAttribute("value", null);
        inputModifs.setAttribute("name", "modif" + nbre);

        divContainer.appendChild(inputModifs);
        //div1.insertBefore(inputModifs, div2);

        nbre++;
        }
    }
}


function reset() {
    var tabQte = document.getElementsByClassName("uneQte");
    var tabButtonModifs = document.getElementsByClassName("unButtonModif");

    for(var i=0; i<tabQte.length; i++) {
        if (tabQte[i].value != 0) tabQte[i].value = 0;
    }

   /*  for(var i=0; i<tabButtonModifs.length; i++) {
       tabButtonModifs[i].setAttribute("disabled", "disabled");
    } */
}

function annulerCommande() {

    fermer('validerCommande');

    // Supprime tous les enfant d'un élément
    var element = document.getElementById("conteneur");
    while (element.firstChild) {
        element.removeChild(element.firstChild);
    }
}