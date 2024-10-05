<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=ta_base_de_donnees', 'ton_utilisateur', 'ton_mot_de_passe');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparation des requêtes
    $stmt_stagiaire = $pdo->prepare("INSERT INTO t_stagiaires (code, nom, sexe, date_nsce, lieu_nsce, nationalite, ecole, filiere, niveau, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt_stage = $pdo->prepare("INSERT INTO t_stages (code, code_stagiaire, date_debut, date_fin, objectif_stage, statut) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt_service = $pdo->prepare("INSERT INTO t_passages_services (code, code_stage, code_service, date_debut, date_fin, evaluation) VALUES (?, ?, ?, ?, ?, ?)");

    // Exécution des requêtes
    $pdo->beginTransaction();
    $stmt_stagiaire->execute([$_POST['code'], $_POST['nom'], $_POST['sexe'], $_POST['date_nsce'], $_POST['lieu_nsce'], $_POST['nationalite'], $_POST['ecole'], $_POST['filiere'], $_POST['niveau'], $_POST['type']]);
    $stmt_stage->execute([$_POST['code_stage'], $_POST['code'], $_POST['date_debut'], $_POST['date_fin'], $_POST['objectif_stage'], $_POST['statut']]);
    $stmt_service->execute([$_POST['code_service'], $_POST['code_stage'], $_POST['code_service'], $_POST['date_debut_service'], $_POST['date_fin_service'], $_POST['evaluation']]);
    $pdo->commit();

    echo "Enregistrement réussi !";
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Échec de l'enregistrement : " . $e->getMessage();
}
