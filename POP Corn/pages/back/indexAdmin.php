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

				include_once(get_path('outils/connexpdo.inc.php'));
				$cnx=connexpdo('bdpopcorn','myparam');
				$req = "SELECT DISTINCT * from tag";
				$req = $cnx->query($req);

				$elems = $req->fetchAll();
				echo "<div class='tags'>";
				echo '<h3>URL optionnel</h3>';
				echo '<input type="url" name="url" id="optionalurl"
       placeholder="https://open.spotify.com/playlist/5sTHqyG2DAwmTCopHXHRdz"
       pattern="https://.*" size="30">';
				echo '<h3>Tags de bases optionnels:</h3>';
				foreach ($elems as $value) {
					echo '<input class="tagelement" type="checkbox" name='.$value['nomTag'].' id='.$value['numTag'].'>';
					echo '<label class="tagnames" for='.$value['nomTag'].'>'.$value['nomTag'].'</label>';
					echo '<br>';
				}
				echo "</div>";
			}
			else {
				include_once(get_path('outils/connexpdo.inc.php'));
				$cnx=connexpdo('bdpopcorn','myparam');
				// $all_insert = explode(');', $_POST['spotify']);
				// foreach ($all_insert as $insert) {
				// 	$full_insert = $insert + ');';
				// 	$req = $cnx->exec($full_insert);
				// };
				$req = $cnx->exec($_POST['spotify']);
				echo "<h3>Base de donnée mise à jour</h3>";
				$cnx=null;
			}
		?>

		<?php
			include_once ('../../includes/footer.php');
		?>

	</body>
</html>
