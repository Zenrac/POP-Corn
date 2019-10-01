<?php
include_once(get_path('outils/connexpdo.inc.php'));
$cnx=connexpdo('bdpopcorn','myparam');

class connect
{
	public function funcconnection ($nom, $mdp)
	{
		include_once(get_path('outils/connexpdo.inc.php'));
        $cnx=connexpdo('bdpopcorn','myparam');

			// verifie que l'utilisateur a bien mis la bonne combinaison nom/mot de passe
			$requete1 = "	SELECT pseudo FROM utilisateur
							WHERE pseudo = '".$nom."'
							AND mdpUser = '".$mdp."'
							 ;";

			$req=$cnx->query($requete1);
			$lignes=$req->fetchall();
			$nblignes = count($lignes);

				if($nblignes==0)
					{
						echo "<H1>Erreur de connexion</H1>";
					}
				else
				{
                    
                    $requete2 = "	SELECT Admin FROM utilisateur
							WHERE pseudo = '".$nom."'
							AND mdpUser = '".$mdp."'
							 ;";
                    
                        $_SESSION['user'] = $nom;
	                       $_SESSION['password'] = $mdp;
                    
                    
                    $req=$cnx->query($requete2);
                    
                    while($donnees = $req->fetch(PDO::FETCH_ASSOC))
						{
		    				if($donnees['Admin'] == "Oui")
                            {
                                //rediriger sur une autre page
                                header('Location: '.get_path('pages/back/indexAdmin.php'));
                                exit();
                            }
                            else
                            {
                               // a faire
                            }
						}

					
				}
					$cnx=null;
					$req ->closeCursor();
	}
}

?>