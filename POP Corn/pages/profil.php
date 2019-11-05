<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once '../includes/header.php';
			echo "<div class='bodyelement'>";
			if (empty($_POST['Playlist'])) {
				echo "<div class='bonjour'>";
				echo "<h3>Bonjour ".$_SESSION['nom']."</h3>";
				echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
				echo "	<input type='submit' name='Playlist' value='Créer une playlist' class='btnopt btn btn-secondary btn-sm'></input>";
				echo "<input type='hidden' name='numUser' value='#' readonly>";
				echo "</form>";
				echo "</div>";
			}
			else
			{
				echo "<h3>Création d'une playlist</h3>";
				echo "<div class='creation'>";
				echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
				echo "	<input type='submit' name='Confirmer' value='Confirmer' class='btn btn-success btn-sm'> Nom de la playlist: </input>";
				echo "<input type='text' name='nomPlay' value='' autocomplete='off' required minlength='2' maxlength='30'>";
				echo "</form>";
				echo "</div>";
			}

			if (!empty($_POST['Confirmer']))
			{
				include_once(get_path('outils/connexpdo.inc.php'));
				$cnx=connexpdo('bdpopcorn','myparam');

				$nomPlay = "";
				$nomPlay = $cnx->quote($_POST['nomPlay']);

				$req2 = "Select * from utilisateur u inner join playlist p on u.numUser = p.numUser where pseudo ='".$_SESSION['nom']."'";
				$req2 = $cnx->query($req2);
				$lignes=$req2->fetchall();
				$nblignes = count($lignes);

					if($nblignes==5)
						{
							echo "<H1>Vous ne pouvez pas avoir plus de 5 playlists</H1>";
						}
						else
						{
							$req = "Select * from utilisateur where pseudo ='".$_SESSION['nom']."'";
							$req = $cnx->query($req);
							$elems = $req->fetchAll();
							$donnees = $elems[0];
								$req="Insert into playlist (numUser, nom) values (".$donnees['numUser'].",".$nomPlay." )";
								$cnx->exec($req);

						}

			}

			$req3 = "Select * from utilisateur u inner join playlist p on u.numUser = p.numUser where pseudo ='".$_SESSION['nom']."'";
			$req3 = $cnx->query($req3);
			$lignes=$req3->fetchall();
			$nblignes = count($lignes);
				if($nblignes>=1)
				{
					echo "<h3>Voici vos playlists</h3>";
					$req4 = "Select * from utilisateur u inner join playlist p on u.numUser = p.numUser where pseudo ='".$_SESSION['nom']."'
					order by nom";
					$req4 = $cnx->query($req4);
					echo '<table class="table table-dark">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Nom</th>
										</tr>
									</thead>
									<tbody>';
					while($donnees = $req4->fetch(PDO::FETCH_ASSOC))
					{
						echo "<div>";
						echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
						echo '<tr>';
						echo "<th scope='row'> <input type='submit' name='Modifier' value='Modifier' class='btnopt btn btn-secondary btn-sm'></input>
						<input type='submit' name='Supprimer' value='Supprimer' class='btnopt btn btn-secondary btn-sm'></input></th>";
						echo '<td><span class="playlistname"><a href='.get_path('pages/playlist.php?id='.$donnees['numPlaylist']).'>'.$donnees['nom'].'</a></span></td>';
						echo "<input type='hidden' name='numPlaylist' value='".$donnees['numPlaylist']."' readonly>";
						echo "<input type='hidden' name='nom' value='".$donnees['nom']."' size = '4' readonly>";
						echo '</tr>';
						echo "</form>";
						echo "</div>";
					}
					echo '  </tbody>
								</table>';
					echo "</div>";
				}

				if (!empty($_POST['Modifier']))
				{
					echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
					echo "	<input type='submit' class='btnopt btn btn-secondary btn-sm' name='Valider' value='Valider' class='btt'></input>";
					echo "<input type='hidden' name='numPlaylist' value='".$_POST['numPlaylist']."' readonly>";
					echo "<input type='text' name='name' value='".$_POST['nom']."' autocomplete='off' required minlength='2' maxlength='30'>";
					echo "</form>";
					  echo "<a href=".get_path('pages/profil.php').">Retour arrière</a>";
				}

				if (!empty($_POST['Valider']))
				{
					$nom = "";
					$playlist = "";
					$nom = $cnx->quote($_POST['name']);
					$playlist = $cnx->quote($_POST['numPlaylist']);

					$req = "SELECT * from playlist where nom = ".$nom ;

					$req=$cnx->query($req);
					$lignes=$req->fetchall();
					$nblignes = count($lignes);

					if($nblignes==1)
					{
						echo "Ce nom de playlist existe déjà";
					}
					else
					{
						include_once(get_path('outils/connexpdo.inc.php'));
						$cnx=connexpdo('bdpopcorn','myparam');

						$req2="	UPDATE playlist
								SET nom = ".$nom." WHERE numPlaylist =".$playlist;
						$cnx->exec($req2);

						echo "<script>
						location.assign(location.href);</script>";

						$cnx=null;
					}
				}


				if (!empty($_POST['Supprimer']))
				{
					$playlist = "";
					$playlist = $cnx->quote($_POST['numPlaylist']);
					$req2="	Delete from contenir where numPlaylist = ".$playlist;
					$cnx->exec($req2);
					$req="	Delete from playlist where numPlaylist = ".$playlist;
					$cnx->exec($req);

					echo "<script>
					location.assign(location.href);</script>";

					$cnx = null;
				}



				$cnx=null;
			echo "</div>";
			include_once '../includes/footer.php';
		?>

	</body>
</html>
