CREATE TABLE genre(
    idgenre int primary key auto_increment,
    genre varchar(255)
);
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

create table besoin(
    idbesoin int primary key auto_increment,
    idservice int references services(idservice),
    taux_jour_homme int,
    poste_recherche varchar(100),
    experience varchar(100),
    annee_experience int,
    salaire_min int,
    salaire_max int,
    idnationalite int references nationalite(idnationalite),
    iddiplome int references diplome(iddpilome),
    volume_horaire int
);
create table coefficient_diplome(
    idsdp int primary key auto_increment,
    iddiplome int references diplome(iddiplome),
    coefficient int,
    idservice int references services(idservice)
);
create table coefficient_nationalite(
    idsnp int primary key auto_increment,
    iddiplome int references diplome(iddiplome),
    coefficient int,
    idservice int references services(idservice)
);