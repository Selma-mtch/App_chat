-- Insertion réussie : Email valide et genre valide (F ou M)
INSERT INTO personne (email, nom, prenom, pseudo, mdp, genre) 
VALUES ('alice@gmail.com', 'Alice', 'Dupont', 'alice123', 'password123', 'F');

INSERT INTO personne (email, nom, prenom, pseudo, mdp, genre) 
VALUES ('bob@example.com', 'Bob', 'Martin', 'bobster', 'password456', 'M');

SELECT * FROM personne;

-- Insertion échouée : Genre invalide (doit être 'F' ou 'M')
INSERT INTO personne (email, nom, prenom, pseudo, mdp, genre) 
VALUES ('charlie@example.com', 'Charlie', 'Brown', 'charlie', 'password789', 'X');

-- Insertion réussie : Le `id_pers` correspond à un `id_personne` existant dans la table `personne`
INSERT INTO message (text, id_pers) VALUES ('Hello world!', 4);
INSERT INTO message (text, id_pers) VALUES ('SQL is great!', 5);

SELECT * FROM message;

-- Insertion échouée : Le `id_pers` ne correspond pas à un `id_personne` existant
INSERT INTO message (text, id_pers) VALUES ('This will fail', 99);


-- Insertion réussie : Emotion avec des ID uniques
INSERT INTO emotion (id_emotion, nom) VALUES (1, 'Joie');
INSERT INTO emotion (id_emotion, nom) VALUES (2, 'Tristesse');
INSERT INTO emotion (id_emotion, nom) VALUES (3, 'Colère');

SELECT * FROM emotion;

-- Insertion échouée : Clé primaire dupliquée (id_emotion doit être unique)
INSERT INTO emotion (id_emotion, nom) VALUES (1, 'Peur');

-- Insertion réussie : Chaque annotation est unique en combinaison `id_message` et `id_emotion`
INSERT INTO annotation (id_message, id_emotion) VALUES (2, 1);
INSERT INTO annotation (id_message, id_emotion) VALUES (3, 2);
INSERT INTO annotation (id_message, id_emotion) VALUES (2, 3);
SELECT * FROM annotation;

-- Insertion échouée : Duplication de la combinaison `id_message` et `id_emotion`
INSERT INTO annotation (id_message, id_emotion) VALUES (1, 1);  -- Déjà inséré pour le message 1 et émotion 1

-- Insertion échouée : Clé étrangère `id_message` ne correspond pas à un message existant
INSERT INTO annotation (id_message, id_emotion) VALUES (99, 1);

-- Insertion échouée : Clé étrangère `id_emotion` ne correspond pas à une émotion existante
INSERT INTO annotation (id_message, id_emotion) VALUES (1, 99);

-- Vérifier toutes les personnes
SELECT * FROM personne;

-- Vérifier tous les messages et leurs auteurs
SELECT m.id_message, m.text, p.nom AS auteur_nom, p.prenom AS auteur_prenom 
FROM message m 
JOIN personne p ON m.id_pers = p.id_personne;

-- Vérifier toutes les émotions
SELECT * FROM emotion;

-- Vérifier les annotations (liens entre messages et émotions)
SELECT a.id, m.text AS message, e.nom AS emotion 
FROM annotation a
JOIN message m ON a.id_message = m.id_message
JOIN emotion e ON a.id_emotion = e.id_emotion;
