<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include_once('head_content.php') ?>
    <style>
        /* Styles du bouton flottant */
        .btn-flottant {
            position: fixed; /* Fixe la position du bouton sur la page */
            bottom: 20px; /* Position du bouton à 20px du bas de la fenêtre */
            right: 20px; /* Position du bouton à 20px du bord droit de la fenêtre */
            background-color: #1572e8; /* Couleur de fond verte */
            color: white; /* Couleur de l'icône */
            border: none; /* Retire les bordures */
            border-radius: 50%; /* Donne une forme ronde */
            padding: 15px; /* Espacement interne du bouton */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Ombre pour effet 3D */
            font-size: 24px; /* Taille de l'icône */
            cursor: pointer; /* Curseur en main pour l'interaction */
            z-index: 1000; /* Met le bouton au-dessus des autres éléments */
            transition: background-color 0.3s ease; /* Animation de transition */
        }

        .btn-flottant:hover {
            background-color: #428dec; /* Change la couleur au survol */
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
                class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
              >
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
                      aria-hidden="true"
                    >
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
                              aria-label="Close"
                            >
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form id="ajouter-service-form">
                              <input type="text" class="form-control" id="code" name="code" placeholder="Code" hidden />
                                  <label for="nom">Nom</label>
                                  <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom"/>

                                  <label for="nom">Correspondant</label>
                                  <input type="text" class="form-control" id="correspondant" name="correspondant" placeholder="Correspondant"/>

                                  <label for="nom">Adresse</label>
                                  <input type="text" class="form-control" id="adre_ecole" name="adre_ecole" placeholder="Adresse"/>

                                  <label for="nom">Telephone</label>
                                  <input type="text" class="form-control" id="tel_ecole" name="tel_ecole" placeholder="Telephone"/>

                                  <label for="nom">Email</label>
                                  <input type="email" class="form-control" id="email_ecole" name="email_ecole" placeholder="Email"/>




                                  <span id="resultat"></span>
                            </form>
                          </div>
                          <div class="modal-footer border-0">
                            <button type="button" id="bnt_enregister" class="btn btn-primary">
                              Enregistrer
                            </button>
                            <button type="button" id="btn_fermer" class="btn btn-danger"data-dismiss="modal">
                              Fermer
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="table-responsive">
                      <table
                        id="add-row"
                        class="display table table-striped table-hover"
                      >
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
  $(document).ready(function () {

    //--- Ouvrire la page de fiche service : fiche_service.php
    $('#bouton-flottant').on('click', function(e) {
       window.location.href = 'fiche_service.php?pageName=Service';
    });


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


    //--- Enregistrement
    $('#bnt_enregister').on('click', function(e) {
            e.preventDefault(); // Empêche le rechargement de la page

            //alert('Entrée');

            // Récupère le nom du service
            var nom = $('#nom').val();
            var code = $('#code').val();
            var correspondant = $('#correspondant').val();
            var adre_ecole = $('#adre_ecole').val();
            var tel_ecole = $('#tel_ecole').val();
            var email_ecole = $('#email_ecole').val();

            // Vérifie si le champ est rempli
            if (nom === '') {
                $('#resultat').html('<p style="color:red;">Veuillez entrer un nom de service.</p>');
                return;
            }

            //alert('Debut');

            // Appel AJAX vers le script PHP
            $.ajax({
                url: 'ecole_set.php', 
                type: 'POST', 
                data: { nom: nom, 
                        code: code,
                        correspondant: correspondant,
                        adre_ecole: adre_ecole,
                        tel_ecole: tel_ecole,
                        email_ecole: email_ecole 
                      }, 
                dataType: 'json', 
                success: function(response) {
                    // Affichage du message de succès ou d'erreur
                    if (response.status === 'success') {
                        getListe();
                        $("#modalFiche_Service").modal("hide");
                    } else {
                        $('#resultat').html('<p style="color:red;">Erreur: ' + response.message + '</p>');
                        $("#modalFiche_Service").modal("show");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("Erreur parser:", jqXHR.responseText); // Voir la réponse du serveur dans la console
                    $('#resultat').html('<p style="color:red;">Une erreur s\'est produite : ' + textStatus + '</p>');
                    $("#modalFiche_Service").modal("hide");
                }
            });
        });


    //--- Fin Enregistrement

    //--- Modification
    $('tbody').on('click', '.btn_modifier', function(e) {
        //alert('Entrée');

      // Récupérer la ligne (tr) parente du bouton cliqué
        var $row = $(this).closest('tr');
        
        // Récupérer les données de chaque cellule de la ligne
        var code = $row.find('td:eq(0)').text(); // Première cellule
        var nom = $row.find('td:eq(1)').text();  // Deuxième cellule
        var correspondant = $row.find('td:eq(2)').text();  // Deuxième cellule
        var adre_ecole = $row.find('td:eq(3)').text();  // Deuxième cellule
        var tel_ecole = $row.find('td:eq(4)').text();  // Deuxième cellule
        var email_ecole = $row.find('td:eq(5)').text();  // Deuxième cellule
        
        $('#modalFiche_Service .modal-body #code').val(code);
        $('#modalFiche_Service .modal-body #nom').val(nom);
        $('#modalFiche_Service .modal-body #correspondant').val(correspondant);
        $('#modalFiche_Service .modal-body #adre_ecole').val(adre_ecole);
        $('#modalFiche_Service .modal-body #tel_ecole').val(tel_ecole);
        $('#modalFiche_Service .modal-body #email_ecole').val(email_ecole);

        $("#modalFiche_Service").modal("show");



    });

    //--- Fin Modification


    //--- Suppression 
    $('tbody').on('click', '.btn_supprimer', function(e) {
        e.preventDefault();
        
        var $row = $(this).closest('tr');
        var code = $row.find('td:eq(0)').text(); // Première cellule (code)
        var nom = $row.find('td:eq(1)').text();  // Deuxième cellule (nom)
        
        // Afficher une boîte de dialogue de confirmation
        if (confirm("Êtes-vous sûr de vouloir supprimer de:  " + nom + " ?")) {
            // L'utilisateur a confirmé, procéder à la suppression
            $.ajax({
                url: 'ecole_supp.php',
                method: 'POST',
                data: { code: code },
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


    $("#basic-datatables").DataTable({});

    $("#multi-filter-select").DataTable({
      pageLength: 5,
      initComplete: function () {
        this.api()
          .columns()
          .every(function () {
            var column = this;
            var select = $(
              '<select class="form-select"><option value=""></option></select>'
            )
              .appendTo($(column.footer()).empty())
              .on("change", function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                column
                  .search(val ? "^" + val + "$" : "", true, false)
                  .draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append(
                  '<option value="' + d + '">' + d + "</option>"
                );
              });
          });
      },
    });

    // Add Row
    $("#add-row").DataTable({
      pageLength: 5,
    });

    var action =
      '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

    $("#addRowButton").click(function () {
      $("#add-row")
        .dataTable()
        .fnAddData([
          $("#addName").val(),
          $("#addPosition").val(),
          $("#addOffice").val(),
          action,
        ]);
      $("#addRowModal").modal("hide");
    });
  });


function getListe(argument) {
  // Appel AJAX vers le script PHP
  $.ajax({
      url: 'ecole_get_liste.php', 
      type: 'GET', 
      dataType: 'json', 
      success: function(response) {
          // Affichage du message de succès ou d'erreur
          if (response.status === 'success') {

            $('#corpsTable').html(response.donnees );
              
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


  </script>

  </body>
</html>
