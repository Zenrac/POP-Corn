<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once ('../../includes/header.php');
			$_SESSION['page'] = "INDEXAD";
			include '../../fonction/verificationback.php';
			include_once(get_path('outils/connexpdo.inc.php'));
			$cnx=connexpdo('bdpopcorn','myparam');
			echo '<div class="bodyelement">';
		?>
	<div class="tab">
		<?php
			$req="	SELECT * FROM utilisateur";
			$req = $cnx->query($req);
			echo '<table class="table table-dark">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">ID</th>
									<th scope="col">Mot de passe</th>
									<th scope="col">Admin</th>
								</tr>
							</thead>
							<tbody>';
			while($donnees = $req->fetch(PDO::FETCH_ASSOC))
			{
				echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
				echo '<tr>';
				echo "<th scope='row'><input type='submit' name='Modifier' value='Modifier' class='btnopt btn btn-secondary btn-sm'></input>
								<input type='submit' name='Supprimer' value='Supprimer' class='btnopt btn btn-secondary btn-sm'></input></th>";
				echo "<td><input type='text' name='numUser' value='".$donnees['numUser']."' readonly></td>";
				echo "<td><input type='text' name='pseudo' value='".$donnees['pseudo']."' readonly></td>";
				echo "<td><input type='text' name='mdpUser' value='".$donnees['mdpUser']."' readonly></td>";
				echo "<td><input type='text' name='Admin' value='".$donnees['Admin']."' readonly></td>";
				echo "</form>";
			}
			echo '  </tbody>
						</table>';
			echo "</div>";
			if (!empty($_POST['Modifier']))
			{
				echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
				echo "	<input type='submit' name='Valider' value='Valider'  class='btnopt btn btn-secondary btn-sm'></input>";
				echo "<input type='text' name='numUser' value='".$_POST['numUser']."' readonly>";
				echo "  ";
				echo "<input type='text' name='pseudo' value='".$_POST['pseudo']."' autocomplete='off' required minlength='2' maxlength='30'>";
				echo "  ";
				echo "<input type='text' name='mdpUser' value='".$_POST['mdpUser']."' autocomplete='off' required minlength='2' maxlength='30'>";
				echo "  ";
				echo "<input type='text' name='Admin' value='".$_POST['Admin']."' autocomplete='off' required minlength='2' maxlength='30'>";
				echo "</form>";
				  echo "<a href=".get_path('pages/back/gestionUser.php').">Retour arrière</a>";
			}
			if (!empty($_POST['Valider']))
			{
				$numUser = "";
				$pseudo = "";
				$mdpUser = "";
				$Admin = "";
				$numUser = $cnx->quote($_POST['numUser']);
				$pseudo = $cnx->quote($_POST['pseudo']);
				$mdpUser = $cnx->quote($_POST['mdpUser']);
				$Admin = $cnx->quote($_POST['Admin']);
				$req = "SELECT * from utilisateur where pseudo = ".$pseudo;
				$req=$cnx->query($req);
				$lignes=$req->fetchall();
				$nblignes = count($lignes);
				if($nblignes==1)
				{
					echo "Ce pseudo existe déjà";
				}
				else
				{
					include_once(get_path('outils/connexpdo.inc.php'));
					$cnx=connexpdo('bdpopcorn','myparam');
					$req2="	UPDATE utilisateur
							SET pseudo = ".$pseudo.", mdpUser = ".$mdpUser.", Admin = ".$Admin."
							WHERE numUser =".$numUser;
					$cnx->exec($req2);
					echo "<script>
					location.assign(location.href);</script>";
					$cnx=null;
				}
			}
			if (!empty($_POST['Supprimer']))
			{
				$numUser = "";
				$numUser = $cnx->quote($_POST['numUser']);
				$req="	Delete from utilisateur where numUser = ".$numUser;
				$cnx->exec($req);
				echo "<script>
				location.assign(location.href);</script>";
				$cnx = null;
			}
		?>
	</div>
		<?php
			include_once ('../../includes/footer.php');
		?>

	</body>
</html>
