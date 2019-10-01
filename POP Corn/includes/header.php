<?php
	include(dirname(__DIR__).'/outils/accesseurs.php');
?>

<header>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src=<?php echo get_path('scripts/spotify.js');?>></script>
	<script src=<?php echo get_path('scripts/openform.js');?>></script>

	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>POP Corn</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Site trop bien.">
	<meta name="keywords" content="voiture recherche modele">

	<link href=<?php echo get_path('css/style.css');?> rel="stylesheet" type="text/css">
	<link rel="icon" type="image/png" href=<?php echo get_path('images/logo.png');?> />
	<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico"/>
	<meta property="og:title" content="Home">
	<meta property="og:description" content="Meilleur site de l'univers.">
	<meta property="og:image" content="">
	<meta property="og:type" content="article">
	<div class="topheader">
		<img class=logo src=<?php echo get_path('images/logo.png');?> alt="Notre logo"\>
	</div>

	<nav>
		<ul>
			<?php
				echo "<li><a href=".get_path('index.php').">Accueil</a></li>";
			?>
			<li>
				<ul class="deroul">
					<li>
						<a href="">Tops</a>
						<ul>
							<?php
								echo "<li><a href=".get_path('pages/top2019.php').">Top 2019</a></li>";
                                echo "<li><a href=".get_path('pages/top2018.php').">Top 2018</a></li>";
							?>
						</ul>
					</li>
				</ul>
			</li>

			<div id="admin-button" class=admin>
				<button class="" onclick="openForm(id=2)">Inscription</button>
				<form id="inscription" class="connexadmin" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >
				<fieldset>
					<legend><b>Saisir vos identifiants</b></legend>
					<table>
						<tbody>
							<tr>
								<td> Utilisateur: </td>
								<td><input type="text" name="nom" size="10" required minlength="2" maxlength="30"/></td>
							</tr>
							<tr>
								<td> Mot de passe: </td>
								<td><input type="password" name="mdp" size="10" required minlength="2" maxlength="30"/></td>
							</tr>
							<tr>
								<td><input type="submit" value="inscription"/></td>
							</tr>
						</tbody>
					</table>
				</fieldset>
				</form>
			</div>

			<div id="admin-button" class=admin>
				<button class="" onclick="openForm()">Connexion</button>
				<form id="connexion" class="connexadmin" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >
				<fieldset>
					<legend><b>Saisir vos identifiants</b></legend>
					<table>
						<tbody>
							<tr>
								<td> Utilisateur: </td>
								<td><input type="text" name="user" size="10" required minlength="2" maxlength="30"/></td>
							</tr>
							<tr>
								<td> Mot de passe: </td>
								<td><input type="password" name="password" size="10" required minlength="2" maxlength="30"/></td>
							</tr>
							<tr>
								<td><input type="submit" value="connexion"/></td>
							</tr>
						</tbody>
					</table>
				</fieldset>
				</form>
			</div>

		</ul>
	</nav>
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
			$instance = new connect();

			$instance->funcconnection($val1, $val2);
			$val1 = "";
			$val2 = "";
		}

		if (!empty($_POST['inscription']))
		{
			$val1 = $_POST['nom'];
			$val2 = $_POST['mdp'];
			$instance = new inscript();

			$instance->funcinscription($val1, $val2);
			$val1 = "";
			$val2 = "";
		}
	}
?>
