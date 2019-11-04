<ul>
  <?php
    echo "<li><a id='indexAdmin.php' href=".get_path('pages/back/indexAdmin.php').">Accueil</a></li>";
    echo '
    <li>
    <ul id="deroul" class="deroul">
      <li>
        <a id="tops" href="#">Gestion</a>
        <ul>
        <li><a id="gestionUser.php" href='.get_path('pages/back/gestionUser.php').'>Utilisateur</a></li>
        <li><a id="gestionTag.php" href='.get_path('pages/back/gestionTag.php').'>Tag</a></li>
        </ul>
      </li>
    </ul>
    </li>
        ';
    echo "<li><a href=".get_path('index.php?deconnexion=1')." name='deconnexion' TARGET='_BLANK'>Site</a></li>";
    echo "<li><a href=".get_path('index.php?deconnexion=1')." name='deconnexion'>Deconnexion</a></li>";
  ?>
</ul>
