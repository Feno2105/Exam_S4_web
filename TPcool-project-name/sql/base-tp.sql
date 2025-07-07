CREATE DATABASE Cadeaux; 
CREATE TABLE categorie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL
);
CREATE TABLE cadeaux (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    img VARCHAR(255) NOT NULL,
    categorie_id INT           
);

CREATE TABLE categorie(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(10)
);

INSERT INTO categorie (nom) VALUES
('Garçon'),
('Fille'),
('Neutre');



INSERT INTO cadeaux (nom, prix, img, categorie_id) VALUES
('Voiture télécommandée', 34.99, '', 1),
('Drone RC', 99.99, '', 1),
('Jeu de construction', 25.50, '', 1),
('Toupie Beyblade', 14.99, '', 1),
('Kit de mécanique', 45.00, '', 1),
('Vélo BMX', 180.00, '', 1),
('Pistolet Nerf', 19.99, '', 1),
('Puzzle 3D', 15.50, '', 1),
('Jeu de société Monopoly', 30.00, '', 1),
('Caméra GoPro pour enfant', 49.99, '', 1),
('Planche de skateboard', 49.99, '', 1),
('Basketball', 25.00, '', 1),
('Ballon de foot', 20.00, '', 1),
('Guitare pour enfant', 60.00, '', 1),
('Kit de science', 22.50, '', 1),
('Sac à dos avec personnage préféré', 35.00, '', 1),
('Chaussures de sport', 45.99, '', 1),
('T-shirt de super-héros', 19.99, '', 1),
('Livre interactif', 12.99, '', 1);


INSERT INTO cadeaux (nom, prix, img, categorie_id) VALUES
('Poupée Barbie', 24.99, '', 2),
('Maison de poupée', 80.00, '', 2),
('Robe de princesse', 40.00, '', 2),
('Kit de maquillage pour enfant', 18.50, '', 2),
('Chapeau de paille', 12.99, '', 2),
('Bracelets à fabriquer', 15.00, '', 2),
('Tente de jeu pour enfants', 35.00, '', 2),
('Coffret de perles', 20.00, '', 2),
('Livre pour enfants', 8.99, '', 2),
('Peluche licorne', 14.99, '', 2),
('Barrettes et accessoires cheveux', 10.00, '', 2),
('Kit de couture', 22.50, '', 2),
('Tableau magnétique', 25.00, '', 2),
('Patins à roulettes', 50.00, '', 2),
('Coffret à bijoux', 18.00, '', 2),
('Tablette pour enfant', 99.99, '', 2),
('Coffret de peinture', 12.50, '', 2),
('Chaussettes colorées', 5.99, '', 2),
('Peluche géante', 40.00, '', 2);


INSERT INTO cadeaux (nom, prix, img, categorie_id) VALUES
('Puzzle en bois', 12.50, '', 3),
('Livre d\'histoires', 9.99, '', 3),
('Cubes de construction', 15.00, '', 3),
('Peluche d\'animaux', 20.00, '', 3),
('Jeu de société famille', 22.00, '', 3),
('Balle rebondissante', 8.99, '', 3),
('Boîte à musique', 18.00, '', 3),
('Tapis de jeu', 30.00, '', 3),
('Vélo 12 pouces', 75.00, '', 3),
('Écharpe et gants', 18.00, '', 3),
('Kit de jardinage', 14.00, '', 3),
('Livre interactif', 13.99, '', 3),
('Jeu de cartes', 9.50, '', 3),
('Toboggan pour enfants', 60.00, '', 3),
('Trampoline gonflable', 99.00, '', 3),
('Banc à jouets', 40.00, '', 3),
('Puzzle 1000 pièces', 25.00, '', 3),
('Doudou', 12.00, '', 3),
('Balançoire extérieure', 45.00, '', 3),
("Kit de peinture à l'eau", 10.00, '', 3),
('Chaussons mignons', 7.99, '', 3),
('Panneau de basket miniature', 15.99, '', 3),
('Séance de cinéma maison', 12.50, '', 3),
('Sac à dos animaux', 20.00, '', 3),
('Tente de camping pour enfants', 30.00, '', 3),
('Jeu de bowling', 18.99, '', 3),
('Patins à glace', 40.00, '', 3),
('Kits de modèles réduits', 28.00, '', 3),
('Cartes éducatives', 14.50, '', 3),
('Jeu de pêche magnétique', 9.00, '', 3),
('Marionnettes en bois', 20.00, '', 3),
('Set de découpe et collage', 13.50, '', 3),
('Parachute magique', 17.00, '', 3),
('Chaise longue pour enfant', 25.00, '', 3),
('Boîte à crayons', 8.50, '', 3),
('Cahiers de coloriage', 6.99, '', 3),
('Jeu de labyrinthe', 12.00, '', 3),
('Thermomètre de bain', 9.00, '', 3),
('Boîte à goûter', 5.99, '', 3),
('Sac de billes', 4.50, '', 3),
('Gant de bain et serviette', 12.99, '', 3),
('Drapeau de foot', 10.50, '', 3),
('Kit de sable magique', 15.00, '', 3),
('Lunettes de soleil enfant', 6.99, '', 3);

CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    categorie_id INT, 
    password VARCHAR(255) NOT NULL
);

CREATE TABLE depot(
    id INT AUTO_INCREMENT PRIMARY KEY,  
    montant DECIMAL(10, 2) NOT NULL,   
    utilisateur_id INT NOT NULL,       
    date_depot DATETIME,
    validation  VARCHAR(6) 
);

CREATE TABLE validationCadeau(
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT,
    id_cadeau INT
);

CREATE TABLE depot_valide (
    id INT AUTO_INCREMENT PRIMARY KEY,  
    montant DECIMAL(10, 2) NOT NULL,   
    utilisateur_id INT NOT NULL,      
    date_depot DATE,  
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id) 
);

