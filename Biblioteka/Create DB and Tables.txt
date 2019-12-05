DROP DATABASE IF EXISTS Biblioteka;

create database Biblioteka;

create table korisnik(
id INT auto_increment not null, 
username varchar(100) not null unique, 
god_rodjenja int,
email varchar(100),
primary key(id)
);

create table izdavac(
id int auto_increment,
naziv varchar(100),
primary key(id)
);

create table autor(
id int auto_increment,
ime varchar(100),
prezime varchar(100),
primary key(id)
);

create table zanr(
id int auto_increment,
naziv varchar(100),
primary key(id)
);

create table knjiga(
isbn char(13),
naziv varchar(100),
god_izdavanja int,
izdavac_id int,
primary key(isbn),
	CONSTRAINT FK_knjiga_izdavac
	foreign key(izdavac_id) references izdavac(id)
	on delete cascade
	on update cascade
);

create table recenzija(
redni_broj int,
tekst text,
knjiga_isbn char(13),
ocjena int,
korisnik_id int,
primary key(redni_broj,knjiga_isbn),
    CONSTRAINT FK_recenzija_knjiga
    foreign key(knjiga_isbn) references knjiga(isbn)
    on delete cascade
    on update cascade,
    CONSTRAINT FK_recenzija_korisnik
    foreign key(korisnik_id) references korisnik(id)
    on delete cascade
    on update cascade,
    CONSTRAINT chk_ocjena
    CHECK(ocjena<5 AND ocjena>0)
);

create table iznajmljivanje(
id int auto_increment,
datum_iznajmljivanja date,
korisnik_id int,
knjiga_isbn char(13),
primary key(id),
    CONSTRAINT FK_iznajmljivanje_korisnik
    foreign key(korisnik_id) references korisnik(id)
    on delete cascade
    on update cascade,
    CONSTRAINT FK_iznajmljivanje_knjiga
    foreign key(knjiga_isbn) references knjiga(isbn)
    on delete cascade
    on update cascade
);

create table knjiga_zanr(
zanr_id int,
knjiga_isbn char(13),
primary key(zanr_id,knjiga_isbn),
    CONSTRAINT FK_knjiga_zanr_zanr
    foreign key(zanr_id) references zanr(id)
    on delete cascade
    on update cascade,
    CONSTRAINT knjiga_zanr_knjiga
    foreign key(knjiga_isbn) references knjiga(isbn)
    on delete cascade
    on update cascade
);

create table knjiga_autor(
autor_id int,
knjiga_isbn char(13),
primary key(autor_id,knjiga_isbn),
    CONSTRAINT FK_knjiga_autor_autor
    foreign key(autor_id) references autor(id)
    on delete cascade
    on update cascade,
    CONSTRAINT knjiga_autor_knjiga
    foreign key(knjiga_isbn) references knjiga(isbn)
    on delete cascade
    on update cascade
);