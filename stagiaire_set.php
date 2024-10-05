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

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et nettoyage des données du formulaire
    $code = isset($_POST['code']) ? trim($_POST['code']) : '';
    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
    $sexe = isset($_POST['sexe']) ? trim($_POST['sexe']) : '';
    $date_nsce = isset($_POST['date_nsce']) ? trim($_POST['date_nsce']) : null; // Null si vide
    $lieu_nsce = isset($_POST['lieu_nsce']) ? trim($_POST['lieu_nsce']) : '';
    $nationalite = isset($_POST['nationalite']) ? trim($_POST['nationalite']) : '';
    $ecole = isset($_POST['ecole']) ? trim($_POST['ecole']) : '';
    $filiere = isset($_POST['filiere']) ? trim($_POST['filiere']) : '';
    $niveau = isset($_POST['niveau']) ? trim($_POST['niveau']) : '';
    $type = isset($_POST['type']) ? trim($_POST['type']) : '';

    // Validation basique
    if (empty($nom) || empty($sexe) || empty($lieu_nsce) || empty($nationalite) || empty($ecole) || empty($filiere) || empty($niveau) || empty($type)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Tous les champs sauf la date de naissance sont requis.'
        ]);
        die();
    }

    try {
        // Si code est vide, c'est un nouvel ajout
        if (empty($code)) {
            // Générer un code unique
            $code = genererCodeUnique();

            $sql = "INSERT INTO t_stagiaires (code, nom, sexe, date_nsce, lieu_nsce, nationalite, ecole, filiere, niveau, type) 
                VALUES (:code, :nom, :sexe, :date_nsce, :lieu_nsce, :nationalite, :ecole, :filiere, :niveau, :type)";
            $stmt = $db->prepare($sql);

            // Bind des paramètres
            $stmt->bindParam(':code', $code);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':sexe', $sexe);

            // Utilisation de PDO::PARAM_NULL si date_nsce est null
            if ($date_nsce) {
                $stmt->bindParam(':date_nsce', $date_nsce);
            } else {
                $stmt->bindValue(':date_nsce', null, PDO::PARAM_NULL);
            }

            $stmt->bindParam(':lieu_nsce', $lieu_nsce);
            $stmt->bindParam(':nationalite', $nationalite);
            $stmt->bindParam(':ecole', $ecole);
            $stmt->bindParam(':filiere', $filiere);
            $stmt->bindParam(':niveau', $niveau);
            $stmt->bindParam(':type', $type);

            // Exécution de la requête
            $stmt->execute();

            echo json_encode([
                'status' => 'success',
                'message' => 'Nouveau stagiaire ajouté avec succès',
                'code' => $code
            ]);
        }
        // Sinon, c'est une mise à jour
        else {
            $sql = "UPDATE t_stagiaires SET 
                nom = :nom, 
                sexe = :sexe, 
                date_nsce = :date_nsce, 
                lieu_nsce = :lieu_nsce, 
                nationalite = :nationalite, 
                ecole = :ecole, 
                filiere = :filiere, 
                niveau = :niveau, 
                type = :type 
                WHERE code = :code";
            $stmt = $db->prepare($sql);

            // Bind des paramètres
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':sexe', $sexe);

            // Utilisation de PDO::PARAM_NULL si date_nsce est null
            if ($date_nsce) {
                $stmt->bindParam(':date_nsce', $date_nsce);
            } else {
                $stmt->bindValue(':date_nsce', null, PDO::PARAM_NULL);
            }

            $stmt->bindParam(':lieu_nsce', $lieu_nsce);
            $stmt->bindParam(':nationalite', $nationalite);
            $stmt->bindParam(':ecole', $ecole);
            $stmt->bindParam(':filiere', $filiere);
            $stmt->bindParam(':niveau', $niveau);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':code', $code);

            // Exécution de la requête
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Stagiaire mis à jour avec succès !',
                    'code' => $code
                ]);
            } else {
                echo json_encode([
                    'status' => 'warning',
                    'message' => "Aucune modification n'a été effectuée ou le stagiaire n'existe pas!",
                    'code' => $code
                ]);
            }
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
        'message' => 'Méthode non autorisée'
    ]);
}
