<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once '../includes/header.php';
			include_once(get_path('outils/connexpdo.inc.php'));
			// bdd : id12758739_bdgeo
			$cnx=connexpdo('id12758739_bdgeo','myparam');
			date_default_timezone_set('Europe/Paris');


			$req="SELECT * FROM temoignage order by date desc";
			$req = $cnx->query($req);

			echo "<div id='tableauTemoignage'>";
			while($donnees = $req->fetch(PDO::FETCH_ASSOC))
			{
				echo "<div class='tableauTemoignageEnTete'>";
        echo "<div class='tableauTemoignageDate'>".$donnees['date']."</div>";
        echo "<div class='tableauTemoignageNom'>".$donnees['nom']."</div>";
				echo "</div>";
        echo "<div class='tableauTemoignagePhrase'>".$donnees['phrase']."</div>";
        echo "<div class='tableauTemoignageFin'></div>";
			}
			echo "</div>";

			echo "<div class='container'><form class='formulaire needs-validation' action='".$_SERVER['PHP_SELF']."' method='post' style='margin:2% 8% 3% 8%;'>

							<div class='form-group'>
								<label for='name' style='font-size:150%;'>Nom</label>
								<input type='text' class='form-control' id='name' name='name' required minlength='2' maxlength='25' autocomplete='off'>
							</div>

							<div class='form-group'>
								<label for='msg' style='font-size:150%;'>Message</label>
								<textarea class='form-control' id='msg' name='message' rows='8' cols='50' required minlength='2' maxlength='1000' autocomplete='off'></textarea>
							</div>

							<button type='submit' class='btn btn-primary' style='font-size:150%;'>Envoyer le message</button>

						</form></div>";


	if (!empty($_POST['name']))
	{
		$nom = addslashes($_POST['name']);
		$desc = addslashes($_POST['message']);
		$date = date("Y")."-".date("m")."-".date("d");

		include_once(get_path('fonction/remove-emoji.php'));

    $desc = remove_emoji($desc);

		$rep = 'INSERT INTO temoignage (nom, phrase, date) values ("'.$nom.'","'.$desc.'", "'.$date.'")';

		$cnx->exec($rep);

		$rep2 = 'SELECT nom FROM temoignage where nom = "'.$nom.'" AND date = "'.$date.'"';
		$req2 = $cnx->query($rep2);

		$elems = $req2->fetchAll();
		$nblignes = count($elems);

		if ($nblignes == 0)
		{
			echo "<script type='text/javascript'>
			Swal.fire({
				type: 'error',
				title: 'Erreur',
				text: 'Le message n\'est pas parvenue !',
			})
			</script>";
		}
		else
		{
			include_once(get_path('fonction/mail.php'));
			envoieMail($nom, $desc);
			echo "<script>location.assign(location.href);</script>";
		}

	}

			include_once '../includes/footer.php';
		?>

	</body>
</html>
