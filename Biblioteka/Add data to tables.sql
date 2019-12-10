SET FOREIGN_KEY_CHECKS = 0; 

truncate table korisnik;
INSERT INTO korisnik (username, god_rodjenja, email) values
('Marko', 1992, 'marko@gmail.com'),
('Petar', 1990, 'petar@gmail.com'),
('Jelena', 1995, 'jelena@gmail.com'),
('Masa', 1998, 'masa@gmail.com');

truncate table izdavac;
INSERT INTO izdavac (naziv) values
('Nova knjiga'),
('Laguna'),
('CID'),
('Unirex'),
('Narodna knjiga'),
('Obod');

truncate table autor;
INSERT INTO autor(ime, prezime) values
('Dusan', 'Kovacevic'),
('Danilo', 'Kis'),
('Lav', 'Tolstoj'),
('Mesa' , 'Selimovic'),
('Ivo', 'Andric');

truncate table zanr;
INSERT INTO zanr (naziv) values
('Drama'),
('Komedija'),
('Roman'),
('Price'),
('Pjesme'),
('Fantastika'),
('Esej');

truncate table knjiga;
INSERT INTO knjiga (isbn, naziv, god_izdavanja, izdavac_id) values
('0123456789123', 'Profesionalac', 1982, 2),
('0123456789124', 'Cas anatomije', 1978, 3),
('0123456789125', 'Rat i mir', 1995, 5) ,
('0123456789126', 'Na Drini cuprija', 2010, 1),
('0123456789127', 'Tvrdjava', 2015, 4),
('0123456789128', 'Dervis i smrt', 2002, 6),
('0123456789129', 'Prokleta avlija', 2008, 2),
('0123456789130', 'Najljepse price', 2008, 6),
('0123456789131', 'Fama o biciklistima', 2000, 1);

truncate table recenzija;
INSERT INTO recenzija(redni_broj, tekst, knjiga_isbn, ocjena, korisnik_id) values
('1', 'Neki komentar o knjizi Profesionalac', '0123456789123', 4, 2),
('2', 'Drugi komentar o knjizi Profesionalac', '0123456789123', 5, 4),
('1', 'Neki komentar o knjizi Cas anatomije', '0123456789124', 5, 1),
('1', 'Neki komentar o knjizi Tvrdjava', '0123456789127', 5, 3),
('2', 'Drugi komentar o knjizi Tvrdjava', '0123456789127', 4, 4),
('3', 'Treci komentar o knjizi Tvrdjava', '0123456789127', 5, 1),
('1', 'Neki komentar o knjizi Na Drini cuprija', '0123456789126', 5, 2),
('2', 'Drugi komentar o knjizi Na Drini cuprija', '0123456789126', 5, 4);

truncate table iznajmljivanje;
INSERT INTO iznajmljivanje(datum_iznajmljivanja, korisnik_id, knjiga_isbn) values
('2019-10-23', 1, '0123456789123'),
('2018-05-14', 1, '0123456789123'),
('2018-08-05', 3, '0123456789126'),
('2019-11-01', 4, '0123456789127'),
('2018-04-17', 3, '0123456789131'),
('2019-03-05', 4, '0123456789129');

truncate table knjiga_zanr;
INSERT ignore INTO knjiga_zanr(zanr_id, knjiga_isbn) values
(2, '0123456789123'),
(7, '0123456789124'),
(3, '0123456789125'),
(3, '0123456789126'),
(3, '0123456789127'),
(3, '0123456789128'),
(4, '0123456789129'),
(4, '0123456789130'),
(6, '0123456789131');

truncate table knjiga_autor;
INSERT ignore INTO knjiga_autor(autor_id, knjiga_isbn) values
(1, '0123456789123'),
(2, '0123456789124'),
(3, '0123456789125'),
(9, '0123456789126'),
(8, '0123456789127'),
(8, '0123456789128'),
(9, '0123456789129'),
(5, '0123456789130'),
(4, '0123456789131');

SET FOREIGN_KEY_CHECKS = 1; 