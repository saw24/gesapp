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


    $sql = "SELECT 
            e.nom AS ecole,
            COUNT(*) AS nombre_stagiaires
        FROM 
            t_stagiaires s 
            LEFT JOIN t_ecoles e ON e.code = s.ecole 
        GROUP BY 
            s.ecole
        ORDER BY 
            nombre_stagiaires DESC, s.ecole ASC;";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $stagiaires_par_ecole = $stmt->fetchAll();


    // Préparation de la réponse JSON
    echo json_encode(['success' => true,
        'stagiaires_par_ecole' => $stagiaires_par_ecole
        ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Erreur de connexion : ' . $e->getMessage()
    ]);
}
