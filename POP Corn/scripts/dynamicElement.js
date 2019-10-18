function openForm() {
  current = document.querySelector('.connexadmin#connexion')
  current.style.display = (current.style.display == "block") ? "none" : "block";
};

function setInscription() {
  // Inscription
  if (document.querySelector('#hiddeninput').value == '1') {
    document.querySelector('#admin-button button').textContent = 'Inscription';
    document.querySelector('#hiddeninput').value = '2';
    document.querySelector('#switchinscription').textContent = "J'ai déjà un compte.";
    document.querySelector('#connexionbutton').value = "S'inscrire";
    document.getElementById('txtverifmdp').style.display = 'block';
    document.getElementById('verifmdp').type = 'password';
  }
  // Connexion
  else {
    document.querySelector('#admin-button button').textContent = 'Connexion';
    document.querySelector('#hiddeninput').value = '1';
    document.querySelector('#switchinscription').textContent = "Je n'ai pas de compte.";
    document.querySelector('#connexionbutton').value = "Connexion";
    document.getElementById('txtverifmdp').style.display = 'none';
    document.getElementById('verifmdp').type = 'hidden';
  }
}

function hide_element(id) {
  document.getElementById(id).outerHTML = '';
}

jQuery(document).ready(function($) {
  /**
   * Met le footer en bas de la page
   */
  function footerAlwayInBottom(footerSelector) {
      var docHeight = $(window).height();
      var footerTop = footerSelector.position().top + footerSelector.height();
      if (footerTop < docHeight) {
          footerSelector.css("margin-top", (docHeight - footerTop) + "px");
      }
  };
  /**
   * Cache les resultats de l'autocompletion si il y a des changements de taille
   */
  function hideAutocompleteOnChanges() {
      var element = document.querySelector('.ui-menu');
      if (element != null) {
        element.style.display = 'none';
      }
  };
  /**
   * Cache les resultats de l'autocompletion si il y a des changements de taille
   */
  function responsiveConnexion() {
    $('#connexion').width($('#admin-button').width() - 50);
    // Je retire 50px parce qu'il y a un padding de 25px à droite et à gauche
  };

  // Quand la page charge
  footerAlwayInBottom($("#footer"));
  hideAutocompleteOnChanges();
  responsiveConnexion();
  // Quand la page change de taille
  $(window).resize(function() {
      footerAlwayInBottom($("#footer"));
      hideAutocompleteOnChanges();
      responsiveConnexion();
  });
});
