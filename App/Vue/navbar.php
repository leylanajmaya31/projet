<?php ob_start()?>
<?php if(isset($_SESSION['connected'])):?>
  <nav>
      <ul>
        <li class="active"><a href="#"><i class='bx bx-home' style='color:#b6452c'></i> Accueil</a></li>
        <li class="menu-deroulant">
          <a href="#">Recettes</a>
          <ul class="sous-menu">
            <li><a href="#">Théme</a>
            <li><a href="#">Niveaux</a>
            <li><a href="#">Catégorie</a>
          </ul>
        </li>
        <li class="menu-deroulant">
          <a href="#">Vidéos</a>
          <ul class="sous-menu">
            <li><a href="#">Théme</a>
            <li><a href="#">Niveaux</a>
          </ul>
        </li>
        <li><a href="ateliers.html">Ateliers</a></li>
        <li class="menu-deroulant">
          <a href="inscription-connexion.html"><i class='bx bx-user-circle' style='color:#B6452C'></i> Mon compte</a>
          <ul class="sous-menu">
            <li><a href="connexion.html"> Mon compte</a>
          </ul>
        </li>
        <li class="active"><a href="panier2.html"><i class='bx bx-cart-download' style='color:#B6452C'></i> Panier</a></li>
      </ul>
      <button id="menuToggle"><img src="/images/hamburger.svg" alt="Ouvrir/fermer le menu"></button>
    </nav>
<?php else:?>
  <nav>
      <ul>
        <li class="active"><a href="#"><i class='bx bx-home' style='color:#b6452c'></i> Accueil</a></li>
        <li class="menu-deroulant">
          <a href="#">Recettes</a>
          <ul class="sous-menu">
            <li><a href="#">Théme</a>
            <li><a href="#">Niveaux</a>
            <li><a href="#">Catégorie</a>
          </ul>
        </li>
        <li class="menu-deroulant">
          <a href="#">Vidéos</a>
          <ul class="sous-menu">
            <li><a href="#">Théme</a>
            <li><a href="#">Niveaux</a>
          </ul>
        </li>
        <li><a href="ateliers.html">Ateliers</a></li>
        <li class="menu-deroulant">
          <a href="inscription-connexion.html"><i class='bx bx-user-circle' style='color:#B6452C'></i> Compte</a>
          <ul class="sous-menu">
            <li><a href="connexion.html">Connexion</a>
            <li><a href="inscription.html">Inscription</a>
          </ul>
        </li>
        <li class="active"><a href="panier2.html"><i class='bx bx-cart-download' style='color:#B6452C'></i> Panier</a></li>
      </ul>
      <!-- <button id="menuToggle"><img src="/images/hamburger.svg" alt="Ouvrir/fermer le menu"></button> -->
    </nav>

<?php endif;?>
<?php $navbar = ob_get_clean()?>
