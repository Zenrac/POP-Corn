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

				$client_id = '37f040251306463aa43d272d61d68526';
				$client_secret = 'd0df61c03b394843939d462426bcbc6a';

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,            'https://accounts.spotify.com/api/token' );
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($ch, CURLOPT_POST,           1 );
				curl_setopt($ch, CURLOPT_POSTFIELDS,     'grant_type=client_credentials' );
				curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret)));

				$result=curl_exec($ch);
				if(curl_errno($ch))
				    echo 'Curl error: '.curl_error($ch);
				curl_close ($ch);
				$result = explode('",', explode('access_token":"', $result)[1])[0];
				echo "<script>setVariables('" . $result . "')</script>";
				echo "<button href='#' id='actualiserBDD' onclick='fillDataBase()'>Actualier BDD</button>";
				echo "<h3 id=spotifymsg></h3>";
			}
			else {
				include_once(get_path('outils/connexpdo.inc.php'));
				$cnx=connexpdo('bdpopcorn','myparam');
				$req = $cnx->exec($_POST['spotify']);
				echo "<h3>Base de donnée mise à jour</h3>";
				echo $req;

				$cnx=null;
			}
		?>

		<?php
			include_once ('../../includes/footer.php');
		?>

	</body>
</html>
