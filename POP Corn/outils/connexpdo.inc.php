<?php
	function getParams() {
		$user = "root";
		$pass = "";
		return array($user, $pass);
	}

	function connexpdo($base)
	{
		$params = getParams();
		$user = $params[0];
		$pass = $params[1];
		$dsn="mysql:host=localhost;dbname=".$base.";charset=UTF8";
		try
		{
			$cnx = new PDO($dsn,$user,$pass);
			return $cnx;
		}
		catch(PDOException $except)
		{
			// echo "<script>console.log('$except')</script>";
			return false;
		}
	}
?>
