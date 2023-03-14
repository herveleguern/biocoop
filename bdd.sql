CREATE DATABASE biocoop CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE biocoop;

CREATE TABLE familleProduit (
id varchar(11) NOT NULL PRIMARY KEY,
libelle varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE produit (
reference varchar(11) NOT NULL PRIMARY KEY,
designation varchar(50) NOT NULL,
tarif float NOT NULL,
idFamille varchar(11) REFERENCES familleProduit(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE promotion (
id varchar(11) NOT NULL PRIMARY KEY,
libelle varchar(50) NOT NULL,
mois varchar(2) NOT NULL,
annee varchar(4) NOT NULL,
idFamille varchar(11) REFERENCES familleProduit(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE lignePromotion (
idPromotion varchar(11) NOT NULL REFERENCES promotion(id),
refProduit varchar(11) NOT NULL  REFERENCES produit(reference),
dateDebut varchar(8) NOT NULL,
dateFin varchar(8) NOT NULL,
tarif float NOT NULL,
PRIMARY KEY (idPromotion,refProduit)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO familleproduit VALUES
('ALI','alimentaire');

INSERT INTO produit VALUES
('p1','tarama bio pot 100g',3,'ALI'),
('p2','brebis bio lot 4 yaourts',2,'ALI'),
('p3','margarine bio 250g',3,'ALI');

INSERT INTO promotion VALUES
('promo1', 'bio','03','2021','ALI');

INSERT INTO lignePromotion VALUES
('promo1','p1','01032021','31032021',2),
('promo1','p2','01032021','31032021',1),
('promo1','p3','01032021','31032021',2);

