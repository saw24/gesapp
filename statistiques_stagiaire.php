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

    $total_stagiaire = 0;
    $nbre_stage = 0;
    $nbre_stage_encours = 0;
    $nbre_stage_debut_mois_encours = 0;

    // Requête pour obtenir le total des stagiaires
    $stmt = $db->query("SELECT COUNT(*) AS total_stagiaires FROM t_stagiaires;");
    $total_stagiaires = $stmt->fetchColumn();

    // Requête pour obtenir le nombre de stages 
    $stmt = $db->query("SELECT COUNT(*) AS nbre_stage_encours FROM t_stages ;");
    $nbre_stage = $stmt->fetchColumn();

    // Requête pour obtenir le nombre de stages en cours
    $stmt = $db->query("SELECT COUNT(*) AS nbre_stage_encours FROM t_stages WHERE statut = 'En cours';");
    $nbre_stage_encours = $stmt->fetchColumn();



    // Requête pour obtenir le nombre de stages débutés dans le mois en cours
    $sql = "SELECT COUNT(*) AS nbre_stage_debut_mois_encours 
                         FROM t_stages 
                         WHERE YEAR(date_debut) = YEAR(CURDATE()) 
                         AND MONTH(date_debut) = MONTH(CURDATE())
                         AND statut = 'En cours';";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $nbre_stage_debut_mois_encours = $stmt->fetchColumn();

    // Requête pour obtenir le nombre d'Ecoles
    $stmt = $db->query("SELECT COUNT(*) AS nbre_ecoles FROM t_ecoles;");
    $nbre_ecoles = $stmt->fetchColumn();

    // Préparation de la réponse JSON
    echo json_encode(['success' => true,
        'total_stagiaires' => $total_stagiaires,
        'nbre_stage' => $nbre_stage,
        'nbre_stage_encours' => $nbre_stage_encours,
        'nbre_stage_debut_mois_encours' => $nbre_stage_debut_mois_encours,
        'nbre_ecoles' => $nbre_ecoles,
        'message' => 'Statistiques calculées'
        ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Erreur de connexion : ' . $e->getMessage()
    ]);
}
