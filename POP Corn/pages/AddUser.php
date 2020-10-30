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

			echo '<div class="corps" style="display: flex; flex-direction: column; align-items: center; width:100%;">';

      echo "<div class='container' style='margin-bottom: 2%;'><form class='formulaire needs-validation' action='".$_SERVER['PHP_SELF']."' method='post' style='margin:2% 8% 3% 8%;'>

              <div class='form-group'>
                <label for='msg' style='font-size:200%; text-decoration: underline;;'>Ajouter des élèves</label>
                <label for='msg' style='font-size:150%;'>Exemple de la syntaxe à suivre :</label>
                <label for='msg' style='font-size:150%;'>nom & prenom & mail & classe (1 ou 2) & *retour à la ligne pour l'élève suivant*</label>
                <textarea class='form-control' id='message' name='message' rows='40' cols='50' required minlength='2' maxlength='1000' autocomplete='off' style='height:84%; font-size:150%; background-color: #a4ccee; color:black !important;'>".@$_POST['message']."</textarea>
              </div>

              <button type='submit' class='btn btn-primary' style='font-size:150%;'>Ajouter les élèves</button>

            </form></div>";

      echo "</div>";


      if (!empty($_POST['message']))
    	{
    		$msg = addslashes($_POST['message']);
    		//$date = date("Y")."-".date("m")."-".date("d");

				$nbEleve  = substr_count($msg, "\n") + 1;

				for ($i = 1; $i <= $nbEleve; $i++)
				{
					$eleve = explode("\n", $msg);
					$element = explode(" &", $eleve[$i-1]);

					$nom = $element[0];
					$prenom = $element[1];
					$mail = $element[2];
					$classe = $element[3];

					$nom = mb_strtolower(trim($nom));
					$prenom = mb_strtolower(trim($prenom));
					$mail = trim($mail);
					$classe = trim($classe);

					$pseudo = substr($prenom, 0, 1);
					include_once(get_path('fonction/enleverAccent.php'));
					$pseudo = skip_accents($pseudo);
					$pseudo .= $nom;
					include_once(get_path('fonction/mdpAleatoire.php'));
					$mdp = randomPassword();

					$rep = 'INSERT INTO identifiant (pseudo, nom, prenom, mail, mdp, classe, admin) values ("'.$pseudo.'", "'.$nom.'", "'.$prenom.'", "'.$mail.'", "'.$mdp.'", "'.$classe.'", 0);';
					$cnx->exec($rep);
					$insertid = $cnx->lastInsertId();

					if ($insertid)
					{
						echo "<script type=\"text/javascript\">
						Swal.fire({
							type: 'success',
							title: 'Les élèves ont été enregistrés !'
						})
						</script>";
					}
					else
					{
						echo "<script type=\"text/javascript\">
						Swal.fire({
							type: 'error',
							title: 'Les élèves n'ont pas été enregistrés !'
						})
						</script>";
					}
				}
    	}



      include_once ('../../includes/footer.php');
    ?>

  </body>
</html>
