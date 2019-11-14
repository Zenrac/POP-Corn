<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once '../includes/header.php';
		?>
			<h1>Nous contacter</h1>
			<form class="formulaire" method="post">
				    <div>
				        <label for="name">Nom :</label>
				        <input type="text" id="name" name="name" required>
				    </div>

				    <div>
				        <label for="mail">e-mail :</label>
				        <input type="email" id="mail" name="email" required>
				    </div>

				    <div>
				        <label for="msg">Message :</label>
				        <textarea id="msg" name="message" required></textarea>
				    </div>

						<div class="button">
		        		<button type="submit">Envoyer le message</button>
		    		</div>
				</form>

				<?php
	    if(isset($_POST['message'])){
	        $entete  = 'MIME-Version: 1.0' . "\r\n";
	        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	        $entete .= 'From: ' . $_POST['email'] . "\r\n";

	        $message = '<h1>Message envoyé depuis la page Contact de monsite.fr</h1>
	        <p><b>Nom : </b>' . $_POST['nom'] . '<br>
	        <b>Email : </b>' . $_POST['email'] . '<br>
	        <b>Message : </b>' . $_POST['message'] . '</p>';

	        $retour = mail('laurentmartinez.sio@gmail.com', 'Envoi depuis page Contact', $message, $entete);
	        if($retour) {
	            echo '<p>Votre message a bien été envoyé.</p>';
	        }
	    }
	    ?>

		<?php
			include_once '../includes/footer.php';
		?>

	</body>
</html>
