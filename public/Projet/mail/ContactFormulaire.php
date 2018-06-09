<?php

class ContactFormulaire {
    
    private $nom;
    private $mail;
    private $sujet;
    private $message;

    //Booléens afin de gérer les erreurs
    private $ErreurNom;
    private $ErreurMail;
    private $ErreurSujet;
    private $ErreurMessage;

    public function __construct($nom, $mail, $sujet, $message){
        $this->nom = $nom;
        $this->mail = $mail;
        $this->sujet = $sujet;
        $this->message = $message;
    }

    // 2. testForm():vérifie la validité des données saisies par l’utilisateur : tous les champs sont remplis et différents de null.
    //S'il n'y a pas d'erreurs la fonction renvoie true

    public function testForm(){
        $i = 0;
        
        if(empty($this->nom) OR $this->nom == NULL){
            $this->ErreurNom = true;
            $i++;
        }
        if(empty($this->mail) OR $this->mail == NULL){
            $this->ErreurMail = true;
            $i++;
        }
        if(empty($this->sujet) OR $this->sujet == NULL){
            $this->ErreurSujet = true;
            $i++;
        }
        if(empty($this->message) OR $this->message == NULL){
            $this->ErreurMessage = true;
            $i++;
        }
        if($i == 0){
            return true;
        }
        else {
            return false;
        }
    }

// 3. envoiMail(): envoi le mail dans votre boîte de messagerie
// Cette méthode teste s'il y a des erreurs, si oui elle n'envoie pas
// le mail et affiche les messages d'erreur. Sinon envoi du mail et affichage du message

//Configurée pour envoyer des mails sur mon adresse, modifier ici l'adresse du destinataire

    public function envoiMail(){
        if($this->testForm()){
            mail("bast620@gmail.com", $this->sujet, "Message de ".$this->nom."<br>".$this->message, "content-type:text/html");
            $this->afficheMessage();
        }
        else {
            $this->afficheErreur();
        }
    }

// 4.
// afficheMessage():affiche les messages de confirmation et d’information

    public function afficheMessage(){              
            echo "<p>Message envoyé avec succès</p>";        
    }

// 5.
// afficheErreur(): affiche les messages d’erreurs

    public function afficheErreur(){    
            echo "<p>Message non envoyé, erreur à l'envoi</p>";

            if($this->ErreurNom) echo "<p>Vous n'avez pas renseigné votre nom</p>";
           
            if($this->ErreurMail) echo "<p>Vous n'avez pas renseigné votre mail</p>";
            
            if($this->ErreurSujet) echo "<p>Vous n'avez pas renseigné le sujet</p>";
           
            if($this->ErreurMessage) echo "<p>Le message est vide</p>";
    }

}