<?php
	include(dirname(__DIR__).'/outils/accesseurs.php');
	session_start();
?>

<header>
	<!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- JQuery UI -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" ></script>

	<!-- Axios -->
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

	<!-- Sweetalert2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@1/dark.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.js"></script>

	<!-- Full bootstrap -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- JQuery UI CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="Stylesheet"></link>

	<script src=<?php echo get_path('scripts/spotify.js');?>></script>
	<script src=<?php echo get_path('scripts/dynamicElement.js');?>></script>
	<script src=<?php echo get_path('scripts/canvas.js');?>></script>

	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>POP Corn</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Site trop bien.">
	<meta name="keywords" content="voiture recherche modele">

	<link href=<?php echo get_path('css/style.css');?> rel="stylesheet" type="text/css">
	<link rel="icon" type="image/png" href=<?php echo get_path('images/pop.png');?>>
	<link rel="shortcut icon" type="image/x-icon" href=<?php echo get_path('images/pop.png');?>>
	<meta property="og:title" content="Home">
	<meta property="og:description" content="Meilleur site de l'univers.">
	<meta property="og:image" content="">
	<meta property="og:type" content="article">
	<div class="topheader">
		<img class=logo src=<?php echo get_path('images/logo.png');?> alt="Notre logo"\>
	</div>

	<nav>
			<?php
				if (strpos($_SERVER['PHP_SELF'], "back") !== false) {
					include_once(get_path('includes/nav_back.php'));
				}
				else {
					include_once(get_path('includes/nav.php'));
				};
			?>
	</nav>
	<script>
		setCurrentPage()
	</script>
</header>

<!--Verifier connexion-->
<?php
	include_once(get_path('outils/connexpdo.inc.php'));
	$cnx = connexpdo('bdpopcorn','myparam');
	if ($cnx) {
		include_once(get_path('fonction/connexion.php'));
		include_once(get_path('fonction/inscriptionclient.php'));

		if (!empty($_POST['user']) && !empty($_POST['password']))
		{
			$val1 = $_POST['user'];
			$val2 = $_POST['password'];


			if ($_POST['type'] == 1)
			{
				$instance = new connect();
				$instance->funcconnection($val1, $val2);
			}

			else
			{
				if (!empty($_POST['passwordverif']))
				{
					$val3 = $_POST['passwordverif'];
					if ($val2 == $val3)
					{
						$instance = new inscript();
						$instance->funcinscription($val1, $val2);
					}
					else
					{
						echo "Vous n'avez pas enregistré le même mot de passe, réessayez!";
					}

				}
				else
				{
					echo "Erreur, vous n'avez pas vérifié le mot de passe!";
				}
			}

			$val1 = "";
			$val2 = "";

		}
	}
	else {
		$dsn = "mysql:host=localhost";
		$go = true;
		try {
    	$pdo = new PDO($dsn,"root","root");
		}
		catch(PDOException $except)
		{
			echo "<script>console.log(swal)</script>";
			echo "<script type='text/javascript'>
			Swal.fire({
				type: 'error',
				title: 'Impossible de créer la base de donnée.',
				text: 'La base de donnée BDPopCorn n\'a pas été trouvée, et il est impossible de la créer automatiquement. Merci de la créer manuellement.'
			});
			</script>";
			$go = false;
		}
		if ($go)
		{
			$pdo->query("CREATE DATABASE bdpopcorn;");
			$sql = file_get_contents(get_path('../BDD/base_bdpopcorn.sql'));
			$requests = explode(';', $sql);
			$db = new PDO("mysql:dbname=bdpopcorn;host=localhost", "root", "root" );
			foreach ($requests as $request) {
				try {
					$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
					// $req = $db->quote($request);
					if (!empty($request)) {
						$db->exec($request);
					}
				} catch(PDOException $e) {
				    // echo $e->getMessage();
				}
			}
			echo "<script>console.log(swal)</script>";
			echo "<script type='text/javascript'>
			Swal.fire({
				type: 'success',
				title: 'Base de donnée ajoutée.',
				text: 'La base de donnée BDPopCorn a été installée automatiquement.'
			});
			</script>";
		}
	}
?>
