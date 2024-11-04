DROP TABLE personne;
CREATE TABLE personne (
	id_personne SERIAL PRIMARY KEY,
	email VARCHAR(255) UNIQUE NOT NULL,
	nom Varchar(50),
	prenom VARCHAR(50),
	pseudo VARCHAR(50),
	mdp VARCHAR(50),
	genre CHAR(1),
	CONSTRAINT email_format CHECK (email ~* '^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$'),
	CONSTRAINT type_genre CHECK (genre ~* '^[FM]$')
);

CREATE TABLE message (
	id_message SERIAL PRIMARY KEY,
	text VARCHAR(1000),
	id_pers INT,
	FOREIGN KEY (id_pers) REFERENCES personne(id_personne)
);

CREATE TABLE emotion (
	id_emotion INT PRIMARY KEY,
	nom VARCHAR(20)
);

CREATE TABLE annotation(
	ID SERIAL PRIMARY KEY,
	id_message INT,
	id_emotion INT,
	FOREIGN KEY (id_message) REFERENCES message(id_message),
	FOREIGN KEY (id_emotion) REFERENCES emotion(id_emotion),
	CONSTRAINT unique_emotion_message UNIQUE (id_emotion, id_message)
);

ALTER TABLE personne DROP CONSTRAINT email_format;
