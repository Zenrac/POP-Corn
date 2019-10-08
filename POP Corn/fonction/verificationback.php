<?php

// cette fonction permet de verifier si l'utilisateur est bien connecté à la base de données

error_reporting(E_ALL);
ini_set("display_errors", 1);
set_exception_handler('my_exception_handler');

function my_exception_handler($e) {
  // do some erorr handling here, such as logging, emailing errors
  // to the webmaster, showing the user an error page etc
  echo "<script type='text/javascript'> alert('Vous devez vous reconnecter !')</script>";
}

  if (!isset($_SESSION['nom']) && !isset($_SESSION['motdepasse']))
  {
      throw new Exception();
  }

  if ($_SESSION['page'] != "")
  {
    try
    {
      include_once(get_path('outils/connexpdo.inc.php'));
      $cnx=connexpdo('bdoccasion','myparam');
    }
    catch (Exception $e)
    {
    }
  }
