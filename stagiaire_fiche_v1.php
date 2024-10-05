<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement Stagiaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
    }

    .form-section {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }

    .form-section h4 {
        color: #007bff;
        border-bottom: 2px solid #007bff;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .btn-submit {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-submit:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Enregistrement Stagiaire</h2>
        <form id="stagiaireForm">
            <!-- Section Informations Personnelles -->
            <div class="form-section">
                <h4>Informations Personnelles</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="code" class="form-label">Code Stagiaire</label>
                        <input type="text" class="form-control" id="code" name="code" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="sexe" class="form-label">Sexe</label>
                        <select class="form-select" id="sexe" name="sexe" required>
                            <option value="">Choisir...</option>
                            <option value="Masculin">Masculin</option>
                            <option value="Féminin">Féminin</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="date_nsce" class="form-label">Date de Naissance</label>
                        <input type="date" class="form-control" id="date_nsce" name="date_nsce" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="lieu_nsce" class="form-label">Lieu de Naissance</label>
                        <input type="text" class="form-control" id="lieu_nsce" name="lieu_nsce" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nationalite" class="form-label">Nationalité</label>
                        <input type="text" class="form-control" id="nationalite" name="nationalite" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="ecole" class="form-label">École</label>
                        <input type="text" class="form-control" id="ecole" name="ecole" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="filiere" class="form-label">Filière</label>
                        <input type="text" class="form-control" id="filiere" name="filiere" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="niveau" class="form-label">Niveau</label>
                        <input type="text" class="form-control" id="niveau" name="niveau" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" class="form-control" id="type" name="type" required>
                </div>
            </div>

            <!-- Section Détails du Stage -->
            <div class="form-section">
                <h4>Détails du Stage</h4>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="code_stage" class="form-label">Code Stage</label>
                        <input type="text" class="form-control" id="code_stage" name="code_stage" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="date_debut" class="form-label">Date de Début</label>
                        <input type="date" class="form-control" id="date_debut" name="date_debut" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="date_fin" class="form-label">Date de Fin</label>
                        <input type="date" class="form-control" id="date_fin" name="date_fin" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="objectif_stage" class="form-label">Objectif du Stage</label>
                    <textarea class="form-control" id="objectif_stage" name="objectif_stage" rows="3"
                        required></textarea>
                </div>
                <div class="mb-3">
                    <label for="statut" class="form-label">Statut</label>
                    <select class="form-select" id="statut" name="statut" required>
                        <option value="">Choisir...</option>
                        <option value="En cours">En cours</option>
                        <option value="Terminé">Terminé</option>
                        <option value="Annulé">Annulé</option>
                    </select>
                </div>
            </div>

            <!-- Section Premier Service -->
            <div class="form-section">
                <h4>Premier Service</h4>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="code_service" class="form-label">Code Service</label>
                        <input type="text" class="form-control" id="code_service" name="code_service" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="date_debut_service" class="form-label">Date de Début</label>
                        <input type="date" class="form-control" id="date_debut_service" name="date_debut_service"
                            required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="date_fin_service" class="form-label">Date de Fin</label>
                        <input type="date" class="form-control" id="date_fin_service" name="date_fin_service" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="evaluation" class="form-label">Évaluation</label>
                    <textarea class="form-control" id="evaluation" name="evaluation" rows="3"></textarea>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg btn-submit">Enregistrer</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#stagiaireForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'enregistrer_stagiaire.php',
                data: $(this).serialize(),
                success: function(response) {
                    alert(response);
                },
                error: function() {
                    alert('Erreur lors de l\'enregistrement.');
                }
            });
        });
    });
    </script>
</body>

</html>