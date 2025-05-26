<?php
// get_students.php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'absencesSAE23';
$user = 'root';      
$mdp = '';     

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $mdp);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT id, nom, prenom FROM students ORDER BY nom, prenom");
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($students);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => "Erreur DB: " . $e->getMessage()]);
}
