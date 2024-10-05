<?php
// Connexion à la base de données
// se connecter à la base de données
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

 try {
    $sql = "SELECT * FROM t_ecoles;";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $tbody = '';
        if ($stmt->rowCount() > 0) {
            // Réponse JSON

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $tbody .= '<tr>';
                $tbody .= "<td hidden>" . htmlspecialchars($row['code']) . "</td>";
                $tbody .= "<td>" . htmlspecialchars($row['nom']) . "</td>";
                $tbody .= "<td>" . htmlspecialchars($row['correspondant']) . "</td>";
                $tbody .= "<td>" . htmlspecialchars($row['adre_ecole']) . "</td>";
                $tbody .= "<td>" . htmlspecialchars($row['tel_ecole']) . "</td>";
                $tbody .= "<td>" . htmlspecialchars($row['email_ecole']) . "</td>";
                $tbody .= '<td>
                <div class="form-button-action">
                                <button
                                  type="button"
                                  data-bs-toggle="tooltip"
                                  title=""
                                  class="btn btn-link btn-primary btn-lg btn_modifier"
                                  data-original-title="Edit Task"
                                >
                                  <i class="fa fa-edit"></i>
                                </button>
                                <button
                                  type="button"
                                  data-bs-toggle="tooltip"
                                  title=""
                                  class="btn btn-link btn-danger btn_supprimer"
                                  data-original-title="Remove"
                                >
                                 <i class="fa fa-times"></i>
                                </button>
                </td>';

                $tbody .= '</tr>';
            }
            



            echo json_encode([
                'status' => 'success',
                'message' => 'Liste OK',
                'donnees' => $tbody
            ]);
        } else {
            echo json_encode([
                'status' => 'success',
                'message' => "Liste vide",
                'donnees' => $tbody
            ]);
        }
} catch(PDOException $e) {
    //die("Erreur lors de l'opération : " . $e->getMessage());
    echo json_encode([
        'status' => 'error',
        'message' => "Erreur lors de l'opération : " . $e->getMessage()
    ]);
}




?>
 
