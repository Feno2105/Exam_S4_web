CREATE TABLE categories(
   id INT AUTO_INCREMENT,
   description VARCHAR(50) ,
   nom VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(nom)
);

CREATE TABLE utilisateur(
   id INT AUTO_INCREMENT,
   nom VARCHAR(50)  NOT NULL,
   mot_de_passe VARCHAR(50)  NOT NULL,
   id_c INT NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(nom),
   UNIQUE(mot_de_passe),
   FOREIGN KEY(id_1) REFERENCES categories(id)
);

INSERT INTO categories (nom) VALUES('fille'),('garcon') ,('neutre');
INSERT INTO utilisateur (nom , mot_de_passe , id_c) VALUES (? , ? , ?);
UPDATE depot SET validation = ? WHERE id = ?