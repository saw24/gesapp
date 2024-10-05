<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
      <a href="index.php" class="logo">
        <img
          src="assets/img/logo_gesapp2.PNG"
          alt="navbar brand"
          class="navbar-brand"
          height="20" />
      </a>
      <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
          <i class="gg-menu-right"></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler">
          <i class="gg-menu-left"></i>
        </button>
      </div>
      <button class="topbar-toggler more">
        <i class="gg-more-vertical-alt"></i>
      </button>
    </div>
    <!-- End Logo Header -->
  </div>
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary">
        <li class="nav-item active">
          <a
            href="index.php"
            aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Accueil</p>
            <span class="caret"></span>
          </a>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#sidebarLayouts">
            <i class="fas fa-th-list"></i>
            <p>Stagiaires</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="sidebarLayouts">
            <ul class="nav nav-collapse">
              <!--li>
                <a href="sidebar-style-2.html">
                  <span class="sub-item">Nouveau</span>
                </a>
              </li-->
              <li>
                <a href="stagiaire_liste.php?pageName=Liste Stagiaires">
                  <span class="sub-item">Liste</span>
                </a>
              </li>
            </ul>
          </div>
        </li>



        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#forms">
            <i class="fas fa-cogs"></i>
            <p>Paramètres</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="forms">
            <ul class="nav nav-collapse">
              <li>
                <a href="service_liste.php?pageName=Liste Services">
                  <span class="sub-item">Services</span>
                </a>
              </li>
              <li>
                <a href="ecole_liste.php?pageName=Liste Etablissements">
                  <span class="sub-item">Etablissements</span>
                </a>
              </li>
              <li>
                <a href="filiere_liste.php?pageName=Liste Filières">
                  <span class="sub-item">Filières</span>
                </a>
              </li>
              <li>
                <a href="niveau_liste.php?pageName=Liste Niveaux">
                  <span class="sub-item">Niveaux</span>
                </a>
              </li>
              <li>
                <a href="type_liste.php?pageName=Liste Types Etudiant">
                  <span class="sub-item">Types Etudiant</span>
                </a>
              </li>
              <li>
                <a href="pays_liste.php?pageName=Liste Pays">
                  <span class="sub-item">Pays</span>
                </a>
              </li>
            </ul>
          </div>
        </li>


        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#base">
            <i class="fas fa-user-cog"></i>
            <p>Utilisateurs</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="base">
            <ul class="nav nav-collapse">
              <li>
                <a href="components/avatars.html">
                  <span class="sub-item">Nouveau</span>
                </a>
              </li>
              <li>
                <a href="components/buttons.html">
                  <span class="sub-item">Liste</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

      </ul>
    </div>
  </div>
</div>