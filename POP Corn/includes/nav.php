<ul>
  <?php
    echo "<li><a href=".get_path('index.php').">Accueil</a></li>";
  ?>
  <li>
    <ul class="deroul">
      <li>
        <a href="">Tops</a>
        <ul>
          <?php
            echo "<li><a href=".get_path('pages/top2019.php').">Top 2019</a></li>";
                            echo "<li><a href=".get_path('pages/top2018.php').">Top 2018</a></li>";
          ?>
        </ul>
      </li>
    </ul>
  </li>

  <div id="admin-button" class=admin>
    <button class="" onclick="openForm(id=2)">Inscription</button>
    <form id="inscription" class="connexadmin" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >
    <fieldset>
      <legend><b>Saisir vos identifiants</b></legend>
      <table>
        <tbody>
          <tr>
            <td> Utilisateur: </td>
            <td><input type="text" name="nom" size="10" required minlength="2" maxlength="30"/></td>
          </tr>
          <tr>
            <td> Mot de passe: </td>
            <td><input type="password" name="mdp" size="10" required minlength="2" maxlength="30"/></td>
          </tr>
          <tr>
            <td><input type="submit" value="inscription"/></td>
          </tr>
        </tbody>
      </table>
    </fieldset>
    </form>
  </div>

  <div id="admin-button" class=admin>
    <button class="" onclick="openForm()">Connexion</button>
    <form id="connexion" class="connexadmin" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >
    <fieldset>
      <legend><b>Saisir vos identifiants</b></legend>
      <table>
        <tbody>
          <tr>
            <td> Utilisateur: </td>
            <td><input type="text" name="user" size="10" required minlength="2" maxlength="30"/></td>
          </tr>
          <tr>
            <td> Mot de passe: </td>
            <td><input type="password" name="password" size="10" required minlength="2" maxlength="30"/></td>
          </tr>
          <tr>
            <td><input type="submit" value="connexion"/></td>
          </tr>
        </tbody>
      </table>
    </fieldset>
    </form>
  </div>

</ul>
