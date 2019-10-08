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
						$cpt = 0;

						while($donnees = $req2->fetch(PDO::FETCH_ASSOC))
							{
								$cpt = 1;
							}


						if ($cpt == 1)
						{
							echo "Le pseudo est déjà utilisé, chercher un autre pseudo";
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
								alert('Vous êtes enregistré')</script>";

								$_SESSION['nom'] = $nom;

								$cnx=null;
								header('Location: '.get_path('pages/profil.php'));
								exit();
					}
			}
	}

?>
