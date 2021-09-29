use projet_fR_db;

/*Requête création users qui marche*/
INSERT INTO users(name_user, first_name_user, email_user, mdp_user) VALUES
("MANUEL", "Laurent", "lm.laurentmanuel@gmail.com", "0000");

/*Requête création d'une réservation*/
INSERT INTO orders(date_order, nb_people, id_user) 
VALUES ('2021-11-10', 4, 1);

/*Requête select toutes les réservations d'un utilisateur*/
SELECT * FROM reservations WHERE id_user = 1 ORDER BY date_reserv asc;

/*Requête update des réservations*/
UPDATE reservations SET date_reserv = '2021-12-10', nb_people = 15
WHERE id_reserv = 4 AND id_user = 2;

/*Requête suppression Réservations*/
DELETE FROM reservations WHERE id_reserv = 3 AND id_user = 2;

/*Requête select toutes les avis d'un utilisateur*/
SELECT * FROM avis WHERE id_user = 1 ORDER BY updatedOn ASC;


