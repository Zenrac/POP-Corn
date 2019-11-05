<?php
	include_once(get_path('outils/connexpdo.inc.php'));
	$cnx=connexpdo('bdpopcorn','myparam');

	class inscript
	{
		public function funcinscription ($nom, $mdp)
		{
			include_once(get_path('outils/connexpdo.inc.php'));
					$cnx=connexpdo('bdpopcorn','myparam');


						$req2="	SELECT * FROM utilisateur where '".$nom."' = pseudo;";
						//pas de guillemets si on applique la méthode quote aux variables

						$req2 = $cnx->query($req2);

						$elems = $req2->fetchAll();
						$cpt = count($elems);

						if ($cpt != 0)
						{
							echo "<script type=\"text/javascript\">
							Swal.fire({
							  type: 'error',
							  title: 'Ce pseudo existe déjà!',
							  text: 'Merci de saisir un autre pseudo.',
							})
							</script>";
						}
						else
						{

							$nom = "'".$nom."'";
							$mdp = "'".$mdp."'";
							//Requête SQL
							$req="	INSERT INTO utilisateur (pseudo, mdpUser, Admin)
									VALUES ($nom, $mdp, 'Non')";
							//pas de guillemets si on applique la méthode quote aux variables
							$cnx->exec($req);


								echo "<script type=\"text/javascript\">
								Swal.fire({
									type: 'success',
									title: 'Félicitation',
									text: 'Vous êtes désormais enregistré!',
								});
								</script>";

								$_SESSION['nom'] = $nom;

								$cnx=null;
								echo "<script>document.location.href='".get_path('pages/profil.php')."'</script>";
								exit();
					}
			}
	}

?>
