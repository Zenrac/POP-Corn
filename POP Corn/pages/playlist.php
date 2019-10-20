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

					echo '<a href='.get_path('pages/music.php?id='.$donnees['numMusique']).'>'.$donnees['titre'].'</a>';
					echo "  ";
					echo "<input type='text' name='duree' value='".$duree."' size='4' readonly>";
				}
			}
        include_once '../includes/footer.php';
      ?>

    </body>
  </html>
