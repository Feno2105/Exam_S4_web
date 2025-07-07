-- Base de données : tp_flight
CREATE DATABASE IF NOT EXISTS tp_flight;
USE tp_flight;

CREATE TABLE IF NOT EXISTS source_fond (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_source VARCHAR(255) NOT NULL
);

-- Table 1 : Fonds disponibles dans l’établissement
CREATE TABLE IF NOT EXISTS fonds_etablissement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_ajout DATE DEFAULT CURRENT_DATE,
    montant DECIMAL(15,2) NOT NULL,
    source INT NOT NULL,
    description VARCHAR(255),
    FOREIGN KEY (source) REFERENCES source_fond(id)
);

-- Table 2 : Types de prêt avec taux et durée
CREATE TABLE IF NOT EXISTS type_pret (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    taux_interet DECIMAL(5,2) NOT NULL,
    duree_mois INT NOT NULL,
    montant_min DECIMAL(15,2),
    montant_max DECIMAL(15,2)
);

-- Table 3 : Clients
CREATE TABLE IF NOT EXISTS client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    telephone VARCHAR(20),
    adresse VARCHAR(255),
    date_inscription DATE DEFAULT CURRENT_DATE,
    revenu_mensuel DECIMAL(10,2)
);

CREATE TABLE IF NOT EXISTS statut_pret (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(100) NOT NULL
);

-- Table 4 : Prêts accordés aux clients
CREATE TABLE IF NOT EXISTS pret (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    type_pret_id INT,
    montant DECIMAL(15,2),
    reste_a_payer DECIMAL(15,2),
    date_debut DATE DEFAULT CURRENT_DATE,
    statut INT,
    FOREIGN KEY (client_id) REFERENCES client(id),
    FOREIGN KEY (type_pret_id) REFERENCES type_pret(id),
    FOREIGN KEY (statut) REFERENCES statut_pret(id)
);
CREATE TABLE IF NOT EXISTS mode_paiement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS type_mouvement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255) NOT NULL
);

-- Table 5 : Mouvement de remboursement
CREATE TABLE IF NOT EXISTS mouvement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pret_id INT NOT NULL,
    client_id INT NOT NULL,
    date_mouvement DATE DEFAULT CURRENT_DATE,
    montant_paye DECIMAL(15,2) NOT NULL,
    reste_apres_paiement DECIMAL(15,2),
    mode_paiement VARCHAR(50),
    type_mouvement_id INT,
    FOREIGN KEY (type_mouvement_id) REFERENCES type_mouvement(id),
    FOREIGN KEY (pret_id) REFERENCES pret(id),
    FOREIGN KEY (client_id) REFERENCES client(id)
);

-- Table 6 : Fonds client (argent réellement sorti pour financement)
CREATE TABLE IF NOT EXISTS fonds_client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT NOT NULL,
    solde DECIMAL(15,2) NOT NULL,
    FOREIGN KEY (client_id) REFERENCES client(id)
);
