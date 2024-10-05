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

                        <!--div class="ms-md-auto py-2 py-md-0">
                  <a href="fiche_service.php" class="btn btn-primary btn-round">Nouveau</a>
                </div-->

                    </div>
                    <div class="row">



                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <!--h4 class="card-title">Add Row</h4-->

                                        <!--button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal"><i class="fa fa-plus"></i>
                        Ajouter
                      </button-->
                                        <button class="btn btn-primary btn-round ms-auto" id="btn_nouv">
                                            <i class="fa fa-plus"></i>
                                            Ajouter
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Modal -->
                                    <div
                                        class="modal fade"
                                        id="modalFiche_Service"
                                        tabindex="-1"
                                        role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold"> Fiche</span>
                                                        <span class="fw-light"> Service </span>
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
                                                    <form id="ajouter-service-form">
                                                        <input type="text" class="form-control" id="code" name="code" placeholder="Code" hidden />
                                                        <label for="nom">Nom</label>
                                                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" />

                                                        <label for="nom">Correspondant</label>
                                                        <input type="text" class="form-control" id="correspondant" name="correspondant" placeholder="Correspondant" />

                                                        <label for="nom">Adresse</label>
                                                        <input type="text" class="form-control" id="adre_ecole" name="adre_ecole" placeholder="Adresse" />

                                                        <label for="nom">Telephone</label>
                                                        <input type="text" class="form-control" id="tel_ecole" name="tel_ecole" placeholder="Telephone" />

                                                        <label for="nom">Email</label>
                                                        <input type="email" class="form-control" id="email_ecole" name="email_ecole" placeholder="Email" />




                                                        <span id="resultat"></span>
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

                                    <div class="table-responsive">
                                        <table
                                            id="add-row"
                                            class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th hidden>Code</th>
                                                    <th>Nom</th>
                                                    <th>Correspondant</th>
                                                    <th>Adresse</th>
                                                    <th>Telephone</th>
                                                    <th>Email</th>
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
                                                <tr>
                                                    <td hidden>231RDEZ</td>
                                                    <td>System Architect</td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button
                                                                type="button"
                                                                data-bs-toggle="tooltip"
                                                                title=""
                                                                class="btn btn-link btn-primary btn-lg btn_modifier"
                                                                data-original-title="Edit Task">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button
                                                                type="button"
                                                                data-bs-toggle="tooltip"
                                                                title=""
                                                                class="btn btn-link btn-danger btn_supprimer"
                                                                data-original-title="Remove">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
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
            getListe();




            //---- Ouvrir fenetre modal fiche service
            $("#btn_nouv").click(function() {
                $('#modalFiche_Service .modal-body #code').val("");
                $('#modalFiche_Service .modal-body #nom').val("");
                $('#modalFiche_Service .modal-body #correspondant').val("");
                $('#modalFiche_Service .modal-body #adre_ecole').val("");
                $('#modalFiche_Service .modal-body #tel_ecole').val("");
                $('#modalFiche_Service .modal-body #email_ecole').val("");
                $("#modalFiche_Service").modal("show");
            });



            $("#btn_fermer").click(function() {
                $("#modalFiche_Service").modal("hide");
            });


            function getListe() {
                //alert("hello2");

                // Appel AJAX vers le script PHP
                $.ajax({
                    url: 'livre_get_liste.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // Affichage du message de succès ou d'erreur
                        if (response.status === 'success') {
                            $('#resultat').html('<p style="color:green;">Données: ' + response.donnees + '</p>');
                            $('#books-container').html(response.donnees);
                        } else {
                            $('#resultat').html('<p style="color:red;">Erreur: ' + response.message + '</p>');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("Erreur parser:", jqXHR.responseText); // Voir la réponse du serveur dans la console
                        $('#resultat').html('<p style="color:red;">Get liste: Une erreur s\'est produite : ' + jqXHR.responseText + '</p>');
                    }
                });
            }


        });
    </script>

</body>

</html>