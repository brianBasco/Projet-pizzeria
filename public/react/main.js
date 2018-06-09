import React from 'react';

class Main extends React.Component {
    render() {
        return (
            <div className="main-content">
                <Hero />
                <HeroPrimary />
                <NotrePhilosophie />
            </div>
        )
    }
}

const NotrePhilosophie = () => {
    return (
        <div id="philosophie">
            <div className="container page-header text-center">
                <h1>Qui sommes nous ?</h1>
            </div>

            <div className="container">
                <p>
                    Itaque verae amicitiae difficillime reperiuntur in iis qui in honoribus reque publica versantur;
                    ubi enim istum invenias qui honorem amici anteponat suo? Quid? Haec ut omittam, quam graves, quam difficiles
                    plerisque videntur calamitatum societates! Ad quas non est facile inventu qui descendant. Quamquam Ennius recte.
                    Itaque verae amicitiae difficillime reperiuntur in iis qui in honoribus reque publica versantur; ubi enim istum
                    invenias qui honorem amici anteponat suo? Quid? Haec ut omittam, quam graves, quam difficiles plerisque videntur
                    calamitatum societates! Ad quas non est facile inventu qui descendant. Quamquam Ennius recte.
				</p>
            </div>

            <div className="text-center">
                <img src="css/img/layout/feu-bois.jpg" className="img-fluid" alt="Feu de bois" />
            </div>

        </div>
    )
}

const Hero = () => {
    return (
        <section className="hero">
            <img id="fleurette" src="css/img/layout/hero.jpg" alt="une photo de pizza" />

            <div className="signature signature-md md-appear text-center">
                <p>Ses pizzas traditionnelles au feu de bois</p>
            </div>

            <div className="hero tel text-center">
                <div class="contenu">
                    <div>Tel : </div>
                    <button className="btn btn-primary btn-tel">
                        <a href="tel:+0650649793">06 50 64 97 93</a>
                    </button>
                </div>
            </div>
        </section>
    )
}

const HeroPrimary = () => {
    return (
        <section className="hero-primary">

            <div className="text-center">
                <p>Aujourd'hui</p>
                <p id="calendrier"></p>
            </div>

            <div className="font-3d text-center">
                <p>Passez commande dès 17h afin de choisir votre heure de retrait</p>
            </div>

            <div className="text-center">
                <p>Fidélité : Pour 10 pizzas achetées bénéficiez de 7€ de remise votre prochaine commande</p>
            </div>

        </section>
    )
}


export default Main;