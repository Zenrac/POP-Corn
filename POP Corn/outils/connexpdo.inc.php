<?php
	function connexpdo($base,$param,$user=NULL,$pass=NULL)
	{
		include_once($param.".inc.php");
		$dsn="mysql:host=".HOST.";dbname=".$base.";charset=UTF8";
		$user=USER;
		if (is_null($pass)) {
			$pass=PASS;
		}
		if (is_null($user)) {
			$user=USER;
		}
		try
		{
			$cnx = new PDO($dsn,$user,$pass);
			return $cnx;
		}
			catch(PDOException $except)
		{
			return 'Echec de la connexion !';
		}
	}
?>
