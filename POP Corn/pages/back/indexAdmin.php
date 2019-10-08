<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once ('../../includes/header.php');
			$_SESSION['page'] = "INDEXAD";
			include '../../fonction/verificationback.php';

		?>

		<?php
			if (!isset($_POST['spotify'])) {
				echo "<button href='#' id='actualiserBDD' onclick='fillDataBase()'>Actualier BDD</button>";
				echo "<h3 id=spotifymsg></h3>";
			}
			else {
				include_once(get_path('outils/connexpdo.inc.php'));
				$cnx=connexpdo('bdpopcorn','myparam');
				$req = $cnx->exec($_POST['spotify']);
				echo $req;
				$cnx=null;
			}
		?>

		<?php
			include_once ('../../includes/footer.php');
		?>

	</body>
</html>
