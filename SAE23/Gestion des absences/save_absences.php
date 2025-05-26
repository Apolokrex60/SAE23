<?php
header('Content-Type: application/json');

// Paramètres de connexion MySQL
$host = 'localhost';
$dbname = 'absencesSAE23';
$user = 'root';
$mdp = ''; // mot de passe vide si non défini

// Lecture des données JSON envoyées en POST
$data = json_decode(file_get_contents('php://input'), true);

// Vérification de la validité des données reçues
if (
    !$data || 
    !isset($data['session']) || 
    !isset($data['absences']) || 
    !isset($data['session']['module']) || 
    !isset($data['session']['date']) || 
    !isset($data['session']['heure'])
) {
    http_response_code(400);
    echo json_encode(['message' => 'Requête invalide ou données manquantes.']);
    exit;
}

try {
    // Connexion PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $mdp);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $session = $data['session'];

    // Optionnel : vérifier si la session existe déjà (même module, date, timeslot)
    $checkStmt = $pdo->prepare("SELECT id FROM sessions WHERE module = ? AND date = ? AND timeslot = ?");
    $checkStmt->execute([$session['module'], $session['date'], $session['heure']]);
    $existingSession = $checkStmt->fetch(PDO::FETCH_ASSOC);

    if ($existingSession) {
        // Si session déjà présente, on récupère son ID
        $sessionId = $existingSession['id'];
    } else {
        // Sinon on insère une nouvelle session
        $insertSession = $pdo->prepare("INSERT INTO sessions (module, date, timeslot) VALUES (?, ?, ?)");
        $insertSession->execute([$session['module'], $session['date'], $session['heure']]);
        $sessionId = $pdo->lastInsertId();
    }

    // Préparation de l'insertion des absences
    $stmtAbs = $pdo->prepare("INSERT INTO absences (session_id, student_id, status) VALUES (?, ?, ?)");

    foreach ($data['absences'] as $absence) {
        if (!isset($absence['id']) || !isset($absence['status'])) continue;
        // Ici, tu peux ajouter un filtre pour ne pas enregistrer les présents, 
        // si tu veux ne stocker que les absences
        // Par exemple : if($absence['status'] !== 'present') { ... }
        $stmtAbs->execute([$sessionId, $absence['id'], $absence['status']]);
    }

    echo json_encode(['message' => 'Absences enregistrées avec succès.', 'sessionId' => $sessionId]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['message' => 'Erreur lors de l\'enregistrement : ' . $e->getMessage()]);
}
