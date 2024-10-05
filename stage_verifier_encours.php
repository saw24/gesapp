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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['code_stagiaire'])) {
    $code_stagiaire = $_GET['code_stagiaire'];
    $stage_en_cours = 0;

    try {

        // Préparation de la requête SQL
        $sql = "SELECT COUNT(*) as count FROM t_stages WHERE code_stagiaire = '" . $code_stagiaire . "' AND statut = 'En cours'";

        // Préparation et exécution de la requête
        $stmt = $db->prepare($sql);
        //$stmt->bindParam(':code_stagiaire', $code_stagiaire, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stage_en_cours = ($result['count'] > 0);

        if ($stage_en_cours > 0) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Ce stagiaire a déjà un stage en cours. Impossible d\'en ajouter un nouveau.',
                'nbre_stage_en_cours' => $stage_en_cours,
                'codeSQL' => $sql,
            ]);
        } else {
            echo json_encode([
                'status' => 'success',
                'message' => 'Pas de stage en cours pour ce stagiaire',
                'nbre_stage_en_cours' => $stage_en_cours,
                'codeSQL' => $sql,
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
        'message' => 'Paramètres invalides.',
    ]);
}
