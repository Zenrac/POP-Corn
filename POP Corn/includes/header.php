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

	<script src=<?php echo get_relative_path('scripts/spotify.js');?>></script>

	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>oCarnak</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Site trop bien.">
	<meta name="keywords" content="voiture recherche modele">

	<link href=<?php echo get_relative_path('css/style.css');?> rel="stylesheet" type="text/css">
	<link rel="icon" type="image/png" href=<?php echo get_relative_path('images/logo.png');?> />
	<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico"/>
	<meta property="og:title" content="Home">
	<meta property="og:description" content="Meilleur site de l'univers.">
	<meta property="og:image" content="">
	<meta property="og:type" content="article">
	<div class="topheader">
		<img class=logo src=<?php echo get_relative_path('images/logo.png');?> alt="Notre logo"\>
	</div>

	<nav>
		<ul>
			<?php
				echo "<li><a href=".get_relative_path('index.php').">Accueil</a></li>";
				echo "<li><a href=".get_page('requeteur.php').">Requeteur</a></li>";
				echo "<li><a href=".get_page('affichage.php').">Afficher</a></li>";
			?>
			<li>
				<ul class="deroul">
					<li>
						<a href="">Tops</a>
						<ul>
							<?php
								echo "<li><a href=".get_page('top2019.php').">Top 2019</a></li>";
                                echo "<li><a href=".get_page('top2018.php').">Top 2018</a></li>";
							?>
						</ul>
					</li>
				</ul>
			</li>
			<div id="admin-button" class=admin>
				<button class="" onclick="openForm()">Connexion</button>
				<form id="connexadmin" class="connexadmin" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >
				<fieldset>
					<legend><b>Saisir vos identifiants</b></legend>
					<table>
						<tbody>
							<tr>
								<td> Utilisateur : </td>
								<td><input type="text" name="user" size="10" required minlength="2" maxlength="30"/></td>
							</tr>
							<tr>
								<td> Mot de passe : </td>
								<td><input type="password" name="password" size="10" required minlength="2" maxlength="30"/></td>
							</tr>
							<tr>
								<td><input type="submit" value="Connexion"/></td>
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
include_once(get_relative_path('outils/connexpdo.inc.php'));
$cnx=connexpdo('bdpopcorn','myparam');
include_once(get_relative_path('fonction/connexion.php'));

if (!empty($_POST['user']))
{
	$val1 = $_POST['user'];
	$val2 = $_POST['password'];
	$_SESSION['user'] = $val1;
	$_SESSION['password'] = $val2;
	$instance = new connect();

	$instance->funcconnection($val1, $val2);
	$val1 = "";
	$val2 = "";
    echo"<script> alert('test2'); </script>";
}
?>
