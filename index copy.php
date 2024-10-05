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
                  <!--h3 class="fw-bold mb-3">Gestion des Apprenants</h3-->
                </div>
                <div class="ms-md-auto py-2 py-md-0">
                  <!--a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
                  <a href="#" class="btn btn-primary btn-round">Nouveau Etudiant</a-->
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-md-3">
                  <div class="card card-stats card-round">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-icon">
                          <div
                            class="icon-big text-center icon-primary bubble-shadow-small"
                          >
                            <i class="fas fa-users"></i>
                          </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                          <div class="numbers">
                            <p class="card-category">Total Stagiaires</p>
                            <h4 class="card-title" id="totalStagiaire">0</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="card card-stats card-round">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-icon">
                          <div
                            class="icon-big text-center icon-info bubble-shadow-small"
                          >
                            <i class="fas fa-user-check"></i>
                          </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                          <div class="numbers">
                            <p class="card-category">Stagiaires Actuels</p>
                            <h4 class="card-title" id="totalActif">0</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="card card-stats card-round">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-icon">
                          <div
                            class="icon-big text-center icon-success bubble-shadow-small"
                          >
                            <i class="fas fa-luggage-cart"></i>
                          </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                          <div class="numbers">
                          <p class="card-category">Stages debutés ce mois</p>
                          <h4 class="card-title" id="totalNouveau">0</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="card card-stats card-round">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-icon">
                          <div
                            class="icon-big text-center icon-secondary bubble-shadow-small"
                          >
                            <i class="far fa-check-circle"></i>
                          </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                          <div class="numbers">
                            <p class="card-category">Ecoles</p>
                            <h4 class="card-title" id="totalEcole">0</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <div class="card card-round">
                    <div class="card-header">
                      <div class="card-head-row">
                        <div class="card-title">User Statistics</div>
                        <div class="card-tools">
                          <a
                            href="#"
                            class="btn btn-label-success btn-round btn-sm me-2"
                          >
                            <span class="btn-label">
                              <i class="fa fa-pencil"></i>
                            </span>
                            Export
                          </a>
                          <a href="#" class="btn btn-label-info btn-round btn-sm">
                            <span class="btn-label">
                              <i class="fa fa-print"></i>
                            </span>
                            Print
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart-container" style="min-height: 375px">
                        <canvas id="statisticsChart"></canvas>
                      </div>
                      <div id="myChartLegend"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card card-primary card-round">
                    <div class="card-header">
                      <div class="card-head-row">
                        <div class="card-title">Daily Sales</div>
                        <div class="card-tools">
                          <div class="dropdown">
                            <button
                              class="btn btn-sm btn-label-light dropdown-toggle"
                              type="button"
                              id="dropdownMenuButton"
                              data-bs-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false"
                            >
                              Export
                            </button>
                            <div
                              class="dropdown-menu"
                              aria-labelledby="dropdownMenuButton"
                            >
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#"
                                >Something else here</a
                              >
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-category">March 25 - April 02</div>
                    </div>
                    <div class="card-body pb-0">
                      <div class="mb-4 mt-2">
                        <h1>$4,578.58</h1>
                      </div>
                      <div class="pull-in">
                        <canvas id="dailySalesChart"></canvas>
                      </div>
                    </div>
                  </div>
                  <div class="card card-round">
                    <div class="card-body pb-0">
                      <div class="h1 fw-bold float-end text-primary">+5%</div>
                      <h2 class="mb-2">17</h2>
                      <p class="text-muted">Users online</p>
                      <div class="pull-in sparkline-fix">
                        <div id="lineChart"></div>
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

        //alert("OK");

        getStatistiquesStagiaire();


        //---------- Ouvrir Page Liste Stages ----------------------------------
        function getStatistiquesStagiaire() {
          //alert("IndexAjax Debut");

          $.ajax({
              url: 'statistiques_stagiaire.php', // Le script PHP pour récupérer la liste des stages
              type: 'GET',
              /*data: {
                  code_stagiaire: code_stagiaire
              }, // On passe le code du stagiaire*/
              dataType: 'json', // On attend du JSON en réponse
              success: function(response) {
                  if (response.success) {
                    //alert('Info: ' + response.total_stagiaires);
                  } else {
                      alert('Alert: ' + response.message);
                  }
                  $('#totalStagiaire').text(response.total_stagiaires);
                  $('#totalActif').text(response.nbre_stage_encours);
                  $('#totalNouveau').text(response.nbre_stage_debut_mois_encours);
                  $('#totalEcole').text(response.nbre_ecoles);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                  console.error("Erreur AJAX:", textStatus, errorThrown);
                  alert('Erreur lors du chargement des stages.');
              }
          });
        }


        //---- GRAPHIQUES -----------------------------------------
        // Fonction pour charger les données et créer le graphique
        function loadAndCreateChart() {
            $.ajax({
                url: 'stagiaires_par_ecole.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        createChart(response.stagiaires_par_ecole);
                    } else {
                        console.error('Erreur lors du chargement des données:', response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Erreur AJAX:', error);
                }
            });
        }

        // Fonction pour créer le graphique
        function createChart(data) {
            var labels = data.map(item => item.ecole);
            var values = data.map(item => item.nombre_stagiaires);

            var ctx = document.getElementById('stagiairesChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Nombre de stagiaires',
                        data: values,
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Nombre de stagiaires par école'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Nombre de stagiaires'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Écoles'
                            }
                        }
                    }
                }
            });
        }

        // Charger les données et créer le graphique au chargement de la page
        loadAndCreateChart();

        
      });
     </script>
  </body>
</html>
