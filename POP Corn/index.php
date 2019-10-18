<!DOCTYPE html>
<html>
	<body>


		<?php
			include_once './includes/header.php';

			//fonction de deconnexion pour le salarie
			if (isset($_GET['deconnexion']))
			{
				// On écrase le tableau de session
				$_SESSION = array();

				// Puis on la détruit la session donc le numéro unique de session
				session_destroy();

				unset($_SESSION);

				unset($_COOKIE);

				header("Cache-Control: no-store, no-cache, must-revalidate");
				header("Location:index.php");


				exit;
			}

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

		?>
		<script>
  		$( function() {
				var allTags = `<?php echo $arr; ?>`;
    		var availableTags = allTags.split('|');
				$( "#searchbar" ).autocomplete({
				source: availableTags,
				minLength:2,
			});
			});
		</script>
		<div class="autocomplete">
			<span>Recherche:</span>
			<input id="searchbar">
		</div>
		<?php
			include_once './includes/footer.php';
		?>
	</body>
</html>
