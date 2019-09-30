<?php
function get_path($path)
{
	return dirname(__DIR__).'/'."$path";
}

	function get_relative_path($path)
	{
		return (basename($_SERVER['PHP_SELF']) === "index.php") ? "$path" : '../'."$path";
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
