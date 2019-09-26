<?php
include_once('connexpdo.inc.php');
$cnx=connexpdo('bdoccasion','myparam');

class connect
{
	public function funcconnection ($nom, $mdp)
	{
		include_once('connexpdo.inc.php');
		$cnx=connexpdo('bdpopcorn','myparam');

			// verifie que l'utilisateur a bien mis la bonne combinaison nom/mot de passe
			$requete1 = "	SELECT * FROM utilisateur
							WHERE pseudo = '".$nom."'
							AND motdepasse = '".$mdp."'
							 ;";

			$req=$cnx->query($requete1);
			$lignes=$req->fetchall();
			$nblignes = count($lignes);

				if($nblignes==0)
					{
						echo "<p>Erreur de connexion</p>";
					}
				else
				{
					//rediriger sur une autre page
					  header('Location: '.get_page('indexAdmin.php'));
  					exit();
				}
					$cnx=null;
					$req ->closeCursor();
	}
}

?>
