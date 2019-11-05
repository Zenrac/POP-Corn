<?php
include_once(get_path('outils/connexpdo.inc.php'));
$cnx=connexpdo('bdpopcorn','myparam');

class recherche
{
	public function funcrecherche ()
	{
    include_once(get_path('outils/connexpdo.inc.php'));
    $cnx=connexpdo('bdpopcorn','myparam');
      $req="
      SELECT titre, nomAlbum, nom
      FROM Musique M
      INNER JOIN Ecrire E
      ON E.numMusique = M.numMusique
      INNER JOIN Auteur A
      ON E.numAuteur = A.numAuteur
      INNER JOIN Album Al
      ON Al.numAlbum = M.numAlbum;
      ";
      $req = $cnx->query($req);
      $results = $req->fetchAll();
      $arr = array();
      foreach ($results as $result) {
        $titre = $result['titre'];
        $nom = $result['nomAlbum'];
        $nomAuteur = $result['nom'];
        if (!in_array($nom, $arr)) {
          array_push($arr, $nom);
        }
        if (!in_array($titre, $arr)) {
          array_push($arr, $titre);
        }
        if (!in_array($nomAuteur, $arr)) {
          array_push($arr, $nomAuteur);
        }
      }
      $arr = implode('|', $arr);

    echo "
    <script>
    $( function() {
      var allTags = `".$arr."`;
      var availableTags = allTags.split('|');
      $( '#searchbar' ).autocomplete({
      source: availableTags,
      minLength:2
    });
    });

			jQuery.ui.autocomplete.prototype._resizeMenu = function () {
  		var ul = this.menu.element;
  		ul.outerWidth(this.element.outerWidth());
		}
    </script>";
  }
}
