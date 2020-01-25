/* Korisnik pregleda sve knjige iz knjizare*/
SELECT * FROM books;

/* Korisnik pregleda sve knjige koje je napisao odredjeni autor */
SELECT * FROM books
WHERE id IN (SELECT book_id FROM book_autors
	       WHERE autor_id = (SELECT id FROM autors
                  		 WHERE LOWER(name) = LOWER('Ivo Andric')));

/* Korisnik pregleda knjige i izlistava za svaku knjigu autora */
SELECT B.name, A.name from books B, autors A
WHERE EXISTS(SELECT * from book_autors BA
             WHERE BA.book_id = B.id AND A.id = BA.autor_id);

/* Korisnik pregleda sve knjige sa prosjecnom ocjenom vecom od 4.6.*/
SELECT * from books B
WHERE EXISTS(SELECT AVG(grade) as avg_grade, book_isbn
             FROM reviews R
             GROUP BY book_id
             HAVING avg_grade > 4.6
             AND B.id = R.book_id);

/* Korisnik racuna prosjecnu ocjenu za odredjenu knjigu*/
SELECT AVG(grade) as avg_grade
             FROM reviews R
             WHERE book_id = (SELECT id FROM books B
                              WHERE B.name = 'Tvrdjava');

/* Korisnik pregleda sve knjige sa prosjecnom ocjenom vecom od 4.6.  Pored imena knjige pise i prosjecna ocjena */
SELECT B.name, X.avg_grade from books B, (SELECT AVG(grade) as avg_grade, book_isbn
             FROM reviews R
             GROUP BY book_isbn
             HAVING avg_grade > 4.6) as X
             WHERE B.isbn = X.book_isbn;

/* Korisnik izlistava autore koji imaju vise od jedne knjige. */
SELECT name FROM autors A
WHERE EXISTS(SELECT COUNT(book_isbn) AS number_of_books, autor_id
             FROM book_autors BA
             GROUP BY autor_id
             HAVING number_of_books > 1
             AND A.id = BA.autor_id);

/* Korisnik izlistava autore koji imaju vise od jedne knjige. Pored imena autora pise i broj knjiga*/
SELECT A.name, X.number_of_books FROM autors A,(SELECT COUNT(book_isbn) AS number_of_books, autor_id
             FROM book_autors BA
             GROUP BY autor_id
             HAVING number_of_books > 1) as X
WHERE A.id = X.autor_id;

/* Korisnik izlistava sve knjige koje je iznajmljivao korisnik sa odredjenim username-om */
SELECT * FROM books B
WHERE EXISTS (SELECT * FROM rentals R
              WHERE B.id = R.book_id
              AND LOWER(R.user_id) = (SELECT U.id FROM users U
                                              WHERE U.username = LOWER('Marko')));

/*Korisnik izlistava sve knjige koje je objavila odredjena izdavacka kuca */
SELECT * FROM books B
WHERE EXISTS (SELECT * FROM publishers P
              WHERE P.id = B.publisher_id
              AND LOWER(P.name) = LOWER('Laguna'));

/*Korisnik izlistava sve knjige koje je objavila odredjena izdavacka kuca, zajedno sa imenom te izdavacke kuce */
SELECT B.name, P.name FROM books B, publishers P
WHERE P.id = B.publisher_id
AND LOWER(P.name) = LOWER('Laguna');

/*Korisnik izlistava sve knjige i njihove zanrove */
SELECT B.name, G.name FROM books B, genres G
WHERE EXISTS (SELECT * FROM book_genres BG
              WHERE B.isbn = BG.book_isbn
              AND G.id = BG.genre_id);

/*Korisnik izlistava sve knjige odredjenog zanra */
SELECT B.name, G.name FROM books B, genres G
WHERE EXISTS (SELECT * FROM book_genres BG
              WHERE B.isbn = BG.book_isbn
              AND G.id = BG.genre_id
              AND LOWER(G.name) = LOWER('Roman'));

/*Korisnik izlistava sve kritike za odredjenu knjigu */
SELECT * FROM reviews WHERE book_id = 1;

/* Korisnik izlistava najbolje ocjenjenu knjigu po zanrovima */
SELECT B.name, G.name FROM books B, genres G
WHERE EXISTS(SELECT MAX(grade) as best_grade, book_isbn
             FROM reviews R
             GROUP BY book_isbn
             HAVING B.isbn = R.book_isbn)
AND EXISTS (SELECT * FROM book_genres BG
              WHERE B.isbn = BG.book_isbn
              AND G.id = BG.genre_id);

/* Korisnik izlistava najbolje ocjenjene knjigu za odredjeni zanr */
SELECT B.name, G.name FROM books B, genres G
WHERE EXISTS(SELECT MAX(grade) as best_grade, book_isbn
             FROM reviews R
             GROUP BY book_isbn
             HAVING B.isbn = R.book_isbn)
AND EXISTS (SELECT * FROM book_genres BG
              WHERE B.isbn = BG.book_isbn
              AND G.id = BG.genre_id
              AND LOWER(G.name) = LOWER('Komedija'));

/*Korisnik prikazuje autora za odredjenu knjigu */
SELECT * FROM autors A 
    WHERE EXISTS(SELECT * FROM book_autors BA 
                WHERE A.id = BA.autor_id AND BA.book_id = 1);

/*Korisnik izlistava sve kritike za odredjenu knjigu */
SELECT * FROM reviews WHERE book_id = 1;
