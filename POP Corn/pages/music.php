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

					echo "<form action='".$_SERVER['PHP_SELF']."?id=".$donnees['numMusique']."' method='post'>";
					echo "	<input type='submit' name='Playlist' value='Ajouter à la playlist' class='btt'></input>";
					echo "	<input type='hidden' name='numMusique' value='".$donnees['numMusique']."' class='btt'></input>";
					echo "</form>";
				}
			}

			if (!empty($_POST['Playlist']) && empty($_SESSION['nom']))
			{
				echo "<script type='text/javascript'> alert('Vous devez vous connecter pour ajouter à votre playlist !')</script>";
			}
			elseif(!empty($_POST['Playlist']))
			{
				$req = "Select * from utilisateur u inner join playlist p on u.numUser = p.numUser where pseudo ='".$_SESSION['nom']."'";
				$req = $cnx->query($req);
				$reponse = $_POST['numMusique'];
				echo "<script type='text/javascript'>
							Swal.fire({
						  position: 'center',
						  title: 'Choisir playlist',
							html:";
				echo "'<form action='+";
				echo "'\'".$_SERVER['PHP_SELF']."\''+";
				echo "' method=\'post\'>'+";
				echo "'	<input type=\'hidden\' name=\'numMusique\' value=\'".$reponse."\' class=\'btt\'></input>'+";
				while($donnees = $req->fetch(PDO::FETCH_ASSOC))
				{
						echo "'<div><input type=\"checkbox\" name=\"choixplaylist[]\"'+";
						echo "' value=\'".$donnees['numPlaylist']."\'>'+";
						echo "'".$donnees['nom']."'+";
						echo "'</div>'+";
				}
				echo "'<input type=\"submit\" name=\"Confirmer\" value=\"Confirmer\" class=\"btt\">'+";
				echo "'</form>',";
				echo	"showConfirmButton: false })</script>";
			}

			if (!empty($_POST['Confirmer']))
			{

				foreach($_POST['choixplaylist'] as $val)
				{
					$num = $cnx->quote($_POST['numMusique']);
					$rep = "INSERT INTO contenir values (".$val.",".$num.")";
					$cnx->exec($rep);
				}
			}
		?>

		<?php
			include_once '../includes/footer.php';
		?>

	</body>
</html>
