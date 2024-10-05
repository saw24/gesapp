<?php
// Connexion à la base de données
require_once 'connexion_db.php'; // inclure la classe ConnexionDB
$bd_connexion = new connexion_db();
$result = $bd_connexion->getConnexion();
$db = $result['connexion'];
$message = $result['message'];

// Vérifier si la connexion a réussi
if ($db === null) {
    echo json_encode([
        'status' => 'error',
        'message' => $message
    ]);
    die();
}

try {
    $sql = "SELECT * FROM t_niveaux_etudiant ORDER BY nom;";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        // Répondre avec les données brutes
        $donnees = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode([
            'status' => 'success',
            'message' => 'Liste OK',
            'donnees' => $donnees
        ]);
    } else {
        echo json_encode([
            'status' => 'success',
            'message' => "Liste vide",
            'donnees' => ""
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => "Erreur lors de l'opération : " . $e->getMessage()
    ]);
}
