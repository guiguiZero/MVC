<!DOCTYPE html>
    <!-- Navbar -->
    <?php
      if(session_status() != PHP_SESSION_ACTIVE){
        session_start();
      }
      require_once(ROOT.'app/isConnected.php');
     ?>
  <div>
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Navbar brand -->
    <a class="navbar-brand" href="/MVC/accueil">
      <img src="/MVC/Views/images/logo.png" height="75" alt="" loading="lazy" />
    </a>
    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/MVC/listProduit/setList">Liste Produits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/MVC/tutoriels/setList">Tutoriels</a>
        </li>
        <?php
        if(isset($_SESSION['idUser'])){
          if($_SESSION['Admin'] == 1){?>
            <li class="nav-item">
              <a class="nav-link" href="/MVC/ajoutProduit/add">Ajout d'un produit</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/MVC/ajoutProduit/readd">Remise en stock</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/MVC/setPromotion/index">Faire Promotions</a>
            </li>
        <?php }
      } ?>
      </ul>
      <!-- Left links -->

      <!-- Search form -->
      <ul class="navbar-nav mb-2 mb-lg-0">
        <!-- Navbar dropdown -->
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle hidden-arrow" href="/MVC/panier/index" id="navbarDropdown" role="button">
            <i class="fas fa-shopping-cart"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img src="/MVC/Views/images/util.png" class="rounded-circle img-fluid"
              height='25' width='25'>
          </a>
          <!-- Dropdown menu -->
          <?php
        if(isConnected()){
           ?>
          <ul class="dropdown-menu dropdown-menu-end p-1" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/MVC/profil">Votre Profil</a></li>
            <li><a class="dropdown-item" href="/MVC/deconnexion">Déconnexion</a></li>
          </ul>
          <?php
        }else{
           ?>
           <ul class="dropdown-menu dropdown-menu-end p-1" aria-labelledby="navbarDropdown">
             <li><a class="dropdown-item" href="/MVC/connexion">Connexion/ Inscription</a></li>
           </ul>
           <?php
         }
         ?>
        </li>
      </ul>

    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
</div>
