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

                            <button class="btn btn-primary btn-round ms-auto" id="btn_nouv">
                                <i class="fa fa-plus"></i>
                                Ajouter
                            </button>
                            <a href="index.php" class="btn btn-primary btn-round">Fermer<i class=""></i></a>
                        </div>

                    </div>
                    <div class="row">



                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <!----------- Modal ---------------------------->
                                    <div
                                        class="modal fade"
                                        id="modalFiche_Stagiaire"
                                        tabindex="-1"
                                        role="dialog"
                                        aria-hidden="true" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold"> Fiche</span>
                                                        <span class="fw-light"> Stagiaire </span>
                                                    </h5>
                                                    <button
                                                        type="button"
                                                        class="close"
                                                        data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="ajouter-stagiaire-form">
                                                        <input type="text" class="form-control" id="code" name="code" placeholder="Code" hidden />

                                                        <div class="form-group">
                                                            <label for="nom">Nom</label>
                                                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="sexe">Sexe</label>
                                                            <select class="form-control" id="sexe" name="sexe" required>
                                                                <option value="">Sélectionnez</option>
                                                                <option value="Homme">Homme</option>
                                                                <option value="Femme">Femme</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="date_nsce">Date de naissance</label>
                                                            <input type="date" class="form-control" id="date_nsce" name="date_nsce" required />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="lieu_nsce">Lieu de naissance</label>
                                                            <input type="text" class="form-control" id="lieu_nsce" name="lieu_nsce" placeholder="Lieu de naissance" required />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="nationalite">Nationalité</label>
                                                            <div class="input-group">
                                                                <select class="form-control" id="nationalite" name="nationalite" required>
                                                                    <option value="">Sélectionnez</option>
                                                                    <!-- Les options seront remplies dynamiquement -->
                                                                </select>
                                                                <button type="button" class="btn btn-primary btn_AjoutOption" data-bs-toggle="modal" title="Ajouter un nouveau Pays" data-idselect="pays" data-urlajout="pays_set.php" data-urlget="pays_get_liste.php">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="ecole">École</label>
                                                            <div class="input-group">
                                                                <select class="form-control" id="ecole" name="ecole" required>
                                                                    <option value="">Sélectionnez</option>
                                                                    <!-- Les options seront remplies dynamiquement -->
                                                                </select>
                                                                <button type="button" class="btn btn-primary btn_AjoutOption" data-bs-toggle="modal" title="Ajouter une nouvelle école" data-idselect="ecole" data-urlajout="ecole_set.php" data-urlget="ecole_get_liste.php">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="filiere">Filière</label>
                                                            <div class="input-group">
                                                                <select class="form-control" id="filiere" name="filiere" required>
                                                                    <option value="">Sélectionnez</option>
                                                                    <!-- Les options seront remplies dynamiquement -->
                                                                </select>
                                                                <button type="button" class="btn btn-primary btn_AjoutOption" data-bs-toggle="modal" title="Ajouter une nouvelle filière" data-idselect="filiere" data-urlajout="filiere_set.php" data-urlget="filiere_get_liste.php">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="niveau">Niveau</label>
                                                            <div class="input-group">
                                                                <select class="form-control" id="niveau" name="niveau">
                                                                    <option value="">Sélectionnez</option>
                                                                    <!-- Les options seront remplies dynamiquement -->
                                                                </select>
                                                                <button type="button" class="btn btn-primary btn_AjoutOption" data-bs-toggle="modal" title="Ajouter un nouveau Niveau" data-idselect="niveau" data-urlajout="niveau_set.php" data-urlget="niveau_get_liste.php">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="type">Type</label>
                                                            <div class="input-group">
                                                                <select class="form-control" id="type" name="type" required>
                                                                    <option value="">Sélectionnez</option>
                                                                    <!-- Les options seront remplies dynamiquement -->
                                                                </select>
                                                                <button type="button" class="btn btn-primary btn_AjoutOption" data-bs-toggle="modal" title="Ajouter un nouveau Type Etudiant" data-idselect="type" data-urlajout="type_set.php" data-urlget="type_get_liste.php">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div id="resultat"></div>

                                                    </form>
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button type="button" id="bnt_enregister" class="btn btn-primary">
                                                        Enregistrer
                                                    </button>
                                                    <button type="button" id="btn_fermer" class="btn btn-danger" data-dismiss="modal">
                                                        Fermer
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Modal pour ajouter nouvelle option Pays, Type, Niveau, Ecole... -->
                                    <div class="modal fade" id="modal_ajoutOption" tabindex="-1" aria-labelledby="modal_ajoutOptionLabel" tabindex="-1" role="dialog" aria-labelledby="secondModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modal_ajoutOptionLabel">Ajouter un nouvel auteur</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Formulaire pour ajouter une option -->
                                                    <form id="form_Modal_ajoutOption">
                                                        <div class="mb-3">
                                                            <label for="nomOption" class="form-label">Nom</label>
                                                            <input type="text" class="form-control" id="nomOption" required>
                                                            <input type="text" class="form-control" id="codeOption" value="" hidden>
                                                            <input type="text" class="form-control" id="idselect" hidden>
                                                        </div>
                                                        <!-- Ajoutez d'autres champs si nécessaire -->
                                                    </form>
                                                    <span id="resultatOption"></span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button id="btn_fermerOption" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                    <button id="btn_enregistrerOption" type="button" class="btn btn-primary" id="btn_EnregitrerAuteur">Enregistrer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-------------- Modal ajout Stage ------------------------------------------>
                                    <div class="modal fade" id="modalAjoutStage" tabindex="-1" role="dialog" aria-labelledby="modalAjoutStageLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalAjoutStageLabel">Ajouter un stage</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="formAjoutStage">
                                                        <input type="hidden" id="code_stagiaire" name="code_stagiaire">
                                                        <input type="hidden" id="code" name="code">
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
                                                            <input type="checkbox" style="cursor: hand;" id="si_objectif_atteint" name="si_objectif_atteint" value="1">
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

                                    <!--------------- Modal pour afficher la liste des stages ------------------------------->
                                    <div class="modal fade" id="modalListeStages" tabindex="-1" aria-labelledby="modalListeStagesLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalListeStagesLabel">Liste des stages</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table id="tableStages" class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Code Stage</th>
                                                                <th>Date Début</th>
                                                                <th>Date Fin</th>
                                                                <th>Objectif</th>
                                                                <th>Statut</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="corpsTableStages">
                                                            <!-- Les lignes seront insérées ici dynamiquement par AJAX -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!------------------- Table Liste Stagiares ------------------------------------------------------>
                                    <!------------------------------------------------------------------------------------------------>
                                    <div class="table-responsive">
                                        <table
                                            id="add-row"
                                            class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th hidden>Code</th>
                                                    <th>Nom</th>
                                                    <th>sexe</th>
                                                    <th>date_nsce</th>
                                                    <th>lieu_nsce</th>
                                                    <th>nationalite</th>
                                                    <th>ecole</th>
                                                    <th>filiere</th>
                                                    <th>niveau</th>
                                                    <th hidden>type</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <!--tfoot>
                          <tr>
                            <th hidden>Code</th>
                            <th>Nom</th>
                            <th>Action</th>
                          </tr>
                        </tfoot-->
                                            <tbody id="corpsTable">
                                            </tbody>
                                        </table>
                                    </div>
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
            // Initialisation du modal avec les options backdrop: 'static' et keyboard: false
            var myModal = new bootstrap.Modal(document.getElementById('modalFiche_Stagiaire'), {
                backdrop: 'static',
                keyboard: false
            });

            var myModal = new bootstrap.Modal(document.getElementById('modal_ajoutOption'), {
                backdrop: 'static',
                keyboard: false
            });

            var myModal = new bootstrap.Modal(document.getElementById('modalAjoutStage'), {
                backdrop: 'static',
                keyboard: false
            });




            //--- remplir les select
            getSelectOptions('nationalite', 'pays_get_liste.php');
            getSelectOptions('ecole', 'ecole_get_liste_legere.php');
            getSelectOptions('type', 'type_get_liste.php');
            getSelectOptions('filiere', 'filiere_get_liste.php');
            getSelectOptions('niveau', 'niveau_get_liste.php');



            getListe();


            //---- Ouvrir fenetre modal fiche service
            $("#btn_nouv").click(function() {
                resetForm();
                $("#modalFiche_Stagiaire").modal("show");
            });


            $("#btn_fermer").click(function() {
                // Ajouter ici vos conditions
                var conditionEstRemplie = true; // Remplacez par votre condition

                if (conditionEstRemplie) {
                    // Fermer le modal si la condition est remplie
                    $("#modalFiche_Stagiaire").modal("hide");
                } else {
                    // Bloquer la fermeture et afficher un message d'alerte
                    alert("Vous ne pouvez pas fermer la fenêtre tant que les conditions ne sont pas remplies.");
                }

            });


            //--- Enregistrement
            $('#bnt_enregister').on('click', function(e) {
                e.preventDefault(); // Empêche le rechargement de la page

                //alert("Debut enregistrement....");
                // Récupère toutes les valeurs des champs
                var code = $('#code').val();
                var nom = $('#nom').val();
                var sexe = $('#sexe').val();
                var date_nsce = $('#date_nsce').val();
                var lieu_nsce = $('#lieu_nsce').val();
                var nationalite = $('#nationalite').val();
                var ecole = $('#ecole').val();
                var filiere = $('#filiere').val();
                var niveau = $('#niveau').val();
                var type = $('#type').val();

                // Vérifie si tous les champs requis sont remplis
                if (nom === '' || sexe === '' || date_nsce === '' || lieu_nsce === '' ||
                    nationalite === '' || ecole === '' || filiere === '' || niveau === '' || type === '') {
                    $('#resultat').html('<p style="color:red;">Veuillez remplir tous les champs obligatoires.</p>');
                    return;
                }

                //alert("Debut ajax....");
                // Appel AJAX vers le script PHP
                $.ajax({
                    url: 'stagiaire_set.php',
                    type: 'POST',
                    data: {
                        code: code,
                        nom: nom,
                        sexe: sexe,
                        date_nsce: date_nsce,
                        lieu_nsce: lieu_nsce,
                        nationalite: nationalite,
                        ecole: ecole,
                        filiere: filiere,
                        niveau: niveau,
                        type: type
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            getListe();
                            $("#modalFiche_Stagiaire").modal("hide");
                            // Optionnel : afficher un message de succès
                            $('#resultat').html('<p style="color:green;">' + response.message + '</p>');
                        } else {
                            $('#resultat').html('<p style="color:red;">Erreur: ' + response.message + '</p>');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Erreur AJAX:", textStatus, errorThrown);
                        console.log("Réponse du serveur:", jqXHR.responseText);
                        $('#resultat').html('<p style="color:red;">Une erreur s\'est produite : ' + textStatus + '</p>');
                        $("#modalFiche_Stagiaire").modal("hide");
                    }
                });
            });


            //--- Fin Enregistrement

            //--------- Affichage un Stagiaire ---------------------------------
            $('tbody').on('click', '.btn_modifier', function(e) {
                //alert('Entrée');

                // Récupérer la ligne (tr) parente du bouton cliqué
                var $row = $(this).closest('tr');

                // Récupérer les données de chaque cellule de la ligne
                var code = $row.find('td:eq(0)').text();
                var nom = $row.find('td:eq(1)').text();
                var sexe = $row.find('td:eq(2)').text();
                //var date_nsce = $row.find('td:eq(3)').text();
                var date_nsce = $row.find('td:eq(3)').data('date');
                var lieu_nsce = $row.find('td:eq(4)').text();
                var nationalite = $row.find('td:eq(5)').data("code_pays");
                var ecole = $row.find('td:eq(6)').data("code_ecole");
                var filiere = $row.find('td:eq(7)').data("code_filiere");
                var niveau = $row.find('td:eq(8)').data("code_niveau");
                var type = $row.find('td:eq(9)').data("code_type");

                // Formater la date
                //var formattedDate = formatDate_versAnglais(date_nsce);

                // Remplir le modal avec les données récupérées
                $('#modalFiche_Stagiaire .modal-body #code').val(code);
                $('#modalFiche_Stagiaire .modal-body #nom').val(nom);
                $('#modalFiche_Stagiaire .modal-body #sexe').val(sexe);
                $('#modalFiche_Stagiaire .modal-body #date_nsce').val(date_nsce);
                $('#modalFiche_Stagiaire .modal-body #lieu_nsce').val(lieu_nsce);
                $('#modalFiche_Stagiaire .modal-body #nationalite').val(nationalite);
                $('#modalFiche_Stagiaire .modal-body #ecole').val(ecole);
                $('#modalFiche_Stagiaire .modal-body #filiere').val(filiere);
                $('#modalFiche_Stagiaire .modal-body #niveau').val(niveau);
                $('#modalFiche_Stagiaire .modal-body #type').val(type);

                $("#modalFiche_Stagiaire").modal("show");



            });

            //--- Fin Modification





            //--- Suppression 
            $('tbody').on('click', '.btn_supprimer', function(e) {
                e.preventDefault();

                var $row = $(this).closest('tr');
                var code = $row.find('td:eq(0)').text(); // Première cellule (code)
                var nom = $row.find('td:eq(1)').text(); // Deuxième cellule (nom)

                // Afficher une boîte de dialogue de confirmation
                if (confirm("Êtes-vous sûr de vouloir supprimer du stagiaire: " + nom + " ?")) {
                    // L'utilisateur a confirmé, procéder à la suppression
                    $.ajax({
                        url: 'stagiaire_supp.php',
                        method: 'POST',
                        data: {
                            code: code
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {
                                // Suppression réussie
                                //alert("Le service a été supprimé avec succès.");
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


            


            function getListe() {
                $.ajax({
                    url: 'stagiaire_get_liste.php',
                    type: 'GET',
                    dataType: 'json', // Spécifie que la réponse attendue est du JSON
                    success: function(response) {
                        if (response.status === 'success') {
                            var rows = ''; // Variable pour stocker les lignes du tableau



                            // Parcourir les services retournés et construire les lignes HTML
                            $.each(response.donnees, function(index, ligne) {
                                // Formater la date
                                var date_nsce = formatDate(ligne.date_nsce);

                                rows += '<tr>';
                                rows += '<td hidden>' + ligne.code + '</td>';
                                rows += '<td>' + ligne.nom + '</td>';
                                rows += '<td>' + ligne.sexe + '</td>';
                                rows += '<td data-date="' + ligne.date_nsce + '">' + date_nsce + '</td>';
                                rows += '<td>' + ligne.lieu_nsce + '</td>';
                                rows += '<td data-code_pays="' + ligne.code_pays + '">' + ligne.nationalite + '</td>';
                                rows += '<td data-code_ecole="' + ligne.code_ecole + '">' + ligne.ecole + '</td>';
                                rows += '<td data-code_filiere="' + ligne.code_filiere + '">' + ligne.filiere + '</td>';
                                rows += '<td data-code_niveau="' + ligne.code_niveau + '">' + ligne.niveau + '</td>';
                                rows += '<td hidden data-code_type="' + ligne.code_type + '">' + ligne.type + '</td>';
                                rows += '<td>' +
                                    '<div class="form-button-action">' +
                                    '<button type="button" class="btn btn-link btn-primary btn-lg btn_modifier">' +
                                    '<i class="fa fa-edit"></i>' +
                                    '</button>' +
                                    '<button type="button" class="btn btn-link btn-danger btn_supprimer">' +
                                    '<i class="fa fa-times"></i>' +
                                    '</button>' +
                                    '<button type="button" class="btn btn-link btn-success btn-lg btn_ajouter_stage" data-code="' + ligne.code + '">' +
                                    '<i class="fa fa-plus-circle"></i> Stage' +
                                    '</button>' +
                                    '<button type="button" class="btn btn-linkbtn-info btn-lg btn-liste-stages" data-code="' + ligne.code + '">' +
                                    '<i class="fa fa-align-left"></i> Stages' +
                                    '</button>' +
                                    '</div>' +
                                    '</td>';
                                rows += '</tr>';
                            });

                            // Insérer le contenu dans le conteneur du tableau
                            $('#corpsTable').html(rows);
                            //alert(lignes);
                            //$('#resultat').html('<p style="color:green;">' + response.message + '</p>');
                        } else {
                            $('#resultat').html('<p style="color:red;">Erreur: ' + response.message + '</p>');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Erreur AJAX:", textStatus, errorThrown);
                        $('#resultat').html('<p style="color:red;">Une erreur s\'est produite : ' + jqXHR.responseText + '</p>');
                    }
                });
            }


            //--------- Ouvrir Modal Ajout Option ----------------------------
            $(".btn_AjoutOption").click(function() {
                //resetForm();
                $('#nomOption').val('');
                $('#codeOption').val('');
                $('#idselect').val('');

                var titreModal = $(this).data("idselect");
                //alert(titreModal);

                // Récupérer les valeurs des attributs data-urlajout et data-urlget
                var urlajout = $(this).data('urlajout'); // Utilisation de .data() pour récupérer l'attribut data-urlajout
                var urlget = $(this).data('urlget');
                $("#modal_ajoutOptionLabel").html("Ajout: " + titreModal);
                $("#idselect").val(titreModal);
                $("#modal_ajoutOption").modal("show");
            });

            //----------- Fermer Modal Ajout Option -----------------------------
            $("#btn_fermerOption").click(function() {
                //-- Garder les valeur sasie en 
                // Ajouter ici vos conditions
                var conditionEstRemplie = true; // Remplacez par votre condition

                if (conditionEstRemplie) {
                    // Fermer le modal si la condition est remplie
                    $("#modal_ajoutOption").modal("hide");
                    $("#modalFiche_Stagiaire").modal("show");
                } else {
                    // Bloquer la fermeture et afficher un message d'alerte
                    alert("Vous ne pouvez pas fermer la fenêtre tant que les conditions ne sont pas remplies.");
                }

            });


            //------ Ajouter Nouvelle option ------------------------
            $('#btn_enregistrerOption').on('click', function(e) {
                e.preventDefault(); // Empêche le rechargement de la page

                //alert('Entrée');

                // Récupère le nom du service
                var nom = $('#nomOption').val();
                var code = $('#codeOption').val();
                var idSelect = $('#idselect').val();

                // Vérifie si le champ est rempli
                if (nom === '') {
                    $('#resultatOption').html('<p style="color:red;">Veuillez entrer un nom.</p>');
                    return;
                }

                var urlAjout = idSelect + "_set.php";

                var urlGet = idSelect + "_get_liste.php";

                if (idSelect === "ecole") {
                    urlGet = idSelect + "_get_liste_legere.php";
                }

                if (idSelect === "pays") {
                    idSelect = "nationalite";
                }




                //alert('Debut Ajax url: ' + urlAjout + " et urlGet: " + urlGet);

                // Appel AJAX vers le script PHP
                $.ajax({
                    url: urlAjout,
                    type: 'POST',
                    data: {
                        nom: nom,
                        code: code
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Affichage du message de succès ou d'erreur
                        if (response.status === 'success') {
                            getSelectOptions(idSelect, urlGet);
                            //$("#" + idSelect).val(response.code);
                            $("#modal_ajoutOption").modal("hide");
                            $("#modalFiche_Stagiaire").modal("show");

                        } else {
                            $('#resultat').html('<p style="color:red;">Erreur: ' + response.message + '</p>');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("Erreur parser:", jqXHR.responseText); // Voir la réponse du serveur dans la console
                        $('#resultat').html('<p style="color:red;">Une erreur s\'est produite : ' + textStatus + '</p>');
                        $("#modalFiche_Service").modal("hide");
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
                            $select.empty(); // Vider le sélecteur avant de le remplir avec les nouvelles données

                            // Parcourir response.donnees pour remplir le sélecteur
                            response.donnees.forEach(option => {
                                const $optionElement = $('<option></option>').val(option.code).text(option.nom);
                                $select.append($optionElement);
                            });
                        } else {
                            $('#resultat').html('<p style="color:red;">Erreur: ' + response.message + '</p>');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("Erreur parser:", jqXHR.responseText); // Voir la réponse du serveur dans la console
                        $('#resultat').html('<p style="color:red;">Une erreur s\'est produite : ' + textStatus + '</p>');
                    }
                });
            }




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

            // Fonction pour réinitialiser le formulaire
            function resetForm() {
                $('#code').val('');
                $('#nom').val('');
                $('#sexe').val('');
                $('#date_nsce').val('');
                $('#lieu_nsce').val('');
                $('#nationalite').val('');
                $('#ecole').val('');
                $('#filiere').val('');
                $('#niveau').val('');
                $('#type').val('');
                $('#resultat').html('');
            }

            //---------------------------------------------------------------------------
            //-------------- Gestion STAGE ----------------------------------------------

            // Bouton d'ajout de stage
            $(document).on('click', '.btn_ajouter_stage', function() {
                var code_stagiaire = $(this).data('code');

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
                                $('#code_stagiaire').val(code_stagiaire);
                                $('#modalAjoutStage').modal('show');
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

            // ------- Enregistrement du stage -------------------------------
            $('#btn_enregistrerStage').click(function() {
                var formData = $('#formAjoutStage').serialize();

                $.ajax({
                    url: 'stage_set.php',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            alert('Stage ajouté avec succès !');
                            $('#modalAjoutStage').modal('hide');
                            // Recharger la liste des stagiaires ou mettre à jour l'interface utilisateur si nécessaire
                        } else {
                            alert('Erreur lors de l\'ajout du stage : ' + response.message);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("Erreur parser:", jqXHR.responseText);
                        alert('Erreur lors de la vérification du stage en cours.' + textStatus + " >> " + jqXHR.responseText);
                    }
                });
            });

            //--- Fermer Modal Stage -------------------------------------------
            $('#btn_fermerStage').click(function() {
                $('#modalAjoutStage').modal('hide');
            });

            //--- Réinitialiser le formulaire lorsque la modal est fermée -------
            $('#modalAjoutStage').on('hidden.bs.modal', function() {
                $('#formAjoutStage')[0].reset();
            });

            //---------- Ouvrir Page Liste Stages ----------------------------------
            function ouvrirListeStages(code_stagiaire, nom_stagiaire) {



                $.ajax({
                    url: 'stage_get_liste.php', // Le script PHP pour récupérer la liste des stages
                    type: 'GET',
                    data: {
                        code_stagiaire: code_stagiaire
                    }, // On passe le code du stagiaire
                    dataType: 'json', // On attend du JSON en réponse
                    success: function(response) {
                        if (response.status === 'success') {

                            window.location.href = 'stage_liste.php?pageName=Stages pour ' + nom_stagiaire + '&code_stagiaire=' + code_stagiaire; // Rediriger vers la nouvelle page
                        } else {
                            //alert('Alert: ' + response.message);
                            afficherMessage(response.message, 'Info');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Erreur AJAX:", textStatus, errorThrown);
                        alert('Erreur lors du chargement des stages.');
                    }
                });
            }

            //---- Appel de la fonction lors du clic sur le bouton 'Stage'
            $(document).on('click', '.btn-liste-stages', function() {
                var code_stagiaire = $(this).data('code'); // Récupération du code stagiaire via l'attribut data
                // Récupérer la ligne (tr) parente du bouton cliqué
                var $row = $(this).closest('tr');

                // Récupérer les données de chaque cellule de la ligne
                var nom_stagiaire = $row.find('td:eq(1)').text();

                ouvrirListeStages(code_stagiaire, nom_stagiaire); // Appel de la fonction pour afficher les stages
            });


            // ---- Gestion Message Box -------------------------------------
            //afficherMessage('Ceci est un message d\'information.', 'Info');
            $("#btn_fermerMessageBox").click(function() {
                $("#messageModal").modal("hide");
            });

        });
    </script>

</body>

</html>