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
