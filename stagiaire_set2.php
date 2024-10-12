<?php
// Connexion à la base de données
require_once 'getCode.php';
require_once 'connexion_db.php';
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
    // Commencer la transaction
    $db->beginTransaction();

    // Vérification si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des données du formulaire
        //$code = $_POST['code'];
        $code = genererCodeUnique();
        $nom = $_POST['nom'];
        $sexe = $_POST['sexe'];
        $date_nsce = !empty($_POST['date_nsce']) ? $_POST['date_nsce'] : null;
        $lieu_nsce = $_POST['lieu_nsce'];
        $nationalite = $_POST['nationalite'];
        $ecole = $_POST['ecole'];
        $filiere = $_POST['filiere'];
        $niveau = $_POST['niveau'];
        $type = $_POST['type'];

        // Insertion dans la table t_stagiaires
        $stmtStagiaire = $db->prepare("INSERT INTO t_stagiaires (code, nom, sexe, date_nsce, lieu_nsce, nationalite, ecole, filiere, niveau, type) 
                                          VALUES (:code, :nom, :sexe, :date_nsce, :lieu_nsce, :nationalite, :ecole, :filiere, :niveau, :type)");

        // Liaison des paramètres
        $stmtStagiaire->bindParam(':code', $code);
        $stmtStagiaire->bindParam(':nom', $nom);
        $stmtStagiaire->bindParam(':sexe', $sexe);
        $stmtStagiaire->bindParam(':date_nsce', $date_nsce);
        $stmtStagiaire->bindParam(':lieu_nsce', $lieu_nsce);
        $stmtStagiaire->bindParam(':nationalite', $nationalite);
        $stmtStagiaire->bindParam(':ecole', $ecole);
        $stmtStagiaire->bindParam(':filiere', $filiere);
        $stmtStagiaire->bindParam(':niveau', $niveau);
        $stmtStagiaire->bindParam(':type', $type);

        // Exécution de l'insertion du stagiaire
        if ($stmtStagiaire->execute()) {
            // Récupération des données du stage
            //$code_stage = $_POST['code_stage'];
            $code_stage = genererCodeUnique();
            $date_debut_stage = !empty($_POST['date_debut']) ? $_POST['date_debut'] : null;
            $date_fin_stage = !empty($_POST['date_fin']) ? $_POST['date_fin'] : null;
            $objectif_stage = $_POST['objectif_stage'];
            $statut_stage = $_POST['statut'];

            if (!empty($date_debut_stage)) {

                // Insertion dans la table t_stages
                $stmtStage = $db->prepare("INSERT INTO t_stages (code, code_stagiaire, date_debut, date_fin, objectif_stage, statut) 
                                         VALUES (:code_stage, :code_stagiaire, :date_debut_stage, :date_fin_stage, :objectif_stage, :statut)");

                // Liaison des paramètres
                $stmtStage->bindParam(':code_stage', $code_stage);
                $stmtStage->bindParam(':code_stagiaire', $code);
                $stmtStage->bindParam(':date_debut_stage', $date_debut_stage);
                $stmtStage->bindParam(':date_fin_stage', $date_fin_stage);
                $stmtStage->bindParam(':objectif_stage', $objectif_stage);
                $stmtStage->bindParam(':statut', $statut_stage);

                // Exécution de l'insertion du stage
                if ($stmtStage->execute()) {
                    // Récupération des données du passage de service
                    $code_service = $_POST['code_service'];
                    $code_passage_service = genererCodeUnique();
                    $date_debut_service = !empty($_POST['date_debut_service']) ? $_POST['date_debut_service'] : null;
                    $date_fin_service = !empty($_POST['date_fin_service']) ? $_POST['date_fin_service'] : null;
                    $evaluation = $_POST['evaluation'];



                    // Insertion dans la table t_passages_services
                    if (!empty($date_debut_service)) {
                        $stmtPassage = $db->prepare("INSERT INTO t_passages_services (code, code_stage, code_service, date_debut, date_fin, evaluation) 
                                               VALUES (:code_passage_service, :code_stage_passage, :code_service_passage, :date_debut_service_passage, :date_fin_service_passage, :evaluation)");

                        // Liaison des paramètres
                        $stmtPassage->bindParam(':code_passage_service', $code_passage_service);
                        $stmtPassage->bindParam(':code_stage_passage', $code_stage);
                        $stmtPassage->bindParam(':code_service_passage', $code_service);
                        $stmtPassage->bindParam(':date_debut_service_passage', $date_debut_service);
                        $stmtPassage->bindParam(':date_fin_service_passage', $date_fin_service);
                        $stmtPassage->bindParam(':evaluation', $evaluation);

                        // Exécution de l'insertion du passage de service
                        if ($stmtPassage->execute()) {
                            // Si tout s'est bien passé, valider la transaction
                            $db->commit();
                            echo json_encode([
                                'status' => 'success',
                                'message' => 'Données enregistrées avec succès.'
                            ]);
                        } else {
                            throw new Exception("Erreur lors de l'enregistrement des données pour le passage.");
                        }
                    } else {
                        // Tout s'est bien passé: pas d'ajout de passage
                        $db->commit();
                        echo json_encode([
                            'status' => 'success',
                            'message' => 'Données enregistrées avec succès.'
                        ]);
                    }
                } else {
                    throw new Exception("Erreur lors de l'enregistrement des données pour le stage.");
                }
            } else {
                // Tout s'est bien passé: pas d'ajout de stage ni passage
                $db->commit();
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Données enregistrées avec succès.'
                ]);
            }
        } else {
            throw new Exception("Erreur lors de l'enregistrement des données pour le stagiaire.");
        }
    }
} catch (PDOException $e) {
    // En cas d'erreur, annuler la transaction
    $db->rollBack();
    echo json_encode([
        'status' => 'error',
        'message' => 'Erreur de connexion : ' . htmlspecialchars($e->getMessage())
    ]);
} catch (Exception $e) {
    // En cas d'erreur d'application, annuler la transaction
    $db->rollBack();
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
