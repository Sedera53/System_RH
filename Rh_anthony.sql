CREATE TABLE questions(
    idquestion INTEGER primary key auto_increment,
    idservice INTEGER,
    idbesoin INTEGER,
    question VARCHAR(255),
    coefficient INTEGER
);

CREATE TABLE valiny(
    idvaliny INTEGER PRIMARY KEY auto_increment,
    idquestion INTEGER references questions(idquestion),
    valiny VARCHAR(255),
    istrue INTEGER
);