<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once '../includes/header.php';
			//fonction de deconnexion pour le salarie
			if (isset($_GET['id']))
			{
				$req="	SELECT DISTINCT m.titre, m.duree, au.nom, au.prenom, a.nomAlbum, a.imageAlbum, a.anneeAlbum, m.numMusique, a.numAlbum
				FROM Musique m
				INNER JOIN Album a on m.numAlbum = a.numAlbum
				INNER JOIN Ecrire e on m.numMusique = e.numMusique
				INNER JOIN Auteur au on e.numAuteur = au.numAuteur
				WHERE m.numMusique = '".$_GET['id']."'";

				$req = $cnx->query($req);

				$req2 = "SELECT DISTINCT * from posseder p inner join tag t on p.numTag = t.numTag where numMusique = '".$_GET['id']."'";
				$req2 = $cnx->query($req2);

				$elems = $req->fetchAll();
				$elems2 = $req2->fetchAll();

				$nblignes = count($elems);
				$nblignes2 = count($elems2);
				if ($nblignes == 0)
				{
					echo "Cette musique n'existe pas";
				}
				else
				{
					$t = 0;
					$donnees = $elems[0];
					if ($nblignes2 != 0)
					{
						$donnees2 = $elems2[0];
						$t = 1;
					}
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

					echo "<li><p>Tag : </p><p class = lien> ";
					if ($t == 0){echo "Il n'y a pas encore de tag sur cette musique ! Ajoutez en !";}
					foreach ($elems2 as $donnee2)
					{
						echo $donnee2['nomTag'];
						echo "<br>";
					}
					echo " </p></li>";

					echo "</ul></div>";
					echo "</div>";
					echo '<iframe src="https://open.spotify.com/embed/album/'.$donnees['numAlbum'].'" width="300" height="80" frameborder="0"
						 allowtransparency="true" allow="encrypted-media"></iframe>';

					echo "<form action='".$_SERVER['PHP_SELF']."?id=".$donnees['numMusique']."' method='post'>";
					echo "	<input type='submit' name='Playlist' value='Ajouter à la playlist' class='btt'></input><br />";
					echo "	<input type='submit' name='AjTag' value='Ajouter un tag' class='btt'></input>";
					echo "	<input type='submit' name='SupTag' value='Supprimer un tag' class='btt'></input>";
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
				echo "'\'".$_SERVER['PHP_SELF']."?id=".$reponse."\''+";
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


			if (!empty($_POST['AjTag']) && empty($_SESSION['nom']))
			{
				echo "<script type='text/javascript'> alert('Vous devez vous connecter pour ajouter un tag a la musique !')</script>";
			}
			elseif(!empty($_POST['AjTag']))
			{
				$reponse = $_POST['numMusique'];
				$req = "Select * from tag";
				$req = $cnx->query($req);

				echo "<script type='text/javascript'>
							Swal.fire({
							position: 'center',
							title: 'Choisir tag',
							html:";
				echo "'<form action='+";
				echo "'\'".$_SERVER['PHP_SELF']."?id=".$reponse."\''+";
				echo "' method=\'post\'>'+";
				echo "'	<input type=\'hidden\' name=\'numMusique\' value=\'".$reponse."\' class=\'btt\'></input>'+";
				while($donnees = $req->fetch(PDO::FETCH_ASSOC))
				{
						echo "'<div><input type=\"checkbox\" name=\"choixtag[]\"'+";
						echo "' value=\'".$donnees['numTag']."\'>'+";
						echo "'".$donnees['nomTag']."'+";
						echo "'</div>'+";
				}
				echo "'<input type=\"submit\" name=\"Valider\" value=\"Valider\" class=\"btt\">'+";
				echo "'</form>',";
				echo	"showConfirmButton: false })</script>";
			}

			if (!empty($_POST['Valider']))
			{

				foreach($_POST['choixtag'] as $val)
				{
					$num = $cnx->quote($_POST['numMusique']);
					$nums = $_POST['numMusique'];
					$rep = "INSERT INTO posseder values (".$num.",".$val.")";
					$cnx->exec($rep);
				}
				echo "<script>document.location.href='music.php?id=$nums' </script>";
			}

			if (!empty($_POST['SupTag']) && empty($_SESSION['nom']))
			{
				echo "<script type='text/javascript'> alert('Vous devez vous connecter pour supprimer un tag a la musique !')</script>";
			}
			elseif(!empty($_POST['SupTag']))
			{
				$reponse = $_POST['numMusique'];
				$req = "Select * from posseder p inner join tag t on p.numTag = t.numTag where numMusique = '".$reponse."'";
				$req = $cnx->query($req);

				echo "<script type='text/javascript'>
							Swal.fire({
							position: 'center',
							title: 'Choisir tag',
							html:";
				echo "'<form action='+";
				echo "'\'".$_SERVER['PHP_SELF']."?id=".$reponse."\''+";
				echo "' method=\'post\'>'+";
				echo "'	<input type=\'hidden\' name=\'numMusique\' value=\'".$reponse."\' class=\'btt\'></input>'+";
				while($donnees = $req->fetch(PDO::FETCH_ASSOC))
				{
						echo "'<div><input type=\"checkbox\" name=\"supptag[]\"'+";
						echo "' value=\'".$donnees['numTag']."\'>'+";
						echo "'".$donnees['nomTag']."'+";
						echo "'</div>'+";
				}
				echo "'<input type=\"submit\" name=\"Supp\" value=\"Supprimer\" class=\"btt\">'+";
				echo "'</form>',";
				echo	"showConfirmButton: false })</script>";
			}

			if (!empty($_POST['Supp']))
			{

				foreach($_POST['supptag'] as $val)
				{
					$num = $cnx->quote($_POST['numMusique']);
					$nums = $_POST['numMusique'];
					$rep = "Delete from posseder where numMusique = ".$num." and numTag =".$val;
					$cnx->exec($rep);
				}
					echo "<script>document.location.href='music.php?id=$nums' </script>";
			}

		?>

		<?php
			include_once '../includes/footer.php';
		?>

	</body>
</html>
