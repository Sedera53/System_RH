CREATE TABLE genre(
    idgenre int primary key auto_increment,
    genre varchar(255)
);
insert into genre(genre) values ('Homme'),('Femme');
CREATE TABLE Utilisateur(
    idUtilisateur int primary key auto_increment,
    nom varchar(100),
    prenom varchar(100),
    idgenre int references genre(idgenre),
    email varchar(100),
    mdp varchar(100),
    roles int default 0
);
-- admin (RH) --
insert into utilisateur (nom,prenom,idgenre,email,mdp,roles) values ('REDMAN','Kratos',1,'kratos@gmail.com','1234',1);
-- client (données de test) --
insert into utilisateur (nom,prenom,idgenre,email,mdp,roles) values ('DOE','John',1,'john@gmail.com','1234',3);

create table services(
    idservice int primary key auto_increment,
    services varchar(100)
);

create table diplome(
    iddiplome int primary key auto_increment,
    diplome varchar(100)
);
create table nationalite(
    idnationalite int primary key auto_increment,
    nationalite varchar(100)
);
create table sit_matr(
    idMatrimoniale int primary key auto_increment,
    situation varchar(255)
);
create table besoin(
    idbesoin int primary key auto_increment,
    idservice int references services(idservice),
    idnationalite int references nationalite(idnationalite),
    iddiplome int references diplome(iddiplome),
    idMatrimoniale int references sit_matr(idMatrimoniale),
    nombesoin varchar(255),
    taux_jour_homme float,
    volume_horaire float,
    poste_recherche varchar(255),
    experience varchar(255),
    annee_experience int,
    daty date,
    salaire_min float,
    salaire_max float
);
create table coefficient_diplome(
    idsdp int primary key auto_increment,
    idbesoin int references besoin(idbesoin),
    iddiplome int references diplome(iddiplome),
    coefficient int
);
create table coefficient_nationalite(
    idsnp int primary key auto_increment,
    idbesoin int references besoin(idbesoin),
    idnationalite int references nationalite(idnationalite),
    coefficient int
);
create table coefficient_matrim(
    idsm int primary key auto_increment,
    idbesoin int references besoin(idbesoin),
    idMatrimoniale int references sit_matr(idMatrimoniale),
    coefficient int
);
create table cv(
    idcv int primary key auto_increment,
    idbesoin int references besoin(idbesoin),
    nom varchar(255),
    prenom varchar(255),
    numero varchar(255),
    datenaissance date,
    iddiplome int references diplome(iddiplome),
    idMatrimoniale int references sit_matr(idMatrimoniale),
    idnationalite int references nationalite(idnationalite),
    idsex int references genre(idgenre),
    annee_experience int,
    experience text
);
-- raha ohatra ka ataotsika checkbox 
-- ilay selection diplome na selection multiple
create table cvdiplome(
    idcv int references cv(idcv),
    iddiplome int references diplome(iddiplome)
);

insert into cv (idbesoin,nom,prenom,numero,datenaissance,iddiplome,idMatrimoniale,idsex,experience) values

create table cvattente(
    idattente int primary key auto_increment,
    idcv int references cv(idcv),
    etat int default 0
);

select b.idbesoin,b.idservice,s.services,b.idnationalite,n.nationalite,b.iddiplome,d.diplome,b.idMatrimoniale,sm.situation,b.nombesoin,
        b.taux_jour_homme,b.volume_horaire,b.poste_recherche,b.experience,
        b.annee_experience,b.daty,b.salaire_min,b.salaire_max
    from besoin b
        join diplome d on d.iddiplome = b.iddiplome
        join nationalite n on n.idnationalite = b.idnationalite
        join sit_matr sm on sm.idMatrimoniale = b.idMatrimoniale 
        join services s on s.idservice = b.idservice;

-- selection cv partI --
select ca.idattente,ca.idcv,c.nom,b.idservice,s.services,b.experience,b.nombesoin
    from cvattente ca
        join cv c on c.idcv = ca.idcv
        join besoin b on b.idbesoin = c.idbesoin
        join services s on s.idservice = b.idservice group by ca.idcv;