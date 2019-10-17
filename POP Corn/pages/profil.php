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
				echo "	<input type='submit' name='Valider' value='Valider' class='btt'>Nom de la playlist</input>";
				echo "<input type='text' name='nomPlay' value='' autocomplete='off' required minlength='2' maxlength='30'>";
				echo "</form>";
			}

			if (!empty($_POST['Valider']))
			{
				include_once(get_path('outils/connexpdo.inc.php'));
				$cnx=connexpdo('bdpopcorn','myparam');

				$nomPlay = "";
				$nomPlay = $cnx->quote($_POST['nomPlay']);

				$req = "Select * from utilisateur where pseudo ='".$_SESSION['nom']."'";
				$req = $cnx->query($req);
				while($donnees = $req->fetch(PDO::FETCH_ASSOC))
				{
					$req="Insert into playlist (numUser, nom) values (".$donnees['numUser'].",".$nomPlay." )";
					$cnx->exec($req);
				}


				$cnx=null;
			}

			include_once '../includes/footer.php';
		?>

	</body>
</html>
