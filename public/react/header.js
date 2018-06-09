import React from 'react';

//class Header extends React.Component {
    const Header = () => {

    //render() {
        return (
            <header className="titre container-fluid">
                <div className="row">
                    <div className="col-lg-6">
                        <div className="logo">
                            <Logo />
                            <BoutonNavigation />
                        </div>
                    </div>
                </div>

                <div className="row">
                    <div className="col-lg-6 md-collapse">
                        <Signature />
                    </div>

                    <div className="col-lg-6 md-collapse nav-primary">
                        <div className="container">
                            <Navigation />
                        </div>
                    </div>
                </div>

                <MenuDeroulant />
            </header>
        )
    }
//}

const BoutonNavigation = () => {
    return (
        <button id="navigation-button" onClick={ouvrirMenu} >
            <span className="sr-only">Toggle navigation</span>
            <hr />
            <hr />
            <hr />
        </button>
    )
}
                         
const MenuDeroulant = () => {
    return (
        <div id="navigation-menu">
			 <ul>
				<li onClick={fermerContenu}><a href="pizzas/pizzas.html">Nos pizzas</a></li>
				<li onClick={fermerContenu}><a href="lieux/lieux.html" >Nos lieux</a></li>
			</ul>
		</div>
    )
}


const Signature = () => {
    return (
        <div className="signature">
            <p>Ses pizzas traditionnelles au feu de bois</p>
        </div>
    )
}

const Navigation = () => {
    return (
        <nav>
            <a href="index.html">Home</a>
            <a href="pizzas/pizzas.html">Nos pizzas</a>
            <a href="lieux/lieux.html">Lieux</a>
        </nav>
    )
}

const Logo = () => {
    return (
        <a className="font-effect-3d-float" href="index.html">PEPINO</a>
    )
}

 

 // ---------------Insertion des functions ---------------  
function ouvrirMenu(){
    
    //Déclaration des variables
    var leBouton = document.getElementById("navigation-button");
    var leMenu = document.getElementById("navigation-menu");

    window.addEventListener("resize", fermerContenu);

    if(leBouton.hasAttribute("class")){
        fermerContenu();   
    }
    else{
        ouvrirContenu();        
    }
}
// /*--------------------------------------------------*/ //

function ouvrirContenu(){
    
    //Déclaration des variables
    var leBouton = document.getElementById("navigation-button");
    var leMenu = document.getElementById("navigation-menu");

    //Ouverture du contenu
    leBouton.setAttribute("class", "open");
    leMenu.style.height = "130px";
}

function fermerContenu(){

    //Déclaration des variables 
    var leBouton = document.getElementById("navigation-button");
    var leMenu = document.getElementById("navigation-menu");  

    //fermeture du contenu
    leBouton.removeAttribute("class");        
    leMenu.style.height = "0";
}


export default Header;