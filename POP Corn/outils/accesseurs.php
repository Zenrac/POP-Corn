<?php
	// function get_page($name)
	// {
	// 	return (basename($_SERVER['PHP_SELF']) === "index.php" && "$name" != "index.php") ? 'pages/'."$name" : "$name";
	// }

	function get_path($path)
	{
		// chemin de base
		$base = $_SERVER['PHP_SELF'];
		$separator = substr($base, 0, 1);

		$main_folder = explode('POP-Corn/POP Corn/', $_SERVER['PHP_SELF'], 2);
		$count = substr_count($main_folder[1], '/');

		if ($count > 0) {
			$before = str_repeat('../', $count);
		}
		else {
			$before = './';
		}
		return $before . $path;
	}
?>
