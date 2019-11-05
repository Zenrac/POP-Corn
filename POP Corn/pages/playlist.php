<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once '../includes/header.php';
			echo '<div class="bodyelement">';
			if (isset($_GET['id']))
			{
				$req="	SELECT titre, duree,  m.numMusique FROM contenir c inner join musique m on c.numMusique = m.numMusique
				where numPlaylist =".$_GET['id']."  order by titre";
				$req = $cnx->query($req);
				echo '<h3>Votre playlist:</h3>';
				echo '<table class="table table-dark">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Name</th>
										<th scope="col">Durée</th>
									</tr>
								</thead>
								<tbody>';
				while($donnees = $req->fetch(PDO::FETCH_ASSOC))
				{
					$duree = gmdate("i:s", $donnees['duree']/1000);

					echo "<form action='".$_SERVER['PHP_SELF']."?id=".$_GET['id']."' method='post'>";
					echo '<tr>';
					echo "<th scope='row'><input type='submit' name='Supprimer' value='Supprimer' class='btnopt btn btn-secondary btn-sm'></input></th>";
					echo "<input type='hidden' name='id' value='".$_GET['id']."' class='btnopt btn btn-secondary btn-sm'></input>";
					echo "<input type='hidden' name='numMusique' value='".$donnees['numMusique']."' class='btnopt btn btn-secondary btn-sm'></input>";
					echo '<td><a href='.get_path('pages/music.php?id='.$donnees['numMusique']).'>'.$donnees['titre'].'</a></td>';
					echo "<td><span name='duree'>".$duree."</span></td>";
					echo "</form>";
				}
				echo '  </tbody>
							</table>';
				echo "</div>";
			}

			if (!empty($_POST['Supprimer']))
			{
				$numMusique = "";
				$id = "";
				$numMusique = $cnx->quote($_POST['numMusique']);
				$id = $cnx->quote($_POST['id']);
				$req="	Delete from contenir where numMusique = ".$numMusique. " and numPlaylist = ".$id;
				$cnx->exec($req);

				echo "<script> location.assign(location.href);</script>";

				$cnx = null;
			}
				echo '</div>';
        include_once '../includes/footer.php';
      ?>

    </body>
  </html>
