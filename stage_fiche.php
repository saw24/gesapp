<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un nouveau stage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Ajouter un nouveau stage</h2>
        <form id="formNouveauStage" action="ajouter_stage.php" method="POST">
            <div class="mb-3">
                <label for="id_stagiaire" class="form-label">Stagiaire</label>
                <select class="form-select" id="id_stagiaire" name="id_stagiaire" required>
                    <option value="">Sélectionnez un stagiaire</option>
                    <!-- Options seront remplies dynamiquement avec PHP -->
                </select>
            </div>
            <div class="mb-3">
                <label for="date_debut" class="form-label">Date de début</label>
                <input type="date" class="form-control" id="date_debut" name="date_debut" required>
            </div>
            <div class="mb-3">
                <label for="date_fin" class="form-label">Date de fin</label>
                <input type="date" class="form-control" id="date_fin" name="date_fin" required>
            </div>
            <div class="mb-3">
                <label for="objectif_stage" class="form-label">Objectif du stage</label>
                <textarea class="form-control" id="objectif_stage" name="objectif_stage" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter le stage</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Ici, vous pouvez ajouter du code jQuery pour la validation côté client
        });
    </script>
</body>

</html>