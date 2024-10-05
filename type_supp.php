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
function cleanInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Vérifier si la requête est bien une requête POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si le code du Type est présent
    if (isset($_POST['code']) && !empty($_POST['code'])) {
        $code = cleanInput($_POST['code']);

        try {
            // Préparer la requête de suppression
            $sql = "DELETE FROM t_types_etudiant WHERE code = :code";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':code', $code, PDO::PARAM_STR);

            // Exécuter la requête
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    // Suppression réussie
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Le Type avec le code ' . $code . ' a été supprimé avec succès.'
                    ]);
                } else {
                    // Aucune ligne affectée, le Type n'existait probablement pas
                    echo json_encode([
                        'status' => 'warning',
                        'message' => 'Aucun Type trouvé avec le code ' . $code . '.'
                    ]);
                }
            } else {
                // Erreur lors de l'exécution de la requête
                throw new Exception("Erreur lors de la suppression du Type.");
            }
        } catch (PDOException $e) {
            // Erreur de base de données
            error_log("Erreur PDO : " . $e->getMessage());
            echo json_encode([
                'status' => 'error',
                'message' => 'Une erreur est survenue lors de la suppression du Type.'
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
        // Code du Type manquant
        echo json_encode([
            'status' => 'error',
            'message' => 'Le code du Type est manquant.'
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
