<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once '../includes/header.php';
			$cnx = connexpdo('bdpopcorn','myparam');
			include_once(get_path('fonction/recherche.php'));
			echo '<canvas id="canvas"></canvas>
			<script type="text/javascript">
				backgroundEffect("canvas");
			</script>';
			$req = "SELECT distinct year(anneeAlbum) as anneeAlbum from album order by anneeAlbum desc";
			$req = $cnx->query($req);
			echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
			echo "<br><span class='paramavance'>Choisir une année : </span><br>";
			echo "<select name='annee'>";
			echo "<option value='selected' selected>Selectionnez</option>";
			while($donnees = $req->fetch(PDO::FETCH_ASSOC))
			{
				echo "<option value=".$donnees['anneeAlbum'].">".$donnees['anneeAlbum']."</option>";
			}
			echo "</select>";
			echo "<br />";


			$req = "SELECT DISTINCT * from tag order by nomTag";
			$req = $cnx->query($req);
			echo "<span class='paramavance'>Choisir par un tag : </span><br>";
			echo "<select name='tag'>";
			echo "<option value='selected' selected>Selectionnez</option>";
			while($donnees = $req->fetch(PDO::FETCH_ASSOC))
			{
				echo "<option value=".$donnees['numTag'].">".$donnees['nomTag']."</option>";
			}
			echo "</select>";
			echo "<br />";

			$req = "SELECT DISTINCT * from Auteur order by nom";
			$req = $cnx->query($req);
			echo "<span class='paramavance'>Choisir par un auteur : </span><br>";
			echo "<select name='auteur'>";
			echo "<option value='selected' selected>Selectionnez</option>";
			while($donnees = $req->fetch(PDO::FETCH_ASSOC))
			{
				echo "<option value='".$donnees['numAuteur']."'>".$donnees['nom']." ";
				if($donnees['prenom']!='null'){echo $donnees['prenom'];}
				echo "</option>";
			}
			echo "</select>";
			echo "<br />";

			$req = "SELECT DISTINCT * from musique";
			$req = $cnx->query($req);
			echo "<span class='paramavance'>Choisir par une durée : </span><br>";

			echo "<select name='duree'>";
			echo "<option value='selected' selected>Selectionnez</option>";
			echo "<option value='courte'>Courte (<3min)</option>";
			echo "<option value='longue'>Longue (>3min)</option>";
			echo "</select><br />";
			echo "<input type='submit' class='btnopt btn btn-secondary btn-sm' name='Rechercher' value='Rechercher'/>";
			echo "</form> <br />";


			if(!empty($_POST['Rechercher']))
			{
				$resAnnee = $_POST['annee'];
				$resTag = $_POST['tag'];
				$resAuteur = $_POST['auteur'];
				$resDuree = $_POST['duree'];

				$req = "SELECT DISTINCT m.titre, m.duree, au.nom, au.prenom, a.nomAlbum, a.imageAlbum, a.anneeAlbum, m.numMusique, a.numAlbum, p.numTag, au.numAuteur
				FROM Musique m
				INNER JOIN Album a on m.numAlbum = a.numAlbum
				INNER JOIN Ecrire e on m.numMusique = e.numMusique
				INNER JOIN Auteur au on e.numAuteur = au.numAuteur
				INNER JOIN Posseder p on m.numMusique = p.numTag
				WHERE ";

				$deja = false;

				if($resAnnee != 'selected')
				{
					$req = $req." year(anneeAlbum) = ".$resAnnee;
					$deja = true;
				}
				if($resTag != 'selected')
				{
					if ($deja)
					{
						$req .= " AND ";
					}
					$req .= " p.numTag = ".$resTag;
					$deja = true;
				}
				if($resAuteur != 'selected')
				{
					if ($deja)
					{
						$req .= " AND ";
					}
					$req .= " e.numAuteur = '".$resAuteur."'";
					$deja = true;
				}
				if($resDuree != 'selected')
				{
					if ($deja)
					{
						$req .= " AND ";
					}
					if($resDuree == 'courte')
					{
						$req .= " duree < 180000";
					}
					else if ($resDuree == 'longue')
					{
						$req .= " duree > 180000";
					}
					$deja = true;
				}

				if($deja)
				{
					$req .= ";";
					$req = $cnx->query($req);
					$elems = $req->fetchAll();
					$nblignes = count($elems);
					if ($nblignes == 0)
					{
						echo "<span class='paramavance'>Il n'y a pas de résultat pour cette recherche</span><br>";
					}
					else
					{
						echo "<span class='paramavance'>Voici le résultat de la recherche :</span><br>";
						foreach ($elems as $donnees)
						{
							echo "<a href='".get_path('pages/music.php?id='.$donnees['numMusique'])."'>".$donnees['titre']."</a>";
						}
					}
				}
				else
				{
					echo "<span class='paramavance'>Veuillez selectionnez quelque chose</span>";
				}
			}
			include_once '../includes/footer.php';
		?>

	</body>
</html>
