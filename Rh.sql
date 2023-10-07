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
    iddiplome int references diplome(iddpilome),
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