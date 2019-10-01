function openForm(id = 1) {
  if (id != 1) {
    current = document.querySelector('.connexadmin#inscription')
    current.style.display = (current.style.display == "block") ? "none" : "block";
  }
  else {
    current = document.querySelector('.connexadmin#connexion')
    current.style.display = (current.style.display == "block") ? "none" : "block";
  }
};

function setInscription() {
  if (document.querySelector('#hiddeninput').value == '1') {
    document.querySelector('#admin-button button').textContent = 'Inscription';
    document.querySelector('#hiddeninput').value = '2';
    document.querySelector('#switchinscription').textContent = "J'ai déjà un compte."
  }
  else {
    document.querySelector('#admin-button button').textContent = 'Connexion';
    document.querySelector('#hiddeninput').value = '1';
    document.querySelector('#switchinscription').textContent = "Je n'ai pas de compte."
  }
}
