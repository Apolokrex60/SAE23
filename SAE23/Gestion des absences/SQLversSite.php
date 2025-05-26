<?php
// SQLversSite.php
$host = 'localhost';    // Ton hôte MySQL (souvent localhost)
$db   = 'gestion_absences';  // Nom de ta base
$user = 'ton_user';     // Ton user MySQL
$pass = 'ton_password'; // Ton mot de passe MySQL
$charset = 'utf8mb4';

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Gère les erreurs en exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Retourne des tableaux associatifs
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Prépare les requêtes normalement
];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass, $options);
} catch (\PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erreur connexion BDD : ' . $e->getMessage()]);
    exit;
}
