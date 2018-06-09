class Carte extends React.Component {

    constructor(){
        super()
        this.state = {
            pizzas :
                [
                    {
                        titre: 'FLEURETTE',
                        ingredients: ['Tomate', 'emmental', 'mozzarella', 'olives'],
                        prix: 8
                    },
                    {
                        titre: "L'ALSACIENNE",
                        ingredients: ['Crème', 'oignons', 'lardons'],
                        prix: 8
                    },
                    {
                        titre: "MARGUERITE",
                        ingredients: ['Tomate', 'jambon', 'emmental', 'mozzarella', 'olives'],
                        prix: 9
                    },
                    {
                        titre: "FORESTIERE",
                        ingredients: ['Tomate', 'champignons', 'emmental', 'mozzarella', 'olives'],
                        prix: 9
                    },
                    {
                        titre: "NAPOLITAINES",
                        ingredients: ['Tomate', 'anchois', 'câpres', 'emmental', 'mozzarella', 'olives'],
                        prix: 9
                    },
                    {
                        titre: "ROYALE",
                        ingredients: ['Tomate', 'jambon', 'champignons', 'emmental', 'mozzarella', 'olives'],
                        prix: 9.50
                    },
                    {
                        titre: "PAYSANNE",
                        ingredients: ['Tomate', 'lardons', 'champignons', 'emmental', 'mozzarella', 'olives'],
                        prix: 9.50
                    },
                    {
                        titre: "REINE",
                        ingredients: ['Tomate', 'champignons', 'chorizo', 'emmental', 'mozzarella', 'olives'],
                        prix: 9.50
                    },
                    {
                        titre: "CALZONE Ma spécialité",
                        ingredients: ['Tomate', 'jambon', 'champignons', 'crème fraîche', 'oeuf', 'emmental', 'mozzarella'],
                        prix: 10
                    },
                    {
                        titre: "YOYO",
                        ingredients: ['Tomate', 'emmental', 'chèvre', 'roquefort', 'mozzarella', 'olives'],
                        prix: 10
                    },
                    {
                        titre: "LA REBLOCH",
                        ingredients: ['Crème', 'oignons', 'patates', 'fromage', 'lardons', 'reblochon', 'jambon cru'],
                        prix: 10.50
                    },
                    {
                        titre: "SAUMON",
                        ingredients: ['Crème fraîche', 'saumon fumé 200gr', 'emmental', 'mozzarella', 'citron'],
                        prix: 11
                    }
                ]
        }
    }

    render() {
        return (
            <div class="carte" >
                <Remarque />                

                <div id="menu" class="jumbotron jumbotron-primary text-center">

                    <div class="page-header">
                        <h1>LA CARTE</h1>
                    </div>

                    <div class="lead">
                        <p>Taille unique</p>
                    </div>

                    <div id="pizzas" class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <Pizza titre="FLEURETTE" prix="8" ingredients="Tomate, emmental, mozzarella, olives" />

                                <h2>FLEURETTE • 8</h2>
                                <p>Tomate, emmental, mozzarella, olives</p>

                                <h2>L'ALSACIENNE • 8</h2>
                                <p>Crème, oignons, lardons</p>

                                <h2>MARGUERITE • 9</h2>
                                <p>Tomate, jambon, emmental, mozzarella, olives</p>

                                <h2>FORESTIERE • 9</h2>
                                <p>Tomate, champignons, emmental, mozzarella, olives</p>

                                <h2>NAPOLITAINES • 9</h2>
                                <p>Tomate, anchois, câpres, emmental, mozzarella, olives</p>

                                <h2>ROYALE • 9.50</h2>
                                <p>Tomate, jambon, champignons, emmental, mozzarella, olives</p>
                            </div>

                            <div class="col-lg-6">
                                <h2>PAYSANNE • 9.50</h2>
                                <p>Tomate, lardons, champignons, emmental, mozzarella, olives</p>

                                <h2>REINE • 9.50</h2>
                                <p>Tomate, champignons, chorizo, emmental, mozzarella, olives</p>

                                <h2>CALZONE <span>Ma spécialité</span> • 10</h2>
                                <p>Tomate, jambon, champignons, crème fraîche, oeuf, emmental, mozzarella</p>

                                <h2>YOYO • 10</h2>
                                <p>Tomate, emmental, chèvre, roquefort, mozzarella, olives</p>

                                <h2>LA REBLOCH • 10.50</h2>
                                <p>Crème, oignons, patates, fromage, lardons,reblochon, jambon cru</p>

                                <h2>SAUMON • 11</h2>
                                <p>Crème fraîche, saumon fumé <span>200gr</span>, emmental, mozzarella, citron</p>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <Infos />
                </div>
            </div>
        )
    }
}

const Remarque = () => {
    return (
        <div class="remarque container text-center">
            <p>Passez commande dès 17h afin de choisir votre heure de retrait</p>
        </div>
    )
}

const Infos = () => {
    return (
        <div class="container">
            <small>Taxes et service inclus, prix en euros TTC. Espèces et chèques acceptés.</small>
        </div>
    )
}

const Pizza = (props) => {
    return (
        <div>
            <h2>{props.titre} • {props.prix}</h2>
            <p>{props.ingredients}</p>
        </div>
    )
}