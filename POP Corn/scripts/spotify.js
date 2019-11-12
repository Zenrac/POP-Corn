// Définition de toutes les constantes.
const api_url_playlists = "https://api.spotify.com/v1/playlists/";
const top_2019 = "0cYxgXN7MoBWTfVhv1D69A";
const top_2018 = "3pFAbyXA2ALOe79w3oIbaa";
const top_all = "3ZgmfR6lsnCwdffZUan8EA";

// Initialisation de la variable token.
var token = "";

/**
 * Permet de récupérer une valeur et la placer dans la variable token.
 * @param  {String} newtoken La chaine de caractère à placer dans token.
 */
function setVariables(newtoken) {
  token = newtoken;
}

/**
 * Permet de récupérer ou non un url dans l'input optionalurl.
 * @return {Boolean|String} La valeur à récuperer s'il en a une, sinon False.
 */
function getOptionalParameters() {
  url = document.getElementById('optionalurl');
  if (url != null && url.value != "") {
    return url.value;
  }
  return false;
}

/**
 * Permet de récupérer les ID des tags checked de toutes les checkboxs et les retourner.
 * @return {Array} Une liste de tous les ID des tags cochés des checkboxs.
 */
function getOptionalTags() {
  results = document.querySelectorAll('input.tagelement')
  checked_box = [];
  results.forEach((box) => {
    if (box.checked) {
      checked_box.push(box.id);
    }
  });
  return checked_box;
}

/**
 * Permet de préparer la requête à executer et appelle la fonction axiosRequest.
 * @return {String} La requête à executer.
 */
function fillDataBase() {

  set_spotify_msg('Chargement en cours...');

  var optional = getOptionalParameters();
  if (optional && optional.includes('spotify')) {
    splited = optional.split('/');
    optional = splited[splited.length - 1];
  }
  var url = api_url_playlists + (optional ? optional : top_2019) + "/tracks";
  let get_config = {
    headers: {
      'Content-Type': 'application/json',
      authorization: 'Bearer ' + token
    }
  }
  return axiosRequest(url, get_config);
}

/**
 * Permet d'envoyer une requête asyncrone et appelle la fonction axiosRequest.
 * @param  {String} url    Une chaîne de caractère qui contient l'url de la requête.
 * @param  {Object} config Un dictionnaire qui contient l'header de la requête.
 * @return {String} Le résultat de la requête.
 */
function axiosRequest(url, config) {
  return axios.get(url, config)
  .then((response) => {
    // handle success
    return manageData(response.data);
  })
  .catch((error) => {
    // handle error
    console.error(error);
    set_spotify_msg(error);
    return error;
  })
  .finally(() => {
    // always executed
  });
}

/**
 * Permet de gérer le resultat de la requête et de former une requête SQL.
 * @param  {Object} data Un dictionnaire JSON qui contient le résultat de la requête.
 * @return {String} Une requete SQL qui contient tous les INSERT pour remplir la base de données.
 */
function manageData(data) {
  // Initialisation des variables
  deja = []; // Permet d'ignorer les doublons
  text = ""; // Requete SQL
  tags = getOptionalTags(); // ID des tags à ajouter de base.

  data.items.forEach((value) => {
    track = value.track;
    track.artists.forEach((artist) => {
      if (!deja.includes(artist.id)) {
        deja.push(artist.id);
        name = artist.name.split("\'").join("\'\'");
        noms = name.split(' ');
        artist_id = artist.id;
        text += `INSERT IGNORE INTO Auteur(numAuteur, nom, prenom) VALUES('${artist_id}', '${noms[0]}', '${noms[1]}');\n`
      }
    });
    track.album.artists.forEach((artist) => {
      if (!deja.includes(artist.id)) {
        deja.push(artist.id);
        name = artist.name.split("\'").join("\'\'");
        noms = name.split(' ');
        artist_id = artist.id;
        text += `INSERT IGNORE INTO Auteur(numAuteur, nom, prenom) VALUES('${artist_id}', '${noms[0]}', '${noms[1]}');\n`
      }
    });
    if (!deja.includes(track.album.id)) {
      deja.push(track.album.id);
      nom = track.album.name.split("\'").join("\'\'");
      album_id = track.album.id;
      album_image = track.album.images[0].url;
      album_annee = track.album.release_date;
      text += `INSERT IGNORE INTO Album(numAlbum, nomAlbum, anneeAlbum, imageAlbum) VALUES('${album_id}', '${nom}', '${album_annee}', '${album_image}');\n`;
      track.album.artists.forEach((artist) => {
        if (!deja.includes(`${artist.id}${album_id}`)) {
          deja.push(`${artist.id}${album_id}`);
          text += `INSERT IGNORE INTO Composer(numAuteur, numAlbum) VALUES('${artist.id}', '${album_id}');\n`
        }
      });
    }
    if (!deja.includes(track.id)) {
        deja.push(track.id);
        name = track.name.split("\'").join("\'\'");
        text += `INSERT IGNORE INTO Musique(numMusique, numAlbum, titre, duree) VALUES('${track.id}', '${track.album.id}', '${name}', '${track.duration_ms}');\n`;
        tags.forEach((tag) => {
          text += `INSERT IGNORE INTO Posseder(numMusique, numTag) VALUES('${track.id}', '${tag}');\n`;
        });
    }
    track.artists.forEach((artist) => {
      if (!deja.includes(`${artist.id}${track.id}`)) {
        deja.push(`${artist.id}${track.id}`);
        text += `INSERT IGNORE INTO Ecrire(numAuteur, numMusique) VALUES('${artist.id}', '${track.id}');\n`
      }
    });
  });
  return requeteSQL(text);
}

/**
 * Permet de créer un formulaire de façon dynamique pour envoyer le string qui contient la requête SQL à PHP.
 * @param  {String} text La requête SQL à executer.
 * @return {String} Une requete SQL qui contient tous les INSERT pour remplir la base de données.
 */
function requeteSQL(text) {
  text = text.split('undefined').join('null');
  var f = document.createElement('form');
  f.setAttribute('method', "post");
  f.setAttribute('action', "#");
  f.setAttribute('name', 'spotifyForm')

  var i = document.createElement("input");
  i.setAttribute('type', "hidden");
  i.setAttribute('name', "spotify")
  i.setAttribute('value', text);

  f.appendChild(i)

  document.getElementsByTagName('body')[0].appendChild(f);
  document.forms['spotifyForm'].submit();
  return text;
};

/**
 * Permet de modifier l'HTML de l'element spotifymsg pour afficher des informations sur la page.
 * @param  {String} msg Le message à afficher.
 */
function set_spotify_msg(msg) {
  document.getElementById('spotifymsg').innerHTML = msg;
}
