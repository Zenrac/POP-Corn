<!DOCTYPE html>
<html>
	<body>

		<?php
			include_once '../includes/header.php';
		?>
		<p class="firstText important" style="margin-bottom:0%;">Contact :</p>
		<p>07.81.75.57.93 / 06.33.72.12.44</p>
		<p class="AlaLigne">isabelle.geobiologie@gmail.com</p>

		<!-- Section: form gradient -->
<section class="form-gradient mb-5">
<?php echo "<form class='needs-validation' action='".$_SERVER['PHP_SELF']."' method='post'>"; ?>
  <!--Form with header-->
  <div class="card">

    <!--Header-->
    <div class="header blue-gradient">

      <div class="row d-flex justify-content-center">
        <h1 class="white-text mb-0 py-5 font-weight-bold">Contacter moi</h1>
      </div>

    </div>
    <!--Header-->

    <div class="card-body mx-4">

      <div class="md-form">
        <i class="fas fa-user prefix cyan-text" style="font-size:400%;"></i>
        <input type="text" id="form104" class='form-control' id='name' name='name' required minlength='2' maxlength='25' autocomplete='off' style="width:95%; font-size:250%; margin-left:5%;">
        <label for="form104" style="font-size:218%; margin-left:5%;">Votre nom</label>
      </div>

      <div class="md-form">
        <i class="fas fa-envelope prefix cyan-text" style="font-size:400%;"></i>
        <input type="email" id="form105" class="form-control" id='email' name='email' required minlength='2' maxlength='25' autocomplete='off' style="width:95%; font-size:250%; margin-left:5%;">
        <label for="form105" style="font-size:218%; margin-left:5%;">Votre mail</label>
      </div>

      <div class="md-form">
        <i class="fas fa-tag prefix cyan-text" style="font-size:400%;"></i>
        <input type="text" id="form106" class="form-control" name='sujet' required minlength='2' maxlength='25' autocomplete='off' style="width:95%; font-size:250%; margin-left:5%;">
        <label for="form106" style="font-size:218%; margin-left:5%;">Sujet</label>
      </div>

      <div class="md-form">
        <i class="fas fa-pencil-alt prefix cyan-text" style="font-size:400%;"></i>
        <textarea id="form107" class='md-textarea form-control' id='msg' name='message' rows='8' cols='50' required minlength='2' maxlength='1000' autocomplete='off' style="width:95%; font-size:250%; margin-left:5%;"></textarea>
        <label for="form107" style="font-size:218%; margin-left:5%;">Votre message</label>
      </div>

      <!--Grid row-->
      <div class="row d-flex align-items-center mb-3 mt-4">

        <!--Grid column-->
        <div class="col-md-12">
          <div class="text-center">
            <button type="submit" class="btn btn-blue btn-rounded z-depth-1a" style="font-size:250%;">Envoyer</button>
          </div>
        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->
    </div>

  </div>
  <!--/Form with header-->
</form>
</section>

				<?php
				if (!empty($_POST['name']))
				{
					$nom = addslashes($_POST['name']);
					$desc = addslashes($_POST['message']);
					$sujet = addslashes($_POST['sujet']);
					$email = addslashes($_POST['email']);

					include_once(get_path('fonction/mail.php'));
					envoieMailContact ($nom, $desc, $email, $sujet);
					echo "<script>location.assign(location.href);</script>";
				}

			include_once '../includes/footer.php';
		?>

	</body>
</html>
