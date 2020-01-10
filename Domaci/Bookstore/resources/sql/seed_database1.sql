USE bookstore;

SET FOREIGN_KEY_CHECKS = 0; 

TRUNCATE TABLE users;
TRUNCATE TABLE publishers;
TRUNCATE TABLE autors;
TRUNCATE TABLE genres;
TRUNCATE TABLE books;
TRUNCATE TABLE reviews;
TRUNCATE TABLE rentals;
TRUNCATE TABLE book_genres;
TRUNCATE TABLE book_autors;

SET FOREIGN_KEY_CHECKS = 1; 

INSERT INTO users (username, birth_year, email) VALUES
('Marko', 1992, 'marko@gmail.com'),
('Petar', 1990, 'petar@gmail.com'),
('Jelena', 1995, 'jelena@gmail.com'),
('Masa', 1998, 'masa@gmail.com');

INSERT INTO publishers (name) VALUES
('Nova knjiga'),
('Laguna'),
('CID'),
('Unirex'),
('Narodna knjiga'),
('Obod');

INSERT INTO autors(name) VALUES
('Dusan Kovacevic'),
('Danilo Kis'),
('Lav Tolstoj'),
('Mesa Selimovic'),
('Ivo Andric'),
('Svetislav Basara'),
('Milenko Ratkovic');

INSERT INTO genres(name) VALUES
('Drama'),
('Komedija'),
('Roman'),
('Price'),
('Pjesme'),
('Fantastika'),
('Esej');

INSERT INTO books (isbn, name, year_of_publication, publisher_id) VALUES
('0123456789123', 'Profesionalac', 1982, 2),
('0123456789124', 'Cas anatomije', 1978, 3),
('0123456789125', 'Rat i mir', 1995, 5) ,
('0123456789126', 'Na Drini cuprija', 2010, 1),
('0123456789127', 'Tvrdjava', 2015, 4),
('0123456789128', 'Dervis i smrt', 2002, 6),
('0123456789129', 'Prokleta avlija', 2008, 2),
('0123456789130', 'Najljepse price', 2008, 6),
('0123456789131', 'Fama o biciklistima', 2000, 1);

INSERT INTO reviews(rev_number, rev_text, book_id, grade, user_id) VALUES
('1', 'Neki komentar o knjizi Profesionalac', 1, 4, 2),
('2', 'Drugi komentar o knjizi Profesionalac', 1, 5, 4),
('1', 'Neki komentar o knjizi Cas anatomije', 2, 5, 1),
('1', 'Neki komentar o knjizi Tvrdjava', 5, 5, 3),
('2', 'Drugi komentar o knjizi Tvrdjava', 5, 4, 4),
('3', 'Treci komentar o knjizi Tvrdjava', 5, 5, 1),
('1', 'Neki komentar o knjizi Na Drini cuprija', 4, 5, 2),
('2', 'Drugi komentar o knjizi Na Drini cuprija', 4, 5, 4);

INSERT INTO rentals(rental_date, user_id, book_id) VALUES
('2019-10-23', 1, 1),
('2018-05-14', 1, 1),
('2018-08-05', 3, 4),
('2019-11-01', 4, 5),
('2018-04-17', 3, 9),
('2019-03-05', 4, 7);

INSERT INTO book_genres(genre_id,book_id) VALUES
(2, 1),
(7, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(4, 7),
(4, 8),
(6, 9);

INSERT INTO book_autors(autor_id, book_id) VALUES
(1, 1),
(2, 2),
(3, 3),
(5, 4),
(4, 5),
(4, 6),
(5, 7),
(7, 8),
(6, 9);
