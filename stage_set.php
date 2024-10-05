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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //$code = isset($_POST['code']) ? $_POST['code'] : null;
    $code = $_POST['code'];
    $code_stagiaire = $_POST['code_stagiaire'];
    $date_debut = $_POST['date_debut'];
    $date_fin = !empty($_POST['date_fin']) ? $_POST['date_fin'] : null;
    $objectif_stage = $_POST['objectif_stage'];
    $statut = $_POST['statut'];

    try {
        // Vérifier s'il existe déjà un stage en cours pour ce stagiaire (sauf si c'est une modification)
        if ($code === '') {
            $sql = "SELECT COUNT(*) as count FROM t_stages WHERE code_stagiaire = :code_stagiaire AND statut = 'En cours'";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':code_stagiaire', $code_stagiaire, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $stage_en_cours = ($result['count'] > 0);

            if ($stage_en_cours > 0) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Ce stagiaire a déjà un stage en cours. Impossible d\'en ajouter un nouveau.',
                    'nbre_stage_en_cours' => $stage_en_cours,
                ]);
                exit;
            }
        }

        if ($code === '') {
            // Ajout d'un nouveau stage
            $action =  'ajouté';
            $code = 'STG-' . date('Ymd') . '-' . sprintf('%03d', rand(1, 999));
            $sql = "INSERT INTO t_stages (code, code_stagiaire, date_debut, date_fin, objectif_stage, statut) 
                    VALUES (:code, :code_stagiaire, :date_debut, :date_fin, :objectif_stage, :statut)";
        } else {
            // Modification d'un  stage existant
            $action = 'modifié';
            $statut = !empty($date_fin) ? 'Terminé' : $statut; // changer le statut en terminé si la date fin est renseignée
            $sql = "UPDATE t_stages SET 
                    code_stagiaire = :code_stagiaire, 
                    date_debut = :date_debut, 
                    date_fin = :date_fin, 
                    objectif_stage = :objectif_stage, 
                    statut = :statut 
                    WHERE code = :code";
        }

        // Préparation et exécution de la requête
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':code_stagiaire', $code_stagiaire);
        $stmt->bindParam(':date_debut', $date_debut);
        $stmt->bindParam(':date_fin', $date_fin);
        $stmt->bindParam(':objectif_stage', $objectif_stage);
        $stmt->bindParam(':statut', $statut);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => "Stage $action avec succès."]);
        } else {
            echo json_encode(['success' => false, 'message' => "Erreur lors de $action du stage : " . implode(", ", $stmt->errorInfo())]);
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
        'message' => 'Méthode de requête invalide.',
    ]);
}