<?php
	function get_page($name)
	{
		return (basename($_SERVER['PHP_SELF']) === "index.php" && "$name" != "index.php") ? 'pages/'."$name" : "$name";
	}

	function get_relative_path($path)
	{
		$separator_before_main_folder = 2;
		$base = $_SERVER['PHP_SELF'];
		$separator = substr($base, 0, 1);
		$separators = substr_count($base, $separator);
		$count = $separators - $separator_before_main_folder;
		$before = str_repeat('./', $count);
		return $before . $path;
	}

	function get_path($path)
	{
		return dirname(__DIR__).'/'."$path";
	}

?>
