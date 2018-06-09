DROP DATABASE IF EXISTS atelierCNAM;

CREATE DATABASE atelierCNAM default character set 'utf8';

use atelierCNAM;

CREATE TABLE pizzas (
    id int(11) AUTO_INCREMENT NOT NULL,
    nom varchar(60) NOT NULL,
    prix float(11) NOT NULL,
    ingredients varchar(255) NOT NULL,
    PRIMARY KEY (id)
)
ENGINE=INNODB;

CREATE TABLE connexion (
    id int(11) AUTO_INCREMENT NOT NULL,
    pseudo varchar(60) NOT NULL,
    mdp varchar(60) NOT NULL,
    PRIMARY KEY (id)
)
ENGINE=INNODB;


CREATE TABLE caisse (
    id int(11) AUTO_INCREMENT NOT NULL,
    numero int(11) NOT NULL,
    modifs varchar(255),
    jour DATE NOT NULL,
    heure TIME NOT NULL,
    nomCommande varchar(255) NOT NULL,
    prepare varchar(255) NOT NULL,
    PRIMARY KEY (id)
)
ENGINE=INNODB;


INSERT INTO pizzas (nom,prix,ingredients) VALUES 
("FLEURETTE", 8, "Tomate, emmental, mozzarella, olives"),
("L'ALSACIENNE", 8, "Crème, oignons, lardons"),
("MARGUERITE", 9, "Tomate, jambon, emmental, mozzarella, olives"),
("FORESTIERE", 9, "Tomate, champignons, emmental, mozzarella, olives"),
("NAPOLITAINES", 9, "Tomate, anchois, câpres, emmental, mozzarella, olives"),
("ROYALE", 9.50, "Tomate, jambon, champignons, emmental, mozzarella, olive"),
("PAYSANNE", 9.50, "Tomate, lardons, champignons, emmental, mozzarella, olives"),
("REINE", 9.50, "Tomate, champignons, chorizo, emmental, mozzarella, olives"),
("CALZONE Ma spécialité", 10, "Tomate, jambon, champignons, crème fraîche, oeuf, emmental, mozzarella"),
("YOYO", 10, "Tomate, emmental, chèvre, roquefort, mozzarella, olives"),
("LA REBLOCH", 10.50, "Crème, oignons, patates, fromage, lardons, reblochon, jambon cru"),
("SAUMON", 11, "Crème fraîche, saumon fumé 200gr, emmental, mozzarella, citron")
;

INSERT INTO connexion (pseudo, mdp) VALUES
("admin", "admin"),
("seb", "admin")

