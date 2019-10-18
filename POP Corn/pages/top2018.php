<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once ('../includes/header.php');

			include_once(get_path('outils/connexpdo.inc.php'));
			$cnx=connexpdo('bdpopcorn','myparam');


			//SELECT titre, duree, top, m.numMusique, nomTag
			//FROM musique m inner join album a on m.numAlbum = a.numAlbum
			//inner join posseder p on m.numMusique = p.numMusique
			//inner join tag t on p.numtag = t.numTag
			//where year(anneeAlbum) = 2019

			$req="	SELECT titre, duree, top, numMusique FROM musique m inner join album a on m.numAlbum = a.numAlbum
			where year(anneeAlbum) = 2018 order by top desc, titre";
			$req = $cnx->query($req);

			echo "<div class='bodyelement musictop'>";
			while($donnees = $req->fetch(PDO::FETCH_ASSOC))
			{
				$duree = gmdate("i:s", $donnees['duree']/1000);


				echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
				echo "	<input type='submit' name='Playlist' value='Ajouter à la playlist' class='btt'></input>";
				echo "<input type='text' name='top' value='".$donnees['top']."' size = '4' readonly>";
				echo "  ";
				echo '<a href='.get_path('pages/music.php?id='.$donnees['numMusique']).'>'.$donnees['titre'].'</a>';

				echo "  ";
				echo "<input type='text' name='duree' value='".$duree."' size='4' readonly>";

				echo "</form>";
			}
			echo "</div>";


			if (!empty($_POST['Playlist']) && empty($_SESSION['nom']))
			{
				echo "<script type='text/javascript'> alert('Vous devez vous connecter pour ajouter à votre playlist !')</script>";
			}
			elseif(!empty($_POST['Playlist']))
			{
				echo "c bon sa marche";
			}



			include_once ('../includes/footer.php');
		?>

	</body>
</html>
