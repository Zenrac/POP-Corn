<ul>
  <?php
    echo "<li><a id='index.php' href=".get_path('index.php').">Accueil</a></li>";
    echo "<li><a id='index.php' href=".get_path('pages/ttmusique.php').">Musique</a></li>";
  ?>
  <li>
    <ul id=deroul class="deroul">
      <li>
        <a id="tops" href="#">Tops</a>
        <ul>
          <?php
            echo "<li><a id='top2019.php' href=".get_path('pages/top2019.php').">Top 2019</a></li>";
            echo "<li><a id='top2018.php' href=".get_path('pages/top2018.php').">Top 2018</a></li>";
          ?>
        </ul>
      </li>
    </ul>
  </li>





  <div id="admin-button" class=admin>
    <button class="" onclick="openForm()">Connexion</button>
    <form id="connexion" class="connexadmin" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >
    <fieldset>
      <legend class="connextitle"><b>Saisir vos identifiants</b></legend>
        <span>Utilisateur:</span>
        <input type="text" name="user" size="10" autocomplete="off" required minlength="2" maxlength="30"/>
        <span>Mot de passe:</span>
        <input type="password" name="password" size="10" required minlength="2" maxlength="30"/>

        <span id="txtverifmdp" style="display: none;">Mot de passe à nouveau:</span>
        <input id="verifmdp" type="hidden" name="passwordverif" size="10" required minlength="2" maxlength="30"/>

        <input id="connexionbutton" type="submit" value="connexion"/>
    </fieldset>
    <!-- 1: se connecter / 2: s'inscrire -->
    <input id="hiddeninput" type="hidden" name="type" value="1"/>
    <a href="#" id="switchinscription" onclick="setInscription()">Je n'ai pas de compte</a>
    </form>
  </div>
  <?php
        if(!empty($_SESSION['nom']))
        {
          echo "<li><a href=".get_path('pages/profil.php').">Profil</a></li>";
          echo "<li><a href=".get_path('index.php?deconnexion=1')." name='deconnexion'>Deconnexion</a></li>";
          echo "<script>hide_element('admin-button');</script>";
        }


  ?>
</ul>
