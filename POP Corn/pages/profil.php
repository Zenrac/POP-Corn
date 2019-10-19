<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once '../includes/header.php';
			echo "Bonjour ".$_SESSION['nom'];


			echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
			echo "	<input type='submit' name='Playlist' value='Creer une playlist' class='btt'></input>";
			echo "<input type='hidden' name='numUser' value='#' readonly>";
			echo "</form>";

			if (!empty($_POST['Playlist']))
			{
				echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
				echo "	<input type='submit' name='Confirmer' value='Confirmer' class='btt'>Nom de la playlist</input><br />";
				echo "<input type='text' name='nomPlay' value='' autocomplete='off' required minlength='2' maxlength='30'>";
				echo "</form>";
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
					echo "<br />Voici vos playlist <br />";
					$req4 = "Select * from utilisateur u inner join playlist p on u.numUser = p.numUser where pseudo ='".$_SESSION['nom']."'
					order by nom";
					$req4 = $cnx->query($req4);
					while($donnees = $req4->fetch(PDO::FETCH_ASSOC))
					{
						echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
						echo "	<input type='submit' name='Modifier' value='Modifier' class='btt'></input>
										<input type='submit' name='Supprimer' value='Supprimer' class='btt'></input>
										<input type='submit' name='lecture' value='Voir playlist' class='btt'></input>";
						echo "<input type='hidden' name='numPlaylist' value='".$donnees['numPlaylist']."' readonly>";
						echo "<input type='text' name='nom' value='".$donnees['nom']."' size = '4' readonly>";
						echo "  ";
						echo "</form>";
					}
				}

				if (!empty($_POST['Modifier']))
				{
					echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
					echo "	<input type='submit' name='Valider' value='Valider' class='btt'></input>";
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
					$req="	Delete from playlist where numPlaylist = ".$playlist;
					$cnx->exec($req);

					echo "<script>
					location.assign(location.href);</script>";

					$cnx = null;
				}



				$cnx=null;
			include_once '../includes/footer.php';
		?>

	</body>
</html>
