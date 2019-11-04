<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once ('../includes/header.php');

			include_once(get_path('outils/connexpdo.inc.php'));
			$cnx=connexpdo('bdpopcorn','myparam');

			$req="	SELECT titre, duree, top, numMusique FROM musique m inner join album a on m.numAlbum = a.numAlbum
			where year(anneeAlbum) = 2019 order by top, titre";
			$req = $cnx->query($req);

			echo "<div class='bodyelement musictop'>";
			echo '<table class="table table-dark">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Top</th>
									<th scope="col">Nom</th>
									<th scope="col">Durée</th>
								</tr>
							</thead>
							<tbody>';
			while($donnees = $req->fetch(PDO::FETCH_ASSOC))
			{
				$duree = gmdate("i:s", $donnees['duree']/1000);

				echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
				echo '<tr>';
				echo "<th scope='row'>	<input type='submit' name='Playlist' value='Ajouter à la playlist' class='btn btn-primary'></input></th>";
				echo "<input type='hidden' name='numMusique' value='".$donnees['numMusique']."' class='btn btn-primary'></input>";
				echo "<td><span name='top'>".$donnees['top']."</span></td>";
				echo '<td><a href='.get_path('pages/music.php?id='.$donnees['numMusique']).'>'.$donnees['titre'].'</a></td>';
				echo "<td><span type='text' name='duree'>".$duree."</span></td>";
				echo '</tr>';
				echo "</form>";
			}
			echo '  </tbody>
						</table>';
			echo "</div>";


			if (!empty($_POST['Playlist']) && empty($_SESSION['nom']))
			{
				echo "<script type='text/javascript'>
				Swal.fire({
			    type: 'error',
			    title: 'Vous n\'êtes pas connecté!',
			    text: 'Vous devez être connecté pour ajouter une musique à votre playlist.',
			  })
			  </script>";
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
				echo "'	<input type=\'hidden\' name=\'numMusique\' value=\'".$reponse."\' class=\'btn btn-primary\'></input>'+";
				while($donnees = $req->fetch(PDO::FETCH_ASSOC))
				{
						echo "'<div><input type=\"checkbox\" name=\"choixplaylist[]\"'+";
						echo "' value=\'".$donnees['numPlaylist']."\'>'+";
						echo "'".$donnees['nom']."'+";
						echo "'</div>'+";
				}
				echo "'<input type=\"submit\" name=\"Confirmer\" value=\"Confirmer\" class=\"btn btn-primary\">'+";
				echo "'</form>',";
				echo	"showConfirmButton: false })</script>";
			}

			if (!empty($_POST['Confirmer']))
			{

				foreach($_POST['choixplaylist'] as $val)
				{
					$num = $cnx->quote($_POST['numMusique']);
					$rep = "INSERT INTO contenir values (".$val.",".$num.")";
					var_dump($rep);
					$cnx->exec($rep);
				}
			}
			include_once ('../includes/footer.php');
		?>

	</body>
</html>
