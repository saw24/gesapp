<?php
// Assurez-vous que ce fichier est bien inclus et qu'il contient votre logique de connexion à la base de données
require_once 'connexion_db.php'; // inclure la classe ConnexionDB
$bd_connexion = new connexion_db();
$result = $bd_connexion->getConnexion();
$db = $result['connexion'];
$message = $result['message'];

// Vérifier si la connexion a réussi
if ($db === null) {
    //echo $message . "\n";
    echo json_encode([
        'status' => 'success',
        'message' => $message,
        'code' => $code
    ]);
    die();
}

// Fonction pour nettoyer les entrées
function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Vérifier si la requête est bien une requête POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si le code du service est présent
    if (isset($_POST['code']) && !empty($_POST['code'])) {
        $code = cleanInput($_POST['code']);
        
        try {
            // Préparer la requête de suppression
            $sql = "DELETE FROM t_ecoles WHERE code = :code";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':code', $code, PDO::PARAM_STR);
            
            // Exécuter la requête
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    // Suppression réussie
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Le service avec le code ' . $code . ' a été supprimé avec succès.'
                    ]);
                } else {
                    // Aucune ligne affectée, le service n'existait probablement pas
                    echo json_encode([
                        'status' => 'warning',
                        'message' => 'Aucun service trouvé avec le code ' . $code . '.'
                    ]);
                }
            } else {
                // Erreur lors de l'exécution de la requête
                throw new Exception("Erreur lors de la suppression du service.");
            }
        } catch (PDOException $e) {
            // Erreur de base de données
            error_log("Erreur PDO : " . $e->getMessage());
            echo json_encode([
                'status' => 'error',
                'message' => 'Une erreur est survenue lors de la suppression du service.'
            ]);
        } catch (Exception $e) {
            // Autres erreurs
            error_log("Erreur : " . $e->getMessage());
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    } else {
        // Code du service manquant
        echo json_encode([
            'status' => 'error',
            'message' => 'Le code du service est manquant.'
        ]);
    }
} else {
    // Méthode non autorisée
    http_response_code(405);
    echo json_encode([
        'status' => 'error',
        'message' => 'Méthode non autorisée.'
    ]);
}
?>