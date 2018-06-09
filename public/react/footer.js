import React from 'react';

const Footer = () => {
    return (
        <footer className="container-fluid">
			<hr />			
			<div className="row footer-primary">
				<div className="col-sm-4 order-sm-1 text-center">
					<a className="nfa017" href="Projet/mail/formulaire.html">Contactez nous</a>
				</div>				
				<div className="col-sm-4 order-sm-3 text-center">
					<a className="nfa017" href="Projet/caisse/index.php">Connection</a>
				</div>
				<div className="col-sm-4 order-sm-2 text-center">
					<p>Theme Made By S&P.com&copy; <Annee /> </p>
                    <p>Powered by REACT</p>                    
				</div>
			</div>
		</footer>
    )
}

const Annee = () => {
    return <span>{new Date().getFullYear()}</span>
}

export default Footer;
