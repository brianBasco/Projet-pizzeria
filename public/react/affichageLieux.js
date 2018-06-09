function affichageLieux(){

    var balise = document.getElementById("calendrier");
    
    balise.innerHTML = remplirLaBalise();

}

function remplirLaBalise(){

    var d = new Date();
    var JourDeLaSemaine = d.getDay();
    // Pour info Dimanche = 0, lundi = 1
    var semaine = new Array("dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi");

    var allemont = "de 18h à 20h30 à ALLEMONT";
    var renaud = "de 18h à 20h30 à Gîtes LE GRAND RENAUD";
    var sechilienne = "de 18h à 20h30 à SECHILIENNE";
    var bourg = "de 18h à 20h30 à BOURG D'OISANS";
    var conges = "Nous sommes fermés";

    semaine["dimanche"] = conges;
    semaine["lundi"] = bourg;
    semaine["mardi"] = renaud;
    semaine["mercredi"] = allemont;
    semaine["jeudi"] = sechilienne;
    semaine["vendredi"] = conges;
    semaine["samedi"] = conges;

    if(JourDeLaSemaine == 0){
        return semaine["dimanche"];
    }
    else if(JourDeLaSemaine == 1){
        return semaine["lundi"];
         
    }
    else if(JourDeLaSemaine == 2){
         return semaine["mardi"];
         
    }
    else if(JourDeLaSemaine == 3){
         return semaine["mercredi"];
         
    }
    else if(JourDeLaSemaine == 4){
         return semaine["jeudi"];
         
    }
    else if(JourDeLaSemaine == 5){
        return semaine["vendredi"];
          
    }
    else if(JourDeLaSemaine == 6){
        return semaine["samedi"];
         
    }
}

function recupererLieuGoogleMap(endroit){
    var bourg = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11260.387293198959!2d6.051925511608422!3d45    .12437369286939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478a6a6e14a24e01%3A0xfa16623342e164e1!2sOz+Station!5e0!3m2!1sfr!2sfr!4v1489766482594";
    var gites = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11260.387293198959!2d6.051925511608422!3d45    .12437369286939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478a6a6e14a24e01%3A0xfa16623342e164e1!2sOz+Station!5e0!3m2!1sfr!2sfr!4v1489766482594";
    var sechilienne = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11260.387293198959!2d6.051925511608422!3d45    .12437369286939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478a6a6e14a24e01%3A0xfa16623342e164e1!2sOz+Station!5e0!3m2!1sfr!2sfr!4v1489766482594";
    var allemont = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11260.387293198959!2d6.051925511608422!3d45    .12437369286939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478a6a6e14a24e01%3A0xfa16623342e164e1!2sOz+Station!5e0!3m2!1sfr!2sfr!4v1489766482594";

    if(endroit == "bourg"){
        return bourg;
    }
    else if(endroit == "gites"){
        return gites;
    }
    else if(endroit =="sechilienne"){
        return sechilienne;
    }
    else if(endroit == "allemont"){
        return allemont;
    }
}

function chargerCarte(){

    var d = new Date();
    var JourDeLaSemaine = d.getDay();
    // Pour info Dimanche = 0, lundi = 1 etc..

    var carte = document.getElementById('fenetre');

    if (JourDeLaSemaine == 1){
        carte.setAttribute("src", recupererLieuGoogleMap("bourg"));
    }
    else if (JourDeLaSemaine == 2){
        carte.setAttribute("src", recupererLieuGoogleMap("gites"));
    }
    else if (JourDeLaSemaine == 3){
        carte.setAttribute("src", recupererLieuGoogleMap("allemont"));
    }
    else if (JourDeLaSemaine == 4){
        carte.setAttribute("src", recupererLieuGoogleMap("sechilienne"));
    }
    else {
        carte.setAttribute("src",recupererLieuGoogleMap("bourg"));
    }

}

function modifierCarte(endroit){

    var carte = document.getElementById('fenetre');
    
    carte.setAttribute("src", recupererLieuGoogleMap(endroit));
}