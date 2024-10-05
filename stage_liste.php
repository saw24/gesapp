<?php
$codeFromURL = '';
if (isset($_GET['code_stagiaire'])) {
    $codeFromURL = $_GET['code_stagiaire'];
}
 echo '<span id="codeStagiaireHTML">'.$codeFromURL.'</span>';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once('head_content.php') ?>
    <style>
        /* Styles du bouton flottant */
        .btn-flottant {
            position: fixed;
            /* Fixe la position du bouton sur la page */
            bottom: 20px;
            /* Position du bouton à 20px du bas de la fenêtre */
            right: 20px;
            /* Position du bouton à 20px du bord droit de la fenêtre */
            background-color: #1572e8;
            /* Couleur de fond verte */
            color: white;
            /* Couleur de l'icône */
            border: none;
            /* Retire les bordures */
            border-radius: 50%;
            /* Donne une forme ronde */
            padding: 15px;
            /* Espacement interne du bouton */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            /* Ombre pour effet 3D */
            font-size: 24px;
            /* Taille de l'icône */
            cursor: pointer;
            /* Curseur en main pour l'interaction */
            z-index: 1000;
            /* Met le bouton au-dessus des autres éléments */
            transition: background-color 0.3s ease;
            /* Animation de transition */
        }

        .btn-flottant:hover {
            background-color: #428dec;
            /* Change la couleur au survol */
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
            <div class="container">
                
                <div class="page-inner">
                    <div
                        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <div>
                            <!--h3 class="fw-bold mb-3">Services</h3-->
                        </div>

                        <div class="ms-md-auto py-2 py-md-0">
                            <button class="btn btn-primary btn-round" id="btn_nouveauStage">Nouveau Stage</button>
                            <a href="stagiaire_liste.php" class="btn btn-primary btn-round">Fermer</a>
                        </div>

                    </div>
                    <div class="row">
                        <!-- Table liste des STAGEs--->
                        <table id="tableStages" class="table">
                            <thead>
                                <tr>
                                    <th hidden>Code Stage</th>
                                    <th>Date Début</th>
                                    <th>Date Fin</th>
                                    <th>Objectif</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="corpsTableStages">
                                <!-- Les lignes seront insérées ici dynamiquement par AJAX -->
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <table id="tablePassage" class="table">
                            <thead>
                                <tr>
                                    <th hidden>Code passage</th>
                                    <th>Date Début</th>
                                    <th>Date Fin</th>
                                    <th>Objectif</th>
                                    <th>Obesrvation</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="corpsTableStages">
                                <!-- Les lignes seront insérées ici dynamiquement par AJAX -->
                            </tbody>
                        </table>
                    </div>
                    <!-------------- Modal ajout Stage ------------------------------------------>
                    <div class="modal fade" id="modalFiche_Stage" tabindex="-1" role="dialog" aria-labelledby="modalFiche_StageLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalFiche_StageLabel">Ajouter un stage</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formAjoutStage">
                                        <input type="text" hidden id="code_stagiaire" name="code_stagiaire">
                                        <input type="text" hidden id="code" name="code">
                                        <div class="form-group">
                                            <label for="date_debut">Date de début</label>
                                            <input type="date" class="form-control" id="date_debut" name="date_debut" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="date_fin">Date de fin</label>
                                            <input type="date" class="form-control" id="date_fin" name="date_fin" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="statut">Statut</label>
                                            <select class="form-control" id="statut" name="statut" required>
                                                <option value="En cours">En cours</option>
                                                <option value="Terminé">Terminé</option>
                                                <option value="Abandon">Abandon</option>
                                                <option value="Annulé">Annulé</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="objectif_stage">Objectif du stage</label>
                                            <textarea class="form-control" id="objectif_stage" name="objectif_stage" rows="3" required></textarea>
                                        </div>
                                        <div class="form-group">
    <label for="si_objectif_atteint">Si Objectif atteint ?</label>
    <input type="checkbox" style="cursor: hand" id="si_objectif_atteint" name="si_objectif_atteint" value="0">
</div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn_fermerStage">Fermer</button>
                                    <button type="button" class="btn btn-primary" id="btn_enregistrerStage">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </div>

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

    <script>
        $(document).ready(function() {

            var codeStagiaire = "<?php echo $codeFromURL; ?>";
            getListeStage(codeStagiaire);


            //---------- Recuperer Liste Stages ----------------------------------
            function getListeStage(code_stagiaire) {
                $.ajax({
                    url: 'stage_get_liste.php', // Le script PHP pour récupérer la liste des stages
                    type: 'GET',
                    data: {
                        code_stagiaire: code_stagiaire
                    }, // On passe le code du stagiaire
                    dataType: 'json', // On attend du JSON en réponse
                    success: function(response) {
                        if (response.status === 'success') {
                            var rows = '';
                            $.each(response.donnees, function(index, stage) {
                                rows += '<tr>';
                                rows += '<td hidden>' + stage.code + '</td>';
                                rows += '<td data-date="' + stage.date_debut + '" >' + stage.date_debut + '</td>';
                                rows += '<td data-date="' + stage.date_fin + '" >' + stage.date_fin + '</td>';
                                rows += '<td>' + stage.objectif_stage + '</td>';
                                rows += '<td>' + stage.statut + '</td>';
                                rows += '<td>' +
                                    '<div class="form-button-action">' +
                                    '<button type="button" class="btn btn-link btn-primary btn-lg btn_modifier">' +
                                    '<i class="fa fa-edit"></i>' +
                                    '</button>' +
                                    '<button type="button" class="btn btn-link btn-danger btn_supprimer">' +
                                    '<i class="fa fa-times"></i>' +
                                    '</button>' +
                                    '<button type="button" class="btn btn-linkbtn-info btn-lg btn-liste-stages" data-code="' + stage.code + '">' +
                                    '<i class="fa fa-align-left"></i> Passages' +
                                    '</button>' +
                                    '</div>' +
                                    '</td>';
                                rows += '</tr>';
                            });
                            $('#corpsTableStages').html(rows); // Insertion des lignes dans le modal
                            $('#modalListeStages').modal('show'); // Afficher le modal
                        } else {
                            alert('Alert: ' + response.message);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Erreur AJAX:", textStatus, errorThrown);
                        alert('Erreur lors du chargement des stages.');
                    }
                });
            }


            //--------- Affichage un Stagiaire ---------------------------------
            $('tbody').on('click', '.btn_modifier', function(e) {

                var code_stagiaire = $('#codeStagiaireHTML').text();

                // Récupérer la ligne (tr) parente du bouton cliqué
                var $row = $(this).closest('tr');

                // Récupérer les données de chaque cellule de la ligne
                var code = $row.find('td:eq(0)').text();
                var date_debut = $row.find('td:eq(1)').text();
                var date_fin = $row.find('td:eq(2)').text();
                var objectif_stage = $row.find('td:eq(3)').text();
                var statut = $row.find('td:eq(4)').text();

                // Formater la date
                //var formattedDate = formatDate_versAnglais(date_nsce);

                //alert(date_debut)

                // Remplir le modal avec les données récupérées
                $('#modalFiche_Stage .modal-body #code_stagiaire').val(code_stagiaire);
                $('#modalFiche_Stage .modal-body #code').val(code);
                $('#modalFiche_Stage .modal-body #date_debut').val(date_debut);
                $('#modalFiche_Stage .modal-body #date_fin').val(date_fin);
                $('#modalFiche_Stage .modal-body #objectif_stage').val(objectif_stage);
                $('#modalFiche_Stage .modal-body #statut').val(statut);

                $("#modalFiche_Stage").modal("show");



            });



            //-------- Bouton Nouveau stage-------------------------------
            $(document).on('click', '#btn_nouveauStage', function() {
                var code_stagiaire = $('#codeStagiaireHTML').text();
                //alert("code: " + code_stagiaire);

                // Vérifier s'il existe déjà un stage en cours pour ce stagiaire
                $.ajax({
                    url: 'stage_verifier_encours.php',
                    method: 'GET',
                    data: {
                        code_stagiaire: code_stagiaire
                    },
                    success: function(response) {
                        if (response.status === "success") {
                            if (!response.nbre_stage_en_cours) {
                                //alert("si stage: " + response.codeSQL + " >> Code envoyé: " + code_stagiaire);
                                $('#code_stagiaire').val(code_stagiaire);
                                $('#modalFiche_Stage').modal('show');
                            } else {
                                //alert(response.message + " : " + response.nbre_stage_en_cours);
                                afficherMessage(response.message, 'Alerte');
                            }
                        } else {
                            //alert(response.message + " : " + response.nbre_stage_en_cours);
                            afficherMessage(response.message, 'Alerte');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("Erreur parser:", jqXHR.responseText);
                        alert('Erreur lors de la vérification du stage en cours.' + textStatus);
                    }
                });
            });

            //



            // ------- Enregistrement du stage -------------------------------
            $('#btn_enregistrerStage').click(function() {
                var formData = $('#formAjoutStage').serialize();
                //alert(formData);

                $.ajax({
                    url: 'stage_set.php',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            afficherMessage(response.message);
                            $('#modalFiche_Stage').modal('hide');
                            getListeStage(codeStagiaire);
                            // Recharger la liste des stagiaires ou mettre à jour l'interface utilisateur si nécessaire
                        } else {
                            afficherMessage('Erreur lors de l\'ajout du stage : ' + response.message,'Alerte');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("Erreur parser:", jqXHR.responseText);
                        alert('Erreur lors de la vérification du stage en cours.' + textStatus + " >> " + jqXHR.responseText);
                    }
                });
            });



            //--- Suppression 
            $('tbody').on('click', '.btn_supprimer', function(e) {
                e.preventDefault();

                var $row = $(this).closest('tr');
                var code = $row.find('td:eq(0)').text(); // Première cellule (code)
                var date_debut = $row.find('td:eq(1)').text();
                var date_fin = $row.find('td:eq(2)').text();

                // Afficher une boîte de dialogue de confirmation
                if (confirm("Êtes-vous sûr de vouloir supprimer le stage du: " + date_debut + " ?")) {
                    // L'utilisateur a confirmé, procéder à la suppression
                    $.ajax({
                        url: 'stage_supp.php',
                        method: 'POST',
                        data: {
                            code: code
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {
                                // Suppression réussie
                                alert("Le stage a été supprimé avec succès.");
                                $row.remove(); // Retire la ligne du tableau
                            } else {
                                // Erreur lors de la suppression
                                alert("Erreur lors de la suppression : " + response.message);
                            }
                        },
                        error: function() {
                            alert("Une erreur est survenue lors de la communication avec le serveur.");
                        }
                    });
                }
            });

            //--- Fin Suppression

            //--- Fermer Modal Stage -------------------------------------------
            $('#btn_fermerStage').click(function() {
                $('#modalFiche_Stage').modal('hide');
            });

            //--- Réinitialiser le formulaire lorsque la modal est fermée -------
            $('#modalFiche_Stage').on('hidden.bs.modal', function() {
                $('#formAjoutStage')[0].reset();
            });




            




// ---- Gestion Message Box -------------------------------------
            //afficherMessage('Ceci est un message d\'information.', 'Info');
            $("#btn_fermerMessageBox").click(function() {
                $("#messageModal").modal("hide");
            });


             //----- Fonction pour formater la date de yyyy-mm-dd à dd/mm/yyyy
             function formatDate(dateString) {
                var parts = dateString.split('-');
                if (parts.length === 3) {
                    return parts[2] + '/' + parts[1] + '/' + parts[0];
                }
                return dateString; // Retourner la chaîne originale si le format ne correspond pas
            }

            // Fonction pour formater la date
            function formatDate_versAnglais(dateString) {
                // Supposons que dateString est au format "DD/MM/YYYY"
                var parts = dateString.split('/');
                if (parts.length === 3) {
                    // Réorganiser au format "YYYY-MM-DD" pour l'input date
                    return parts[2] + '-' + parts[1].padStart(2, '0') + '-' + parts[0].padStart(2, '0');
                }
                return dateString; // Retourner la chaîne originale si le format ne correspond pas
            }





        });
    </script>


</body>

</html>