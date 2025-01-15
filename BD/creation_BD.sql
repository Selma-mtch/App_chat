-- Database: sae1

CREATE TABLE Usera (
    user_id SERIAL PRIMARY KEY, 
    username VARCHAR(50) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    genre CHAR(1),
    password_hash VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    CONSTRAINT type_genre CHECK (genre ~* '^[FM]$')
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Date et heure de création du compte, peut se remplir par défaut
    last_online_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Date et heure de dernière connexion
);

CREATE TABLE UserStatus (
    user_id INT PRIMARY KEY, 
    is_online BOOLEAN, 
    last_active_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP , 
    FOREIGN KEY (user_id) REFERENCES Usera(user_id) -- Clé étrangère référençant la table Usera
);

CREATE TABLE Conversation (
    conversation_id INT PRIMARY KEY, 
    user_1_id INT, 
    user_2_id INT, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP , 
    FOREIGN KEY (user_1_id) REFERENCES Usera(user_id), -- Clé étrangère référençant la table Usera
    FOREIGN KEY (user_2_id) REFERENCES Usera(user_id) -- Clé étrangère référençant la table Usera
);
CREATE TABLE Message (
    message_id INT PRIMARY KEY, 
    conversation_id INT, 
    sender_id INT, 
    receiver_id INT, 
    content TEXT NOT NULL, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Date et heure d'envoi du message
    FOREIGN KEY (conversation_id) REFERENCES Conversation(conversation_id), -- Clé étrangère référençant la table Conversation
    FOREIGN KEY (sender_id) REFERENCES Usera(user_id), -- Clé étrangère référençant la table Usera
    FOREIGN KEY (receiver_id) REFERENCES Usera(user_id) -- Clé étrangère référençant la table Usera
);

CREATE TYPE emotion_enum AS ENUM ('joie', 'colere', 'tristesse', 'surprise', 'degout', 'peur');-- création du type enum

CREATE TABLE Annotation (
    annotation_id INT PRIMARY KEY, 
    message_id INT, 
    annotator_id INT, 
    emotion emotion_enum NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Date et heure de création de l'annotation
    FOREIGN KEY (message_id) REFERENCES Message(message_id), -- Clé étrangère référençant la table Message
    FOREIGN KEY (annotator_id) REFERENCES Usera(user_id) -- Clé étrangère référençant la table Usera
);
