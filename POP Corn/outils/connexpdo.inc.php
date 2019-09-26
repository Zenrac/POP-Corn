<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<title>connexion pdo</title>
	<meta charset="UTF-8">
	<meta name="author" content= "Rémy">
	<meta name = "description" content= "connexion pdo">
	<meta name="viewport" content="width=device-width, initial-scal=1">

</head>

<body>
	
	<?php
function connexpdo($base,$param)
{
include_once($param.".inc.php");
$dsn="mysql:host=localhost;dbname=".$base.";charset=UTF8";
$user="root";
$pass="root";
try
{
$cnx = new PDO($dsn,$user,$pass);
return $cnx;
}
catch(PDOException $except)
{
die('Echec de la connexion'.$except->getMessage());
}
}
?>

	
</body>
</html>
