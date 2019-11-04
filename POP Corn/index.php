<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once './includes/header.php';
			if (empty($_POST['barre'])) {
				echo "</form>";
				echo '<canvas id="canvas"></canvas>
				<script type="text/javascript">
					backgroundEffect("canvas");
				</script>';
			}
			echo "<div class='bodyelement'>";
			//fonction de deconnexion pour le salarie
			if (isset($_GET['deconnexion']))
			{
				// On écrase le tableau de session
				$_SESSION = array();

				// Puis on la détruit la session donc le numéro unique de session
				session_destroy();

				unset($_SESSION);

				unset($_COOKIE);


				echo "<script>document.location.href='index.php' </script>";

				exit;
			}
			if (empty($_POST['barre'])) {
			include_once(get_path('outils/connexpdo.inc.php'));
			$cnx = connexpdo('bdpopcorn','myparam');
			include_once(get_path('fonction/recherche.php'));
			$instance = new recherche();
			$instance->funcrecherche();
			echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
			echo '<div class="wrap">
			   <div class="autocomplete search">
				 		<div class="searchbarwithbutton">
				      <input id="searchbar" name="barre" type="text" class="searchTerm" placeholder="Quel est votre recherche?">
				      <button type="submit" class="recherchebutton searchButton">
				        <i class="fa fa-search"></i>
				     </button>
						</div>
					 <a class="avancedsearch" href="'.get_path("pages/avance.php").'">Faire une recherche avancé ?</a>
			   </div>
			</div>';
		}
			else
			{
				$cnx = connexpdo('bdpopcorn','myparam');
				include_once(get_path('fonction/recherche.php'));
				$rech = $cnx->quote($_POST['barre']);
				$req = "SELECT * from Musique where titre = ".$rech;
				$req = $cnx->query($req);
				$lignes=$req->fetchall();
				$nblignes = count($lignes);

				$req2 = "SELECT * from Auteur where nom = ".$rech."or prenom = ".$rech;
				$req2 = $cnx->query($req2);
				$lignes2=$req2->fetchall();
				$nblignes2 = count($lignes2);

				$req3 = "SELECT * from album where nomAlbum = ".$rech;
				$req3 = $cnx->query($req3);
				$lignes3=$req3->fetchall();
				$nblignes3 = count($lignes3);

				if ($nblignes == 1)
				{
					$req = "SELECT * from Musique where titre = ".$rech;
					$req = $cnx->query($req);
					$elems = $req->fetchAll();
					$donnees = $elems[0];
					$numMusique = $donnees['numMusique'];
						echo "<script>document.location.href='pages/music.php?id=$numMusique' </script>";
					exit();
				}
				else if ($nblignes2 == 1)
				{
					$req = "SELECT * from Auteur where nom = ".$rech."or prenom = ".$rech;
					$req = $cnx->query($req);
					$elems = $req->fetchAll();
					$donnees = $elems[0];
					echo "<span class=paramavance>Pour l'auteur : ".$_POST['barre'].", Voici les chansons écritent :</span> <br />";

					$req2 = "SELECT a.numAuteur, nom, e.numMusique, titre, duree, nomAlbum
					from auteur a inner join ecrire e on a.numAuteur = e.numAuteur inner join musique m on e.numMusique = m.numMusique
					inner join album al on m.numAlbum = al.numAlbum
					where nom =".$rech."or prenom = ".$rech;
					$req2 = $cnx->query($req2);
					$elems = $req2->fetchAll();
					foreach($elems as $donnees) {
							if (isset($donnees['numMusique']) && isset($donnees['titre'])) {
							$numMusique = $donnees['numMusique'];
							echo "<a href='".get_path('pages/music.php?id='.$numMusique)."'>".$donnees['titre']."</a><br>";
						}
					}
				}
				else if ($nblignes3 == 1)
				{
					$req = "SELECT * from album where nomAlbum = ".$rech;
					$req = $cnx->query($req);
					$elems = $req->fetchAll();
					$donnees = $elems[0];
					echo "Pour l'album : ".$_POST['barre'].", Voici les chansons écritent : <br />";

					$req2 = "SELECT a.numAuteur, nom, e.numMusique, titre, duree, nomAlbum
					from auteur a inner join ecrire e on a.numAuteur = e.numAuteur inner join musique m on e.numMusique = m.numMusique
					inner join album al on m.numAlbum = al.numAlbum
					where nomAlbum =".$rech;
					$req2 = $cnx->query($req2);
					$elems = $req2->fetchAll();
					foreach($elems as $donnees) {
							if (isset($donnees['numMusique']) && isset($donnees['titre'])) {
							$numMusique = $donnees['numMusique'];
							echo "<a href='".get_path('pages/music.php?id='.$numMusique)."'>".$donnees['titre']."</a><br>";
						}
					}
				}
				else
				{
					echo "Ce que vous recherché n'existe pas, ou alors vous l'avez mal écrit <br /> Réessayer";
				}
				echo "<script>
				function reload() {
					window.location = window.location.href;
				}
				</script>";
				echo '<br><br><br>';
				echo "<input class='btnopt btn btn-secondary btn-sm' onclick=reload() value='Nouvelle recherche?'>";
			}

		?>
		<?php
			echo "</div>";
			include_once './includes/footer.php';
		?>
	</body>
</html>
