function verif_envoi(){

    var bouton_envoi = document.getElementById("envoi");
    var adresse_mail = document.getElementById("adresseMail").value;

    var explication = document.getElementById("explication");

    var pattern = new RegExp("^[A-Za-z0-9]+[A-Za-z0-9\.\-_]*@[A-Za-z0-9\-_]+[\.]+[A-Za-z0-9\.\-_]+$","");
    var test = pattern.test(adresse_mail);

    console.log(test);

    if(test){
        bouton_envoi.removeAttribute("disabled");
        explication.style.height="50px";
        explication.innerHTML="<p>Adresse correcte</p>";
    }
    else{
        explication.style.height="50px";
        explication.innerHTML="<p>Le format de l'adresse e-mail n'est pas correct</p>";

    }
}