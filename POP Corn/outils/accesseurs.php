<?php
	function get_page($name)
	{
		return (basename($_SERVER['PHP_SELF']) === "index.php" && "$name" != "index.php") ? 'pages/'."$name" : "$name";
	}

	function get_relative_path($path)
	{
		return (basename($_SERVER['PHP_SELF']) === "index.php") ? "$path" : '../'."$path";
	}

	function get_path($path)
	{
		return dirname(__DIR__).'/'."$path";
	}
?>
