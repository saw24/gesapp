<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include_once('head_content.php') ?>
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
        <?php include_once('sidebar_left.php') ?>
      <!-- End Sidebar -->

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

                <div class="ms-md-auto py-2 py-md-0">
                  <!--a href="#" class="btn btn-primary btn-round">Nouveau Etudiant</a-->
                </div>

              </div>
              <div class="row">

                <div class="col-md-12">
                <div class="card">
                  <!--div class="card-header">
                    <div class="card-title">Titre Formulaire</div>
                  </div-->
                  <div class="card-body">
                    <div class="row">
                      <!--div class="col-md-6 col-lg-4"-->
                        <!--form action="set_service.php" method="POST"-->
                        <form id="ajouter-service-form">
                          <input type="text" class="form-control" id="code" name="code" placeholder="Code" hidden />
                            <div class="form-group col-md-6 col-lg-4">
                              <label for="nom">Nom</label>
                              <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom"/>
                            </div>

                        </form>

                            <div class="form-group" style="display: flex; justify-content: center;">
                              <button id="bnt_enregister" class="btn btn-success">Enregister</button>
                              <!--button class="btn btn-danger">Annuler</button-->
                            </div>
                             <div id="resultat"></div>
                      <!--/div-->
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
        //alert('Avant');
        $('#bnt_enregister').on('click', function(e) {
            e.preventDefault(); // Empêche le rechargement de la page

            //alert('Entrée');

            // Récupère le nom du service
            var nom = $('#nom').val();
            var code = $('#code').val();

            // Vérifie si le champ est rempli
            if (nom === '') {
                $('#resultat').html('<p style="color:red;">Veuillez entrer un nom de service.</p>');
                return;
            }

            //alert('Debut');

            // Appel AJAX vers le script PHP
            $.ajax({
                url: 'set_service.php', 
                type: 'POST', 
                data: { nom: nom, 
                        code: code 
                      }, 
                dataType: 'json', 
                success: function(response) {
                    // Affichage du message de succès ou d'erreur
                    if (response.status === 'success') {
                        $('#resultat').html('<p style="color:darkgreen;">' + response.message + '</p>');
                        // Si le message est un succès: Redirection vers la page liste_service.php
                        if (response.message === 'Nouveau service ajouté avec succès') {
                            window.location.href = 'liste_services.php?pageName=Liste Services'; 
                        }
                    } else {
                        $('#resultat').html('<p style="color:red;">Erreur: ' + response.message + '</p>');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("Erreur parser:", jqXHR.responseText); // Voir la réponse du serveur dans la console
                    $('#resultat').html('<p style="color:red;">Une erreur s\'est produite : ' + textStatus + '</p>');
                }
            });
        });
    </script>

  </body>
</html>
