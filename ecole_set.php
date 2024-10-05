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
    $correspondant = isset($_POST['correspondant']) ? trim($_POST['correspondant']) : '';
    $adre_ecole = isset($_POST['adre_ecole']) ? trim($_POST['adre_ecole']) : '';
    $tel_ecole = isset($_POST['tel_ecole']) ? trim($_POST['tel_ecole']) : '';
    $email_ecole = isset($_POST['email_ecole']) ? trim($_POST['email_ecole']) : '';

    // Validation basique
    if (empty($nom)) {
        //die("Le nom du service est requis.");
        echo json_encode([
            'status' => 'success',
            'message' => 'Le nom du service est requis.',
            'code' => $code
        ]);
        die();
    }

    try {
        // Si code est vide, c'est un nouvel ajout
        if (empty($code)) {
            // Générer un code unique
            $code = genererCodeUnique();

            $sql = "INSERT INTO t_ecoles (nom, code, correspondant, adre_ecole, tel_ecole, email_ecole) VALUES (:nom, :code, :correspondant, :adre_ecole, :tel_ecole, :email_ecole)";
            $stmt = $db->prepare($sql);
            $stmt->execute(['nom' => $nom, 
                'code' => $code, 
                'correspondant' => $correspondant, 
                'adre_ecole' => $adre_ecole, 
                'tel_ecole' => $tel_ecole, 
                'email_ecole' => $email_ecole
            ]);
            
            //echo "Nouveau service ajouté avec succès.";
            // Réponse JSON
            echo json_encode([
                'status' => 'success',
                'message' => 'Nouveau service ajouté avec succès',
                'code' => $code
            ]);

        } 
        // Sinon, c'est une mise à jour
        else {
            $sql = "UPDATE t_ecoles SET 
            nom = :nom,
            correspondant = :correspondant, 
            adre_ecole = :adre_ecole, 
            tel_ecole = :tel_ecole, 
            email_ecole = :email_ecole
             WHERE code = :code";
            $stmt = $db->prepare($sql);
            $stmt->execute(['nom' => $nom, 
                'code' => $code, 
                'correspondant' => $correspondant, 
                'adre_ecole' => $adre_ecole, 
                'tel_ecole' => $tel_ecole, 
                'email_ecole' => $email_ecole
            ]);
            
            if ($stmt->rowCount() > 0) {
                //echo "Service mis à jour avec succès.";
                // Réponse JSON
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Service mis à jour avec succès !',
                    'code' => $code
                ]);
            } else {
                //echo "Aucune modification n'a été effectuée ou le service n'existe pas.";
                echo json_encode([
                    'status' => 'success',
                    'message' => "Aucune modification n'a été effectuée ou le service n'existe pas!",
                    'code' => $code
                ]);
            }
        }
    } catch(PDOException $e) {
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

// Redirection vers la page de liste des services (à adapter selon votre structure)
// header("Location: liste_services.php");
?>