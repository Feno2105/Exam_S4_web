<?php
require 'vendor/autoload.php';
require 'db.php';

// Autoriser les requêtes CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Gérer les requêtes OPTIONS pour toutes les routes
Flight::route('OPTIONS /etudiants', function() {
    http_response_code(200);
    exit;
});

Flight::route('OPTIONS /etudiants/@id', function() {
    http_response_code(200);
    exit;
});

Flight::route('GET /etudiants', function() {
    $db = getDB();
    $stmt = $db->query("SELECT * FROM etudiant");
    Flight::json($stmt->fetchAll(PDO::FETCH_ASSOC));
});

Flight::route('GET /etudiants/@id', function($id) {
    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM etudiant WHERE id = ?");
    $stmt->execute([$id]);
    Flight::json($stmt->fetch(PDO::FETCH_ASSOC));
});

Flight::route('POST /etudiants', function() {
    $data = Flight::request()->data;
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO etudiant (nom, prenom, email, age) VALUES (?, ?, ?, ?)");
    $stmt->execute([$data->nom, $data->prenom, $data->email, $data->age]);
    Flight::json(['message' => 'Étudiant ajouté', 'id' => $db->lastInsertId()]);
});

Flight::route('PUT /etudiants/@id', function($id) {
    // Récupérer les données envoyées
    parse_str(Flight::request()->getBody(), $data); // Décoder les données

    // Vérifiez si les données sont null
    if (!isset($data['nom']) || !isset($data['prenom']) || !isset($data['email']) || !isset($data['age'])) {
        Flight::json(['message' => 'Données invalides'], 400);
        return;
    }

    $db = getDB();
    $stmt = $db->prepare("UPDATE etudiant SET nom = ?, prenom = ?, email = ?, age = ? WHERE id = ?");
    $stmt->execute([$data['nom'], $data['prenom'], $data['email'], $data['age'], $id]);
    Flight::json(['message' => 'Étudiant modifié']);
});



Flight::route('DELETE /etudiants/@id', function($id) {
    $db = getDB();
    $stmt = $db->prepare("DELETE FROM etudiant WHERE id = ?");
    $stmt->execute([$id]);
    Flight::json(['message' => 'Étudiant supprimé']);
});

Flight::start();
