<?php
// Connexion à la base de données
// se connecter à la base de données
require_once 'getCode.php'; // inclure la classe ConnexionDB
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

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et nettoyage des données du formulaire
    $code = isset($_POST['code']) ? trim($_POST['code']) : '';
    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';

    // Validation basique
    if (empty($nom)) {
        //die("Le nom du étudiant est requis.");
        echo json_encode([
            'status' => 'success',
            'message' => 'Le nom du Type est requis.',
            'code' => $code
        ]);
        die();
    }

    try {
        // Si code est vide, c'est un nouvel ajout
        if (empty($code)) {
            // Générer un code unique
            $code = genererCodeUnique();

            $sql = "INSERT INTO t_types_etudiant (nom, code) VALUES (:nom, :code)";
            $stmt = $db->prepare($sql);
            $stmt->execute(['nom' => $nom, 'code' => $code]);

            //echo "Nouveau étudiant ajouté avec succès.";
            // Réponse JSON
            echo json_encode([
                'status' => 'success',
                'message' => 'Nouveau étudiant ajouté avec succès',
                'code' => $code
            ]);
        }
        // Sinon, c'est une mise à jour
        else {
            $sql = "UPDATE t_types_etudiant SET nom = :nom WHERE code = :code";
            $stmt = $db->prepare($sql);
            $stmt->execute(['nom' => $nom, 'code' => $code]);

            if ($stmt->rowCount() > 0) {
                //echo "étudiant mis à jour avec succès.";
                // Réponse JSON
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Type mis à jour avec succès !',
                    'code' => $code
                ]);
            } else {
                //echo "Aucune modification n'a été effectuée ou la étudiant n'existe pas.";
                echo json_encode([
                    'status' => 'success',
                    'message' => "Aucune modification n'a été effectuée ou le Type n'existe pas!",
                    'code' => $code
                ]);
            }
        }
    } catch (PDOException $e) {
        //die("Erreur lors de l'opération : " . $e->getMessage());
        echo json_encode([
            'status' => 'error',
            'message' => "Erreur lors de l'opération : " . $e->getMessage()
        ]);
    }
} else {
    //echo "Méthode non autorisée.";
    echo json_encode([
        'status' => 'error',
        'message' => 'Méthode non autorisée'
    ]);
}

// Redirection vers la page de liste des étudiants (à adapter selon votre structure)
// header("Location: liste_étudiants.php");
