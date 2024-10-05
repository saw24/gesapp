<?php
// verifier_stage_en_cours.php

header('Content-Type: application/json');

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

if (isset($_GET['code_stagiaire'])) {
    $code_stagiaire = $_GET['code_stagiaire'];

    try {
        // Préparation de la requête pour récupérer les stages du stagiaire
        $sql = "SELECT code, date_debut, date_fin, objectif_stage, statut 
                FROM t_stages 
                WHERE code_stagiaire = :code_stagiaire";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':code_stagiaire', $code_stagiaire, PDO::PARAM_STR);
        $stmt->execute();

        $stages = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($stages) {
            echo json_encode([
                'status' => 'success',
                'donnees' => $stages
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Aucun stage trouvé pour ce stagiaire.'
            ]);
        }
    } catch (PDOException $e) {
        echo json_encode([
            'status' => 'error',
            'message' => "Erreur lors de l'opération : " . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Paramètre code_stagiaire manquant.'
    ]);
}
