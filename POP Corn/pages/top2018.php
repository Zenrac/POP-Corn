<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once '../includes/header.php';
		?>
		<script>fillDataBase();</script>
		<?php
			$body = json_decode(file_get_contents("php://input"), true);
			print_r($body);
		?>
		<?php
			include_once '../includes/footer.php';
		?>

	</body>
</html>
