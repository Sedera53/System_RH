create table compte(
    idCompte serial primary key,
    numero int unique,
    intitule varchar(255)
);

create table unite(
    idUnite serial primary key,
    nomUnite varchar(5) unique
);
insert into unite (nomUnite) values ('kg'),('L'),('T');
create table article(
    idArticle serial primary key,
    designation varchar(255) not null,
    prixUnitaire float not null,
    quantite int,
    idUnite int default 0,
    FOREIGN KEY (idUnite) REFERENCES unite (idUnite)
);
INSERT INTO article (designation,prixUnitaire,quantite,idUnite) VALUES ('mais',1250,30,1),('voanjo',1300,20,1),('vomanga',2200,10,1);

CREATE TABLE planTier(
    idPlanTier INTEGER PRIMARY KEY AUTO_INCREMENT,
    type int,
    numero VARCHAR(30),
    pre VARCHAR(100),
    prefixe VARCHAR(30)
);
INSERT INTO PlanTier (type,numero,pre,prefixe) VALUES (41100,'Client','Cl','CLT'),(40100,'Fournisseur','Fo','FRNS');
create table compteTier(
    idCompteTier serial primary key,
    idPlanTier int not null,
    intitule varchar(255),
    nomResponsable varchar(75) not null,
    email varchar(75) not null,
    adresse varchar(100),
    phone varchar(20),
    FOREIGN KEY (idPlanTier) REFERENCES planTier (idPlanTier)
);
insert into compteTier (idPlanTier,intitule,nomResponsable,email,adresse,phone) 
values(1,'LOVASOA','RaNoum','lovasoa@gmail.com','lot 45 Ampefiloha','0345612110');
create table commande(
    idComm serial primary key,
    idCompteTier int not null,
    dateComm date not null,
    montantComm float not null,
    FOREIGN KEY (idCompteTier) REFERENCES compteTier (idCompteTier)
);

create table detaiCommande(
    idDetail serial primary key,
    idComm int not null,
    idArticle int not null,
    quantiteComm int,
    FOREIGN KEY (idComm) REFERENCES commande (idComm),
    FOREIGN KEY (idArticle) REFERENCES article (idArticle)
);

-- show client(comptetier)
SELECT  idCompteTier, pre, intitule as societe, CONCAT(prefixe,':',intitule) AS intitule,nomResponsable,email,adresse,phone FROM CompteTier c
    JOIN planTier p 
    ON c.idPlanTier = p.idPlanTier;