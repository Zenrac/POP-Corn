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

					echo "<div class='bodyelement musicinfos'>
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
					echo '<iframe src="https://open.spotify.com/embed/album/'.$donnees['numAlbum'].'" width="50%" height="80" frameborder="0"
						 allowtransparency="true" allow="encrypted-media"></iframe>';

					echo "<div class='buttons'>";
					echo "<form action='".$_SERVER['PHP_SELF']."?id=".$donnees['numMusique']."' method='post'>";
					echo "<input class='btnopt btn btn-secondary btn-sm btn-block' type='submit' name='Playlist' value='Ajouter à la playlist'></input>";
					echo "<input class='btnopt btn btn-secondary btn-sm btn-block' type='submit' name='AjTag' value='Ajouter un tag'></input>";
					echo "<input class='btnopt btn btn-secondary btn-sm btn-block' type='submit' name='SupTag' value='Supprimer un tag'></input>";
					echo "<input type='hidden' name='numMusique' value='".$donnees['numMusique']."'></input>";
					echo "</form>";
					echo "</div>";
				}
			}

			if (!empty($_POST['Playlist']) && empty($_SESSION['nom']))
			{
				echo "<script type='text/javascript'>
				Swal.fire({
			    type: 'error',
			    title: 'Vous n\'êtes pas connecté!',
			    text: 'Vous devez être connecté pour ajouter des musiques à votre playlist.',
			  })
			  </script>";
			}
			elseif(!empty($_POST['Playlist']))
			{
				$req = "Select * from utilisateur u inner join playlist p on u.numUser = p.numUser where pseudo ='".$_SESSION['nom']."'";
				$req = $cnx->query($req);
				$donnee = $req->fetchall();
				$reponse = $_POST['numMusique'];
				$nblignes = count($donnee);
				if ($nblignes != 0) {
					echo "<script type='text/javascript'>
								Swal.fire({
							  position: 'center',
							  title: 'Choisir playlist',
								html:";
					echo "'<form action='+";
					echo "'\'".$_SERVER['PHP_SELF']."?id=".$reponse."\''+";
					echo "' method=\'post\'>'+";
					echo "'	<input type=\'hidden\' name=\'numMusique\' value=\'".$reponse."\' class=\'btt\'></input>'+";
					echo "'<table class=\'table table-alert\'>'+";
					foreach($donnee as $donnees)
					{
							echo "'<tr>'+";
							echo "'<td><div class=\'opt\'><input type=\"checkbox\" name=\"choixplaylist[]\"'+";
							echo "'value=\'".$donnees['numPlaylist']."\'></td>'+";
							echo "'<td><label class=\'label-alert\'>".$donnees['nom']."</label></td>'+";
							echo "'</div>'+";
							echo "'</tr>'+";
					}
					echo "'</table>'+";
					echo "'<input type=\"submit\" name=\"Confirmer\" value=\"Confirmer\" class=\"btnopt btn btn-secondary btn-sm btn-block\">'+";
					echo "'</form>',";
					echo	"showConfirmButton: false })</script>";
				}
				else {
					echo "<script type='text/javascript'>
					Swal.fire({
						type: 'error',
						title: 'Aucune playlist trouvées!',
						text: 'Ajoutez une playlist sur votre profil.',
					})
					</script>";
				}
			}
			if (!empty($_POST['Confirmer']))
			{
				$aumoinsune = false;
				$test = true;
				if (isset($_POST['choixplaylist'])) {
					foreach($_POST['choixplaylist'] as $val)
					{
						$aumoinsune = true;
						$num = $cnx->quote($_POST['numMusique']);
						$rep = "select * from contenir where numPlaylist = ".$val." and numMusique = ".$num;
						$rep = $cnx->query($rep);
						$elems = $rep->fetchAll();
						$nblignes = count($elems);
						if ($nblignes == 1)
						{
							echo "<script type='text/javascript'>
							Swal.fire({
						    type: 'error',
						    title: 'Musique non ajoutée',
						    text: 'Votre musique est déjà dans une des playlists',
							});
						  </script>";
							$test = false;
						}
						else
						{
							$rep = "INSERT INTO contenir values (".$val.",".$num.")";
							$cnx->exec($rep);
						}
					}
				}
				if (!$aumoinsune) {
					echo "<script type='text/javascript'>
					Swal.fire({
						type: 'error',
						title: 'Aucune playlist selectionnée',
						text: 'Merci de selectionner au moins une playlist.',
					});
					</script>";
				}
				else if($test)
				{
					echo "<script type='text/javascript'>
					Swal.fire({
						type: 'success',
						title: 'Musique Ajoutée',
						text: 'Votre musique a bien été ajoutée',
					});
					</script>";
				}
			}


			if (!empty($_POST['AjTag']) && empty($_SESSION['nom']))
			{
				echo "<script type='text/javascript'>
					Swal.fire({
						type: 'error',
						title: 'Vous n\'êtes pas connecté!',
						text: 'Vous devez être connecté pour ajouter un tag à la musique !',
					});
				</script>";
			}
			elseif(!empty($_POST['AjTag']))
			{
				$reponse = $_POST['numMusique'];
				$req = "Select * from tag";
				$req = $cnx->query($req);
				$donnee = $req->fetchall();
				$nblignes = count($donnee);
				if ($nblignes != 0) {
					echo "<script type='text/javascript'>
								Swal.fire({
								position: 'center',
								title: 'Choisir un tag',
								html:";
					echo "'<form action='+";
					echo "'\'".$_SERVER['PHP_SELF']."?id=".$reponse."\''+";
					echo "' method=\'post\'>'+";
					echo "'	<input type=\'hidden\' name=\'numMusique\' value=\'".$reponse."\' class=\'btn btn-primary\'></input>'+";
					echo "'<table class=\'table table-alert\'>'+";
					foreach ($donnee as $donnees)
					{
						echo "'<tr>'+";
						echo "'<td><div class=\'opt\'><input type=\"checkbox\" name=\"choixtag[]\"'+";
						echo "'value=\'".$donnees['numTag']."\'></td>'+";
						echo "'<td><label class=\'label-alert\'>".$donnees['nomTag']."</label></td>'+";
						echo "'</div>'+";
						echo "'</tr>'+";
					}
					echo "'</table>'+";
					echo "'<input type=\"submit\" name=\"Valider\" value=\"Valider\" class=\"btnopt btn btn-secondary btn-sm btn-block\">'+";
					echo "'</form>',";
					echo	"showConfirmButton: false })</script>";
					}
					else
					{
						echo "<script type='text/javascript'>
						Swal.fire({
							type: 'error',
							title: 'Aucun tag trouvés!',
							text: 'Demandez à un administrateur d'en ajouter.',
						})
						</script>";
					}
			}

			if (!empty($_POST['Valider']))
			{
				$aumoinsune = false;
				if (isset($_POST['choixtag'])) {
					$aumoinsune = true;
					foreach($_POST['choixtag'] as $val)
					{
						$num = $cnx->quote($_POST['numMusique']);
						$nums = $_POST['numMusique'];
						$rep = "INSERT INTO posseder values (".$num.",".$val.")";
						$cnx->exec($rep);
					}
				}
				if ($aumoinsune) {
					echo "<script>document.location.href='music.php?id=$nums' </script>";
				}
				else {
					echo "<script type='text/javascript'>
					Swal.fire({
						type: 'error',
						title: 'Aucun tag selectionné',
						text: 'Merci de selectionner au moins un tag.',
					});
					</script>";
				}
			}

			if (!empty($_POST['SupTag']) && empty($_SESSION['nom']))
			{
				echo "<script type='text/javascript'>
				Swal.fire({
			    type: 'error',
			    title: 'Vous n\'êtes pas connecté!',
			    text: 'Vous devez être connecté pour supprimer un tag à la musique.',
			  })
			  </script>";
			}
			elseif(!empty($_POST['SupTag']))
			{
				$reponse = $_POST['numMusique'];
				$req = "Select * from posseder p inner join tag t on p.numTag = t.numTag where numMusique = '".$reponse."'";
				$req = $cnx->query($req);
				$donnee = $req->fetchall();
				$nblignes = count($donnee);
				if ($nblignes != 0)
				{
					echo "<script type='text/javascript'>
								Swal.fire({
								position: 'center',
								title: 'Choisir un tag',
								html:";
					echo "'<form class=\'form-group\' action='+";
					echo "'\'".$_SERVER['PHP_SELF']."\''+";
					echo "' method=\'post\'>'+";
					echo "'	<input type=\'hidden\' name=\'numMusique\' value=\'".$reponse."\' class=\'btn btn-primary\'></input>'+";
					echo "'<table class=\'table table-alert\'>'+";
					foreach($donnee as $donnees)
					{
						echo "'<tr>'+";
						echo "'<td><div class=\'opt\'><input type=\"checkbox\" name=\"supptag[]\"'+";
						echo "'value=\'".$donnees['numTag']."\'></td>'+";
						echo "'<td><label class=\'label-alert\'>".$donnees['nomTag']."</label></td>'+";
						echo "'</div>'+";
						echo "'</tr>'+";
					}
					echo "'</table>'+";
					echo "'<input type=\"submit\" name=\"Supp\" value=\"Confirmer\" class=\"btnopt btn btn-secondary btn-sm btn-block\">'+";
					echo "'</form>',";
					echo	"showConfirmButton: false })</script>";
				}
				else {
						echo "<script type='text/javascript'>
						Swal.fire({
							type: 'error',
							title: 'Aucun tag a supprimer!',
							text: 'Ajoutez en un.',
						});
						</script>";
					}
				}

				if (!empty($_POST['Supp']))
				{
				$aumoinsunencore = false;
				if (isset($_POST['supptag'])) {
					foreach($_POST['supptag'] as $val)
					{
						$aumoinsunencore = true;
						$num = $cnx->quote($_POST['numMusique']);
						$nums = $_POST['numMusique'];
						$rep = "Delete from posseder where numMusique = ".$num." and numTag =".$val;
						$cnx->exec($rep);
					}
				}
				$nums = $_POST['numMusique'];
				if (!$aumoinsunencore) {
					echo "<script>document.location.href='music.php?id=$nums&error=true' </script>";
				}
				else {
					echo "<script>document.location.href='music.php?id=$nums' </script>";
				}
			}

			if (isset($_GET['error'])) {
				echo "<script type='text/javascript'>
				Swal.fire({
					type: 'error',
					title: 'Aucun tag selectionné!',
					text: 'Merci de selectionner un tag à supprimer.',
				})
				</script>";
			}

		?>

		<?php
			include_once '../includes/footer.php';
		?>

	</body>
</html>
