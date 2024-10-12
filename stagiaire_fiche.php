<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once('head_content.php') ?>
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

    /* Classe pour indiquer un champ obligatoire vide */
    input.error,
    select.error {
        border: 2px solid red;
    }

    /* Classe pour indiquer un libellé d'un champ vide */
    label.error {
        color: red;
    }
    </style>

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include_once('sidebar_left.php') ?>
        <!-- End Sidebar -->
        <!-- Bouton flottant avec l'icône "plus" -->
        <button class="btn-flottant" id="bouton-flottant">
            <i class="fas fa-plus"></i>
        </button>
        <div class="main-panel">
            <!-- Entete -->
            <?php include_once('entete_page.php') ?>
            <!-- Fin Entete -->

            <!-- Corps -->
            <div class="container mt-5">
                <div class="page-inner">

                    <form id="stagiaireForm">
                        <!-- Section Informations Personnelles -->
                        <div class="form-section">
                            <h4>Informations Personnelles</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3" hidden>
                                    <label for="code" class="form-label">Code Stagiaire</label>
                                    <input type="text" class="form-control" id="code" name="code" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nom" class="form-label" id="label_nom">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="sexe" class="form-label" id="label_sexe">Sexe</label>
                                    <select class="form-select" id="sexe" name="sexe" required>
                                        <option value="">Choisir...</option>
                                        <option value="Masculin">Masculin</option>
                                        <option value="Féminin">Féminin</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="date_nsce" class="form-label" id="label_date_nsce">Date de
                                        Naissance</label>
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

                                    <div class="input-group">
                                        <select class="form-control" id="nationalite" name="nationalite" required>
                                            <option value="">Sélectionnez</option>
                                        </select>
                                        <button type="button" class="btn btn-primary btn_AjoutOption"
                                            data-bs-toggle="modal" title="Ajouter un nouveau Pays" data-idselect="pays"
                                            data-urlajout="pays_set.php" data-urlget="pays_get_liste.php">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="ecole" class="form-label" id="label_ecole">École</label>
                                    <div class="input-group">
                                        <select class="form-control" id="ecole" name="ecole" required>
                                            <option value="">Sélectionnez</option>
                                        </select>
                                        <button type="button" class="btn btn-primary btn_AjoutOption"
                                            data-bs-toggle="modal" title="Ajouter une nouvelle école"
                                            data-idselect="ecole" data-urlajout="ecole_set.php"
                                            data-urlget="ecole_get_liste.php">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="filiere" class="form-label">Filière</label>
                                    <div class="input-group">
                                        <select class="form-control" id="filiere" name="filiere" required>
                                            <option value="">Sélectionnez</option>
                                        </select>
                                        <button type="button" class="btn btn-primary btn_AjoutOption"
                                            data-bs-toggle="modal" title="Ajouter une nouvelle filière"
                                            data-idselect="filiere" data-urlajout="filiere_set.php"
                                            data-urlget="filiere_get_liste.php">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="niveau" class="form-label">Niveau</label>
                                    <div class="input-group">
                                        <select class="form-control" id="niveau" name="niveau">
                                            <option value="">Sélectionnez</option>
                                        </select>
                                        <button type="button" class="btn btn-primary btn_AjoutOption"
                                            data-bs-toggle="modal" title="Ajouter un nouveau Niveau"
                                            data-idselect="niveau" data-urlajout="niveau_set.php"
                                            data-urlget="niveau_get_liste.php">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3" hidden>
                                <label for="type" class="form-label">Type</label>
                                <div class="input-group">
                                    <select class="form-control" id="type" name="type" required>
                                        <option value="">Sélectionnez</option>
                                    </select>
                                    <button type="button" class="btn btn-primary btn_AjoutOption" data-bs-toggle="modal"
                                        title="Ajouter un nouveau Type Etudiant" data-idselect="type"
                                        data-urlajout="type_set.php" data-urlget="type_get_liste.php">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Section Détails du Stage -->
                        <div class="form-section">
                            <h4>Détails du Stage</h4>
                            <div class="row">
                                <div class="col-md-4 mb-3" hidden>
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
                                <select class="form-control" id="statut" name="statut" required>
                                    <option value="En cours">En cours</option>
                                    <option value="Terminé">Terminé</option>
                                    <option value="Abandon">Abandon</option>
                                    <option value="Annulé">Annulé</option>
                                </select>
                            </div>
                        </div>

                        <!-- Section Premier Service -->
                        <div class="form-section">
                            <h4>Premier Service</h4>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="code_service" class="form-label">Service</label>
                                    <div class="input-group">
                                        <select class="form-control" id="code_service" name="code_service" required>
                                            <option value="">Sélectionnez</option>
                                            <!-- Les options seront remplies dynamiquement -->
                                        </select>
                                        <button type="button" class="btn btn-primary btn_AjoutOption"
                                            data-bs-toggle="modal" title="Ajouter un nouveau Service"
                                            data-idselect="code_service" data-urlajout="service_set.php"
                                            data-urlget="service_get_liste.php">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="date_debut_service" class="form-label">Date de Début</label>
                                    <input type="date" class="form-control" id="date_debut_service"
                                        name="date_debut_service" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="date_fin_service" class="form-label">Date de Fin</label>
                                    <input type="date" class="form-control" id="date_fin_service"
                                        name="date_fin_service" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="evaluation" class="form-label">Évaluation</label>
                                <textarea class="form-control" id="evaluation" name="evaluation" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="text-right" style="text-align: right;">
                            <button type="button" class="btn btn-secondary btn_fermer" id="btn_fermerFiche">Fermer
                            </button>
                            <button type="button" class="btn btn-primary" id="btn_enregistrerFiche">Enregistrer</button>
                        </div>
                    </form>

                    <div id="responseMessage"></div>

                </div>
                <?php include_once('message_box.php') ?>
            </div>
            <!-- Fin Corps -->

            <!-- Entete -->
            <?php include_once('pied_de_page.php') ?>
            <!-- Fin Entete -->

        </div>

        <!-- Custom template | don't include it in your project! -->
        <?php include_once('change_theme.php') ?>
        <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <?php include_once('js_files.php') ?>
    <!-- End Core JS Files -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {

        //--- remplir les select
        getSelectOptions('nationalite', 'pays_get_liste.php');
        getSelectOptions('ecole', 'ecole_get_liste_legere.php');
        getSelectOptions('type', 'type_get_liste.php');
        getSelectOptions('filiere', 'filiere_get_liste.php');
        getSelectOptions('niveau', 'niveau_get_liste.php');
        getSelectOptions('code_service', 'service_get_liste.php');

        //---- FERMER la  fenetre
        $("#btn_fermerFiche").click(function() {
            window.location.href = 'stagiaire_liste.php?pageName=Liste Stagiaires';
        });


        $('#btn_enregistrerFiche').on('click', function(e) {
            e.preventDefault(); // Empêche le rechargement de la page



            // Récupération des données du formulaire
            let formData = {
                code: $('#code').val(),
                nom: $('#nom').val(),
                sexe: $('#sexe').val(),
                date_nsce: $('#date_nsce').val(),
                lieu_nsce: $('#lieu_nsce').val(),
                nationalite: $('#nationalite').val(),
                ecole: $('#ecole').val(),
                filiere: $('#filiere').val(),
                niveau: $('#niveau').val(),
                type: $('#type').val(),
                code_stage: $('#code_stage').val(),
                date_debut: $('#date_debut').val(),
                date_fin: $('#date_fin').val(),
                objectif_stage: $('#objectif_stage').val(),
                statut: $('#statut').val(),
                code_service: $('#code_service').val(),
                date_debut_service: $('#date_debut_service').val(),
                date_fin_service: $('#date_fin_service').val(),
                evaluation: $('#evaluation').val()
            };


            // Réinitialiser les bordures et couleurs des libellés
            $('#nom, #sexe, #date_nsce').removeClass('error');
            $('#label_nom, #label_sexe, #label_date_nsce').removeClass('error');

            // Vérification des champs obligatoires
            let isValid = true;

            if (!formData.nom) {
                $('#nom').addClass('error'); // Ajoute la classe .error si le champ est vide
                $('#label_nom').addClass('error'); // Change la couleur du libellé en rouge
                isValid = false;
            }
            if (!formData.sexe) {
                $('#sexe').addClass('error'); // Ajoute la classe .error si le champ est vide
                $('#label_sexe').addClass('error'); // Change la couleur du libellé en rouge
                isValid = false;
            }
            if (!formData.date_nsce) {
                $('#date_nsce').addClass('error'); // Ajoute la classe .error si le champ est vide
                $('#label_date_nsce').addClass('error'); // Change la couleur du libellé en rouge
                isValid = false;
            }

            if (!formData.ecole) {
                $('#ecole').addClass('error'); // Ajoute la classe .error si le champ est vide
                $('#label_ecole').addClass('error'); // Change la couleur du libellé en rouge
                isValid = false;
            }

            // Si des champs sont vides, afficher un message d'erreur et stopper l'enregistrement
            if (!isValid) {
                $('#responseMessage').html(
                    '<div class="alert alert-danger">Veuillez remplir les champs obligatoires (Nom, Sexe, Date de naissance).</div>'
                );
                return; // Arrêter l'exécution si les champs ne sont pas remplis
            }

            $.ajax({
                //url: 'stagiaire_set2.php', // Remplace par l'URL de ton script PHP
                url: 'stagiaire_ajout_modif_fiche.php',
                type: 'POST',
                data: formData,
                dataType: 'json', // Spécifie que tu attends une réponse en JSON
                success: function(response) {
                    if (response.status === 'success') {
                        // Afficher le message de succès
                        $('#responseMessage').html('<div class="alert alert-success">' +
                            response.message + '</div>');
                    } else if (response.status === 'error') {
                        // Afficher le message d'erreur
                        $('#responseMessage').html('<div class="alert alert-danger">' +
                            response.message + '</div>');
                    }
                },
                error: function(xhr, status, error) {
                    // Gestion des erreurs inattendues
                    $('#responseMessage').html(
                        '<div class="alert alert-danger">Une erreur s\'est produite : ' +
                        error +
                        '</div><div class="alert alert-danger">Détails Erreur : ' +
                        xhr.responseText + '</div>');
                }
            });
        });


        //----- Fonction Remplir les champs Select ---------------

        function getSelectOptions(selectId, ajaxUrl) {
            // Appel AJAX vers le script PHP
            $.ajax({
                url: ajaxUrl,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Affichage du message de succès ou d'erreur
                    if (response.status === 'success') {
                        const $select = $('#' + selectId);
                        $select
                            .empty(); // Vider le sélecteur avant de le remplir avec les nouvelles données

                        // Parcourir response.donnees pour remplir le sélecteur
                        response.donnees.forEach(option => {
                            const $optionElement = $('<option></option>').val(option.code)
                                .text(option.nom);
                            $select.append($optionElement);
                        });
                    } else {
                        $('#resultat').html('<p style="color:red;">Erreur: ' + response.message +
                            '</p>');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("Erreur parser:", jqXHR
                        .responseText); // Voir la réponse du serveur dans la console
                    $('#resultat').html('<p style="color:red;">Une erreur s\'est produite : ' +
                        textStatus + '</p>');
                }
            });
        }



    });
    </script>

</body>

</html>