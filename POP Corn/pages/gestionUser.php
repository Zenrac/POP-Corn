<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once ('../../includes/header.php');
			include_once(get_path('outils/connexpdo.inc.php'));
			$cnx=connexpdo('bdsam','myparam');
			if (empty($_SESSION["newsession"]) || $_SESSION["newsession"] != 2)
			{
				echo "<style>.corps {visibility: hidden; width:0% !important;}</style>";
				include_once(get_path('pages/connexion.php'));

				echo "<script type='text/javascript'>
						Swal.fire({
							type: 'error',
							title: 'Erreur',
							text: 'Vous n'êtes pas connecté avec un compte administrateur !',
						})
						</script>";
			}

			echo '<div class="bodyelement">';
			echo '<div class="corps" style="display: flex; flex-direction: column; align-items: center; width:100%;">';

			$req="	SELECT id, pseudo, nom, prenom, mail, mdp, classe FROM identifiant where admin = 0 and classe != 0 order by classe, nom, prenom";
			$req = $cnx->query($req);
			echo '<table class="table table-dark">
							<thead>
								<tr>
									<th scope="col" style="font-size:175%;">#</th>
									<th scope="col" style="font-size:175%;">Pseudo</th>
									<th scope="col" style="font-size:175%;">Nom</th>
									<th scope="col" style="font-size:175%;">Prenom</th>
									<th scope="col" style="font-size:175%;">Mail</th>
									<th scope="col" style="font-size:175%;">Mot de passe</th>
									<th scope="col" style="font-size:175%;">Classe</th>
								</tr>
							</thead>
							<tbody>';
			while($donnees = $req->fetch(PDO::FETCH_ASSOC))
			{

				echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
				echo '<tr>';
				echo "<th scope='row' style=' display:flex; justify-content: center; border-top: 0px;'><button class='btgestion' type='submit' name='Modifier' value='Modifier' class='btnopt btn btn-secondary btn-sm' style='padding:5px 10px; font-size: 140%; border-radius: 4px; margin:2%;'>Modifier</button>
								<button class='btgestion' type='submit' name='Supprimer' value='Supprimer' class='btnopt btn btn-secondary btn-sm' style='padding:5px 10px; font-size: 140%; border-radius: 4px; margin:2%;'>Supprimer</button></th>";
				echo "<td><input class='inputGestion' type='text' name='pseudo' value='".$donnees['pseudo']."' readonly></td>";
				echo "<td><input class='inputGestion' type='text' name='nom' value='".$donnees['nom']."' readonly></td>";
				echo "<td><input class='inputGestion' type='text' name='prenom' value='".$donnees['prenom']."' readonly></td>";
				echo "<td><input class='inputGestion' type='text' name='mail' value='".$donnees['mail']."' readonly></td>";
				echo "<td><input class='inputGestion' type='text' name='mdp' value='".$donnees['mdp']."' readonly></td>";
				echo "<td><input class='inputGestion' type='text' name='classe' value='".$donnees['classe']."' readonly><input type='hidden' name='id' value='".$donnees['id']."'readonly></td>";
				echo "</tr></form>";
			}
			echo '  </tbody>
						</table>';
			echo "</div>";

			if (!empty($_POST['Modifier']))
			{
				echo "<form action='".$_SERVER['PHP_SELF']."' method='post' style='font-size: 140%; display:flex; justify-content: center;'>";
				echo "<button class='btgestion' type='submit' name='Valider' value='Valider'  class='btnopt btn btn-secondary btn-sm' style='font-size: 160%; display: flex; justify-content: center; border-radius: 4px; width:44%;'>Valider</button>";
				echo "<input class='inputGestion inputGestionModifier' style='border:1px solid;' type='text' name='pseudo' value='".$_POST['pseudo']."' autocomplete='off' required minlength='2' maxlength='30'>";
				echo "  ";
				echo "<input class='inputGestion inputGestionModifier' style='border:1px solid;' type='text' name='nom' value='".$_POST['nom']."' autocomplete='off'>";
				echo "  ";
				echo "<input class='inputGestion inputGestionModifier' style='border:1px solid;' type='text' name='prenom' value='".$_POST['prenom']."' autocomplete='off'>";
				echo "  ";
				echo "<input class='inputGestion inputGestionModifier' style='border:1px solid;' type='text' name='mail' value='".$_POST['mail']."' autocomplete='off'>";
				echo "  ";
				echo "<input class='inputGestion inputGestionModifier' style='border:1px solid;' type='text' name='mdp' value='".$_POST['mdp']."' autocomplete='off'>";
				echo "  ";
				echo "<input class='inputGestion inputGestionModifier' style='border:1px solid;' type='text' name='classe' value='".$_POST['classe']."' autocomplete='off'>";
				echo "<input type='hidden' name='id' value='".$_POST['id']."' readonly>";
				echo "</form>";
				  echo "<a href=".get_path('pages/back/gestionUser.php')." style='font-size:200%;'>Retour arrière</a>";
			}
			if (!empty($_POST['Valider']))
			{
				$pseudo = "";
				$nom = "";
				$prenom = "";
				$mail = "";
				$mdp = "";
				$classe = "";
				$id = "";

				$pseudo = $cnx->quote($_POST['pseudo']);
				$nom = $cnx->quote($_POST['nom']);
				$prenom = $cnx->quote($_POST['prenom']);
				$mail = $cnx->quote($_POST['mail']);
				$mdp = $cnx->quote($_POST['mdp']);
				$classe = $cnx->quote($_POST['classe']);
				$id = $cnx->quote($_POST['id']);

				include_once(get_path('outils/connexpdo.inc.php'));
				$cnx=connexpdo('bdsam','myparam');
				$req="	UPDATE identifiant
								SET pseudo = ".$pseudo.", nom = ".$nom.", prenom = ".$prenom.", mail = ".$mail.", mdp = ".$mdp.", classe=".$classe." WHERE id =".$id;
				$cnx->exec($req);
				echo "<script>
				location.assign(location.href);</script>";
				$cnx=null;

			}
			if (!empty($_POST['Supprimer']))
			{
				$id = "";
				$id = $cnx->quote($_POST['id']);
				$req="	Delete from identifiant where id = ".$id;
				$cnx->exec($req);
				echo "<script>
				location.assign(location.href);</script>";
				$cnx = null;
			}
			echo "</div>";
			include_once ('../../includes/footer.php');
		?>

	</body>
</html>
