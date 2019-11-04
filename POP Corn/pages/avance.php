<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once '../includes/header.php';
			$cnx = connexpdo('bdpopcorn','myparam');
			include_once(get_path('fonction/recherche.php'));

			$req = "SELECT distinct year(anneeAlbum) as anneeAlbum from album order by anneeAlbum desc";
			$req = $cnx->query($req);
			echo "<br><span class='paramavance'>Choisir une année : </span><br>";
			echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
			echo "<select name='annee'>";
			echo "<option value='selected' selected>Selectionnez</option>";
			while($donnees = $req->fetch(PDO::FETCH_ASSOC))
			{
				echo "<option value=".$donnees['anneeAlbum'].">".$donnees['anneeAlbum']."</option>";
			}
			echo "</select>";
			echo "<input type='submit' class='btnopt btn btn-secondary btn-sm' name='RechercherAn' value='Rechercher'/>";
			echo "</form> <br />";


			$req = "SELECT DISTINCT * from tag order by nomTag";
			$req = $cnx->query($req);
			echo "<span class='paramavance'>Choisir par un tag : </span><br>";
			echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
			echo "<select name='tag'>";
			echo "<option value='selected' selected>Selectionnez</option>";
			while($donnees = $req->fetch(PDO::FETCH_ASSOC))
			{
				echo "<option value=".$donnees['numTag'].">".$donnees['nomTag']."</option>";
			}
			echo "</select>";
			echo "<input type='submit' class='btnopt btn btn-secondary btn-sm' name='RechercherTag' value='Rechercher'/>";
			echo "</form> <br />";

			$req = "SELECT DISTINCT * from Auteur order by nom";
			$req = $cnx->query($req);
			echo "<span class='paramavance'>Choisir par un auteur : </span><br>";
			echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
			echo "<select name='auteur'>";
			echo "<option value='selected' selected>Selectionnez</option>";
			while($donnees = $req->fetch(PDO::FETCH_ASSOC))
			{
				echo "<option value='".$donnees['numAuteur']."'>".$donnees['nom']." ";
				if($donnees['prenom']!='null'){echo $donnees['prenom'];}
				echo "</option>";
			}
			echo "</select>";
			echo "<input type='submit' class='btnopt btn btn-secondary btn-sm' name='RechercherAuteur' value='Rechercher'/>";
			echo "</form> <br />";

			$req = "SELECT DISTINCT * from musique";
			$req = $cnx->query($req);
			echo "<span class='paramavance'>Choisir par une durée : </span><br>";
			echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
			echo "<select name='duree'>";
			echo "<option value='selected' selected>Selectionnez</option>";
			echo "<option value='courte'>Courte (<3min)</option>";
			echo "<option value='longue'>Longue (>3min)</option>";
			echo "</select>";
			echo "<input type='submit' class='btnopt btn btn-secondary btn-sm' name='RechercherDuree' value='Rechercher'/>";
			echo "</form> <br />";


			if(!empty($_POST['RechercherAn']))
			{
				if($_POST['annee'] != 'selected')
				{
					$req = "SELECT * from album a inner join musique m on a.numAlbum = m.numAlbum where year(anneeAlbum) = ".$_POST['annee'];
					$req = $cnx->query($req);

					echo "<span class='paramavance'>Voici le résultat de la recherche :</span><br>";
					while($donnees = $req->fetch(PDO::FETCH_ASSOC))
					{
						echo "<a href='".get_path('pages/music.php?id='.$donnees['numMusique'])."'>".$donnees['titre']."</a>";
					}
				}
				else
				{
					echo "<span class='paramavance'>Veuillez selectionnez une année</span>";
				}
			}
			if(!empty($_POST['RechercherTag']))
			{
				if($_POST['tag'] != 'selected')
				{
					$req = "SELECT DISTINCT * from posseder p inner join musique m on p.numMusique = m.numMusique where numTag = ".$_POST['tag'];
					$req = $cnx->query($req);

					echo "<span class='paramavance'>Voici le résultat de la recherche :</span><br>";
					while($donnees = $req->fetch(PDO::FETCH_ASSOC))
					{
						echo "<a href='".get_path('pages/music.php?id='.$donnees['numMusique'])."'>".$donnees['titre']."</a>";
					}
				}
				else
				{
					echo "<span class='paramavance'>Veuillez selectionnez un tag</span>";
				}
			}
			if(!empty($_POST['RechercherAuteur']))
			{
				if($_POST['auteur'] != 'selected')
				{
					$req = "SELECT DISTINCT * from ecrire e inner join musique m on e.numMusique = m.numMusique where numAuteur = '".$_POST['auteur']."'";
					$req = $cnx->query($req);

					echo "<span class='paramavance'>Voici le résultat de la recherche :</span><br>";
					while($donnees = $req->fetch(PDO::FETCH_ASSOC))
					{
						echo "<a href='".get_path('pages/music.php?id='.$donnees['numMusique'])."'>".$donnees['titre']."</a>";
					}
				}
				else
				{
					echo "<span class='paramavance'>Veuillez selectionnez un auteur</span>";
				}
			}
			if(!empty($_POST['RechercherDuree']))
			{
				if($_POST['duree'] != 'selected')
				{
					if ($_POST['duree'] == 'courte')
					{
						$req = "SELECT * from musique where duree < 180000";
					}
					else
					{
						$req = "SELECT * from musique where duree > 180000";
					}
					$req = $cnx->query($req);

					echo "<span class='paramavance'>Voici le résultat de la recherche :</span><br>";
					while($donnees = $req->fetch(PDO::FETCH_ASSOC))
					{
						echo "<a href='".get_path('pages/music.php?id='.$donnees['numMusique'])."'>".$donnees['titre']."</a>";
					}
				}
				else
				{
					echo "<span class='paramavance'>Veuillez selectionnez une durée</span>";
				}
			}




			include_once '../includes/footer.php';
		?>

	</body>
</html>
