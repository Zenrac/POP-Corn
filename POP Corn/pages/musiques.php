<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once ('../includes/header.php');

			include_once(get_path('outils/connexpdo.inc.php'));
			$cnx=connexpdo('bdpopcorn');

			$req="	SELECT titre, duree, top, numMusique FROM musique m inner join album a on m.numAlbum = a.numAlbum order by titre";
			$req = $cnx->query($req);
			$donnee = $req->fetchall();
			$nblignes = count($donnee);
			if ($nblignes == 0) {
				echo "<h4>Cette liste de musique est vide! Demandez à un administrateur de la remplir!</h4>";
			}
			else {
				echo "<div class='bodyelement musictop'>";
				echo '<table class="table table-dark">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Nom</th>
										<th scope="col">Durée</th>
									</tr>
								</thead>
								<tbody>';
				foreach($donnee as $donnees)
				{
					$duree = gmdate("i:s", $donnees['duree']/1000);


					echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
					echo '<tr>';
					echo "<th scope='row'>	<input type='submit' name='Playlist' value='Ajouter à la playlist' class='btn btn-primary'></input></th>";
					echo "<input type='hidden' name='numMusique' value='".$donnees['numMusique']."' class='btn btn-primary'></input>";
					echo '<td><a href='.get_path('pages/music.php?id='.$donnees['numMusique']).'>'.$donnees['titre'].'</a></td>';
					echo "<td><span type='text' name='duree'>".$duree."</span></td>";
					echo '</tr>';
					echo "</form>";
				}
				echo '  </tbody>
							</table>';
				echo "</div>";
			}

			if (!empty($_POST['Playlist']) && empty($_SESSION['nom']))
			{
				echo "<script type='text/javascript'>
				Swal.fire({
			    type: 'error',
			    title: 'Vous n\'êtes pas connecté!',
			    text: 'Vous devez être connecté pour ajouter une musique à votre playlist.',
				});
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
				foreach($_POST['choixplaylist'] as $val)
				{
					$aumoinsune = true;
					$num = $cnx->quote($_POST['numMusique']);
					$rep = "select * from contenir where numPlaylist = ".$val." and numMusique = ".$num;
					echo $rep;
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

			include_once ('../includes/footer.php');
		?>

	</body>
</html>
