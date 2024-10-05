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
    $sql = "SELECT t_stagiaires.code AS code, t_stagiaires.nom AS nom, t_stagiaires.sexe AS sexe,
t_stagiaires.date_nsce AS date_nsce, t_stagiaires.lieu_nsce AS lieu_nsce,
t_pays.nom AS nationalite,
t_ecoles.nom AS ecole,
t_filieres.nom AS filiere,
t_niveaux_etudiant.nom AS niveau,
t_types_etudiant.nom AS type,
t_pays.code AS code_pays,
t_ecoles.code AS code_ecole,
t_filieres.code AS code_filiere,
t_niveaux_etudiant.code AS code_niveau,
t_types_etudiant.code AS code_type
FROM t_stagiaires 
LEFT JOIN t_pays ON t_pays.code = t_stagiaires.nationalite
LEFT JOIN t_ecoles ON t_ecoles.code = t_stagiaires.ecole
LEFT JOIN t_filieres ON t_filieres.code = t_stagiaires.filiere
LEFT JOIN t_niveaux_etudiant ON t_niveaux_etudiant.code = t_stagiaires.niveau
LEFT JOIN t_types_etudiant ON t_types_etudiant.code = t_stagiaires.type

ORDER BY nom;";
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
