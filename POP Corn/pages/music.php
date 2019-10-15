<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once '../includes/header.php';
		?>
    <div class="imgmus">
        <img src="<?php echo get_path('images/couvessai.jpg');?>" alt="Image de l'album">
        <ul>
          <li>
            <?php
              echo "<p>Titre : </p><p class = lien> le lien du titre </p>";
            ?>
          </li>
          <li>
            <?php
              echo "<p>Durée : </p>";
            ?>
          </li>
          <li>
            <?php
              echo "<p>Artise : </p>";
            ?>
          </li>
          <li>
            <?php
              echo "<p>Album : </p>";
            ?>
          </li>
          <li>
            <?php
              echo "<p>Année : </p>";
            ?>
          </li>
        </ul>
    </div>

    <div class="des">


    </div>





		<?php
			include_once '../includes/footer.php';
		?>

	</body>
</html>
