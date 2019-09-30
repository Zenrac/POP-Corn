<<<<<<< HEAD
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

	function getRelativePath($path) {
			$separator_before_main_folder = 2;
			// Detect directory separator
			$base = $_SERVER['PHP_SELF'];
			$separator = substr($base, 0, 1);
			$separators = substr_count($base, $separator);
			$count = $separators - $separator_before_main_folder;
			$before = str_repeat('./', $count);
			return $path . $count;
	}

?>
=======
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
>>>>>>> 2fa58a65701d3db537e22f3e6e9a48352055d04e
