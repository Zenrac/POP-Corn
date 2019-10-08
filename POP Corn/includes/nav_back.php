<ul>
  <?php
    echo "<li><a href=".get_path('pages/back/indexAdmin.php').">Accueil</a></li>";
    echo '
    <li>
    <ul class="deroul">
      <li>
        <a href="#">Gestion</a>
        <ul>
        <li><a href='.get_path('pages/back/gestionUser.php').'>Utilisateur</a></li>
        <li><a href='.get_path('pages/back/gestionTag.php').'>Tag</a></li>
        </ul>
      </li>
    </ul>
    </li>
        ';
    echo "<li><a href=".get_path('index.php')." TARGET='_BLANK'>Site</a></li>";
    echo "<li><a href=".get_path('index.php?deconnexion=1')." name='deconnexion'>Deconnexion</a></li>";
  ?>
</ul>
