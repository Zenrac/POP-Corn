<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once '../includes/header.php';
			//fonction de deconnexion pour le salarie
			if (isset($_GET['id']))
			{
				$req="	SELECT DISTINCT m.titre, m.duree, au.nom, au.prenom, a.nomAlbum, a.imageAlbum, a.anneeAlbum, m.numMusique
				FROM Musique m
				INNER JOIN Album a on m.numAlbum = a.numAlbum
				INNER JOIN Ecrire e on m.numMusique = e.numMusique
				INNER JOIN Auteur au on e.numAuteur = au.numAuteur
				WHERE m.numMusique = '".$_GET['id']."'";

				$req = $cnx->query($req);

				$elems = $req->fetchAll();

				$nblignes = count($elems);
				if ($nblignes == 0)
				{
					echo "Cette musique n'existe pas";
				}
				else
				{
					$donnees = $elems[0];
					date_default_timezone_set('Europe/Paris');
					$duree = gmdate("i:s", $donnees['duree']/1000);
					$date = date("Y", strtotime($donnees['anneeAlbum']));

					echo "<div class='musicinfos'>
		        	<img class=musicimg src=".$donnees['imageAlbum']." alt='Image de album'>
		        	<ul class='musictxt'>";
					echo "<li><p>Titre : </p><p class = lien> ".$donnees['titre']." </p></li>";
					echo "<li><p>Durée : </p><p class = lien> ".$duree."</p></li>";

					echo "<li><p>Artiste".(($nblignes != 1) ? "s" : "") . " : </p><p class = lien>";

					foreach ($elems as $donnee) {
						echo $donnee['nom'];
						if ($donnee['prenom'] != "null")
						{
							echo " " . $donnee['prenom'];
						}
						echo "<br>";
					}
					echo "</p></li>";
					if ($donnees['titre'] != $donnees['nomAlbum'])
					{
						echo "<li><p>Album : </p><p class = lien> ".$donnees['nomAlbum']." </p></li>";
					}
					echo "<li><p>Année : </p><p class = lien> ".$date." </p></li>";
					echo "</ul></div>";

					echo "</div>";
				}
			}
		?>

		<?php
			include_once '../includes/footer.php';
		?>

	</body>
</html>
