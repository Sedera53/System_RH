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
INSERT INTO article (designation,prixUnitaire,quantite,idUnite) VALUES ('Armoire',500000,150,1),('Chaise de bureau',70000,180,1),('Table basse',120000,160,1);

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

create table codejournal(
    idCodeJournal serial primary key,
    code varchar(5),
    typeCodeJournal varchar(75)
);
INSERT INTO codejournal (code,typeCodeJournal) VALUES ('AC','ACHAT'),('AN','A NOUVEAU'),('BN','BANQUE BNI'),('BO','BANQUE BOA'),('CA','CAISSE'),('OD','OPERATION DIVERSE'),('VE','VENTE EXPORT'),('VL','VENTE LOCALE');
create table commande(
    idComm serial primary key,
    idCompteTier int not null,
    dateComm date not null,
    prixttc float not null,
    FOREIGN KEY (idCompteTier) REFERENCES compteTier (idCompteTier)
);

create table detailCommande(
    idDetail serial primary key,
    idComm int not null,
    idArticle int not null,
    quantiteComm int,
    FOREIGN KEY (idComm) REFERENCES commande (idComm),
    FOREIGN KEY (idArticle) REFERENCES article (idArticle)
);
insert into commande (idCompteTier,dateComm,prixttc) values(1,now(),6500);

insert into detailCommande (idComm,idArticle,quantiteComm) values (1,1,4),(1,2,6);
-- show client(comptetier)
SELECT  idCompteTier, pre, intitule as societe, CONCAT(prefixe,':',intitule) AS intitule,nomResponsable,email,adresse,phone FROM CompteTier c
    JOIN planTier p 
    ON c.idPlanTier = p.idPlanTier;
    
-- Noumts
SELECT a.designation AS designation, quantiteComm AS quantite, a.prixUnitaire AS prixUnitaire, c.dateComm AS datecommande, c.idCompteTier AS idCompteTier,
    d.idComm AS idcommande, ct.nomResponsable AS nomResponsable, ct.intitule, ct.email, ct.adresse, ct.phone,c.prixttc as ttc
FROM detailCommande d
JOIN article a ON a.idArticle = d.idArticle
JOIN commande c ON c.idComm = d.idComm
JOIN compteTier ct ON c.idCompteTier = ct.idCompteTier
WHERE c.idCompteTier = 1 and d.idComm = 1 and c.dateComm = '2023-06-13' limit 1;
