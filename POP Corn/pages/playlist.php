<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once '../includes/header.php';
			if (isset($_GET['id']))
			{
				$req="	SELECT titre, duree,  m.numMusique FROM contenir c inner join musique m on c.numMusique = m.numMusique
				where numPlaylist =".$_GET['id']."  order by titre";
				$req = $cnx->query($req);

				while($donnees = $req->fetch(PDO::FETCH_ASSOC))
				{
					$duree = gmdate("i:s", $donnees['duree']/1000);

					echo "<form action='".$_SERVER['PHP_SELF']."?id=".$_GET['id']."' method='post'>";
					echo "<input type='submit' name='Supprimer' value='Supprimer' class='btt'></input>";
					echo "	<input type='hidden' name='id' value='".$_GET['id']."' class='btt'></input>";
					echo "	<input type='hidden' name='numMusique' value='".$donnees['numMusique']."' class='btt'></input>";
					echo '<a href='.get_path('pages/music.php?id='.$donnees['numMusique']).'>'.$donnees['titre'].'</a>';
					echo "  ";
					echo "<input type='text' name='duree' value='".$duree."' size='4' readonly>";
					echo "</form>";
				}
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
        include_once '../includes/footer.php';
      ?>

    </body>
  </html>
