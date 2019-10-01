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
			// echo "<script>console.log('$except')</script>";
			return false;
		}
	}
?>
