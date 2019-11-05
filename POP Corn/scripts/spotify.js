const my_client_id = "37f040251306463aa43d272d61d68526";
const secret_token = "d0df61c03b394843939d462426bcbc6a";
const api_url_playlists = "https://api.spotify.com/v1/playlists/";
const top_2019 = "0cYxgXN7MoBWTfVhv1D69A";
const top_2018 = "3pFAbyXA2ALOe79w3oIbaa";
const top_all = "3ZgmfR6lsnCwdffZUan8EA";

var token = "";

function setVariables(newtoken) {
  token = newtoken;
}

function getOptionalParameters() {
  url = document.getElementById('optionalurl');
  if (url != null && url.value != "") {
    return url.value;
  }
  return false;
}

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

function manageData(data) {
  deja = [];
  text = "";
  tags = getOptionalTags();
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

function set_spotify_msg(msg) {
  document.getElementById('spotifymsg').innerHTML = msg;
}
