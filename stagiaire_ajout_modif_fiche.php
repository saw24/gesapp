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
        $code = $_POST['code'] ?? genererCodeUnique();
        $nom = $_POST['nom'];
        $sexe = $_POST['sexe'];
        $date_nsce = !empty($_POST['date_nsce']) ? $_POST['date_nsce'] : null;
        $lieu_nsce = $_POST['lieu_nsce'];
        $nationalite = $_POST['nationalite'];
        $ecole = $_POST['ecole'];
        $filiere = $_POST['filiere'];
        $niveau = $_POST['niveau'];
        $type = $_POST['type'];

        // Insertion ou mise à jour dans la table t_stagiaires
        if (empty($_POST['code'])) {
            $stmtStagiaire = $db->prepare("INSERT INTO t_stagiaires (code, nom, sexe, date_nsce, lieu_nsce, nationalite, ecole, filiere, niveau, type) 
                                          VALUES (:code, :nom, :sexe, :date_nsce, :lieu_nsce, :nationalite, :ecole, :filiere, :niveau, :type)");
        } else {
            $stmtStagiaire = $db->prepare("UPDATE t_stagiaires SET nom = :nom, sexe = :sexe, date_nsce = :date_nsce, lieu_nsce = :lieu_nsce, 
                                           nationalite = :nationalite, ecole = :ecole, filiere = :filiere, niveau = :niveau, type = :type
                                           WHERE code = :code");
        }

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

        // Exécution de l'insertion ou de la mise à jour du stagiaire
        if ($stmtStagiaire->execute()) {
            // Récupération des données du stage
            $code_stage = $_POST['code_stage'] ?? genererCodeUnique();
            $date_debut_stage = !empty($_POST['date_debut']) ? $_POST['date_debut'] : null;
            $date_fin_stage = !empty($_POST['date_fin']) ? $_POST['date_fin'] : null;
            $objectif_stage = $_POST['objectif_stage'];
            $statut_stage = $_POST['statut'];

            if (!empty($date_debut_stage)) {
                // Insertion ou mise à jour dans la table t_stages
                if (empty($_POST['code_stage'])) {
                    $stmtStage = $db->prepare("INSERT INTO t_stages (code, code_stagiaire, date_debut, date_fin, objectif_stage, statut) 
                                         VALUES (:code_stage, :code_stagiaire, :date_debut_stage, :date_fin_stage, :objectif_stage, :statut)");
                } else {
                    $stmtStage = $db->prepare("UPDATE t_stages SET date_debut = :date_debut_stage, date_fin = :date_fin_stage, 
                                            objectif_stage = :objectif_stage, statut = :statut
                                            WHERE code = :code_stage AND code_stagiaire = :code_stagiaire");
                }

                // Liaison des paramètres
                $stmtStage->bindParam(':code_stage', $code_stage);
                $stmtStage->bindParam(':code_stagiaire', $code);
                $stmtStage->bindParam(':date_debut_stage', $date_debut_stage);
                $stmtStage->bindParam(':date_fin_stage', $date_fin_stage);
                $stmtStage->bindParam(':objectif_stage', $objectif_stage);
                $stmtStage->bindParam(':statut', $statut_stage);

                // Exécution de l'insertion ou de la mise à jour du stage
                if ($stmtStage->execute()) {
                    // Récupération des données du passage de service
                    $code_passage_service = $_POST['code_passage_service'] ?? genererCodeUnique();
                    $code_service = $_POST['code_service'];
                    $date_debut_service = !empty($_POST['date_debut_service']) ? $_POST['date_debut_service'] : null;
                    $date_fin_service = !empty($_POST['date_fin_service']) ? $_POST['date_fin_service'] : null;
                    $evaluation = $_POST['evaluation'];

                    if (!empty($date_debut_service)) {
                        // Insertion ou mise à jour dans la table t_passages_services
                        if (empty($_POST['code_passage_service'])) {
                            $stmtPassage = $db->prepare("INSERT INTO t_passages_services (code, code_stage, code_service, date_debut, date_fin, evaluation) 
                                               VALUES (:code_passage_service, :code_stage_passage, :code_service_passage, :date_debut_service_passage, :date_fin_service_passage, :evaluation)");
                        } else {
                            $stmtPassage = $db->prepare("UPDATE t_passages_services SET code_service = :code_service_passage, 
                                              date_debut = :date_debut_service_passage, date_fin = :date_fin_service_passage, evaluation = :evaluation
                                              WHERE code = :code_passage_service AND code_stage = :code_stage_passage");
                        }

                        // Liaison des paramètres
                        $stmtPassage->bindParam(':code_passage_service', $code_passage_service);
                        $stmtPassage->bindParam(':code_stage_passage', $code_stage);
                        $stmtPassage->bindParam(':code_service_passage', $code_service);
                        $stmtPassage->bindParam(':date_debut_service_passage', $date_debut_service);
                        $stmtPassage->bindParam(':date_fin_service_passage', $date_fin_service);
                        $stmtPassage->bindParam(':evaluation', $evaluation);

                        // Exécution de l'insertion ou mise à jour du passage de service
                        if ($stmtPassage->execute()) {
                            // Valider la transaction
                            $db->commit();
                            echo json_encode([
                                'status' => 'success',
                                'message' => 'Données mises à jour avec succès.'
                            ]);
                        } else {
                            throw new Exception("Erreur lors de l'enregistrement du passage de service.");
                        }
                    } else {
                        // Si aucun passage de service n'a été soumis
                        $db->commit();
                        echo json_encode([
                            'status' => 'success',
                            'message' => 'Données mises à jour avec succès.'
                        ]);
                    }
                } else {
                    throw new Exception("Erreur lors de l'enregistrement du stage.");
                }
            } else {
                // Si aucun stage n'a été soumis
                $db->commit();
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Données mises à jour avec succès.'
                ]);
            }
        } else {
            throw new Exception("Erreur lors de l'enregistrement des données du stagiaire.");
        }
    }
} catch (PDOException $e) {
    // Annuler la transaction en cas d'erreur
    $db->rollBack();
    echo json_encode([
        'status' => 'error',
        'message' => 'Erreur de connexion : ' . htmlspecialchars($e->getMessage())
    ]);
} catch (Exception $e) {
    // Annuler la transaction en cas d'erreur
    $db->rollBack();
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
