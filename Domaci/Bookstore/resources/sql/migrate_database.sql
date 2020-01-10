DROP DATABASE IF EXISTS bookstore;

CREATE DATABASE bookstore;

USE bookstore;

CREATE TABLE users (
id INT AUTO_INCREMENT NOT NULL, 
username VARCHAR(100) NOT NULL UNIQUE, 
birth_year INT,
email VARCHAR(100),
PRIMARY KEY(id)
);

CREATE TABLE publishers (
id INT AUTO_INCREMENT,
name VARCHAR(100),
PRIMARY KEY(id)
);

CREATE TABLE autors(
id INT AUTO_INCREMENT,
name VARCHAR(100),
PRIMARY KEY(id)
);

CREATE TABLE genres(
id INT AUTO_INCREMENT,
name VARCHAR(100),
PRIMARY KEY(id)
);

CREATE TABLE books(
id INT AUTO_INCREMENT,
isbn CHAR(13) NOT NULL UNIQUE,
name VARCHAR(100),
year_of_publication INT,
publisher_id INT,
PRIMARY KEY(id),
	CONSTRAINT FK_books_publisher
	FOREIGN KEY(publisher_id) REFERENCES publishers(id)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);

CREATE TABLE reviews(
rev_number INT,
rev_text  TEXT,
grade INT,
book_id INT,
user_id INT,
PRIMARY KEY(rev_number, book_id),
    CONSTRAINT FK_reviews_book
    FOREIGN KEY(book_id) REFERENCES books(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    CONSTRAINT FK_reviews_user
    FOREIGN KEY(user_id) REFERENCES users(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

DELIMITER //
CREATE TRIGGER chk_grade_insert
    BEFORE INSERT ON reviews 
    FOR EACH ROW
BEGIN
    IF NEW.grade < 1 THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Unijeli ste ocjenu manju od 1';
    ELSEIF NEW.grade > 5 THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Unijeli ste ocjenu vecu od 5';
    END IF;
END;//
CREATE TRIGGER chk_grade_update
    BEFORE UPDATE ON reviews
    FOR EACH ROW
BEGIN
    IF NEW.grade < 1 THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Unijeli ste ocjenu manju od 1';
    ELSEIF NEW.grade > 5 THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Unijeli ste ocjenu vecu od 5';
    END IF;
END;//
DELIMITER ;

CREATE TABLE rentals(
id INT AUTO_INCREMENT,
rental_date DATE,
user_id INT,
book_id INT,
PRIMARY KEY(id),
    CONSTRAINT FK_rentals_user
    FOREIGN KEY(user_id) REFERENCES users(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    CONSTRAINT FK_rentals_book
    FOREIGN KEY(book_id) REFERENCES books(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE book_genres(
genre_id INT,
book_id INT,
PRIMARY KEY(genre_id, book_id),
    CONSTRAINT FK_book_genres_genre
    FOREIGN KEY(genre_id) REFERENCES genres(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    CONSTRAINT book_genres_book
    FOREIGN KEY(book_id) REFERENCES books(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE book_autors(
autor_id INT,
book_id INT,
PRIMARY KEY(autor_id, book_id),
    CONSTRAINT FK_book_autors_autor
    FOREIGN KEY(autor_id) REFERENCES autors(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    CONSTRAINT book_autors_book
    FOREIGN KEY(book_id) REFERENCES books(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
