<?php
include_once '../../includes/header.php';
$_SESSION['page'] = "INSCRIPTION";
include '../../fonction/verificationback.php';



?>
<div>
			<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post'>


				<fieldset>
					<legend><b>Inserer information</b></legend>
					<div>
						Pseudo :
						<!--Corps du formulaire contenant les différents composants -->
						<input type"text" name="nom">

						Mot de passe :
						<input type"text" name="mdp">
					</div>
					<div>
						<input type='submit' name='lieninsertion' value='Envoyer'/>
						<input type='reset' value='Effacer'/>
					</div>
				</fieldset>

			</form>
</div>



<?php
	include_once(get_path('outils/connexpdo.inc.php'));
	$cnx=connexpdo('bdpopcorn','myparam');
			if (!empty($_POST['lieninsertion']))
				{
					$nom = "";
					$mdp = "";
					$nom=$cnx->quote($_POST['nom']);
					$mdp=$cnx->quote($_POST['mdp']);


					if(($nom=="''" && $mdp=="''") || ($nom=="''" || $mdp=="''"))
					{
						echo "Vous n'avez pas tout écrit toute les informations !";
					}
					else
					{

						$req2="	SELECT * FROM utilisateur where $nom = pseudo;";
						//pas de guillemets si on applique la méthode quote aux variables

						$req2 = $cnx->query($req2);
						$cpt = 0;

						while($donnees = $req2->fetch(PDO::FETCH_ASSOC))
							{
								$cpt = 1;
							}


						if ($cpt == 1)
						{
							echo "Ce pseudo est déjà utilisé! Merci de saisir un autre pseudo.";
						}
						else
						{
							//Requête SQL
							$req="	INSERT INTO utilisateur (pseudo, mdpUser, Admin)
									VALUES ($nom, $mdp, 'Oui')";
							//pas de guillemets si on applique la méthode quote aux variables

							$cnx->exec($req);


								echo "<script type=\"text/javascript\">
									Swal.fire({
									  type: 'success',
									  title: 'Félicitation',
									  text: 'Vous êtes désormais enregistré!',
									});
								</script>";
								$cnx=null;
					}

					}

				}

?>


<?php
include_once '../../includes/footer.php';
?>
