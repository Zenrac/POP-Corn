<!DOCTYPE html>
<html>
	<body>


		<?php
			include_once './includes/header.php';

			//fonction de deconnexion pour le salarie
			if (isset($_GET['deconnexion']))
			{
				// On écrase le tableau de session
				$_SESSION = array();

				// Puis on la détruit la session donc le numéro unique de session
				session_destroy();

				unset($_SESSION);

				unset($_COOKIE);

				header("Cache-Control: no-store, no-cache, must-revalidate");
				header("Location:index.php");


				exit;
			}
		?>

		<?php
			include_once './includes/footer.php';
		?>

	</body>
</html>
