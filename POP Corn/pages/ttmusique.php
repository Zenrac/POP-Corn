<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once ('../includes/header.php');

			include_once(get_path('outils/connexpdo.inc.php'));
			$cnx=connexpdo('bdpopcorn','myparam');

			$req="	SELECT titre, duree, top, numMusique FROM musique m inner join album a on m.numAlbum = a.numAlbum order by titre";
			$req = $cnx->query($req);

			echo "<div class='bodyelement musictop'>";
			while($donnees = $req->fetch(PDO::FETCH_ASSOC))
			{
				$duree = gmdate("i:s", $donnees['duree']/1000);


				echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
				echo "	<input type='submit' name='Playlist' value='Ajouter à la playlist' class='btt'></input>";
				echo "	<input type='hidden' name='numMusique' value='".$donnees['numMusique']."' class='btt'></input>";
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
					var_dump($rep);
					$cnx->exec($rep);
				}
			}

			include_once ('../includes/footer.php');
		?>

	</body>
</html>
