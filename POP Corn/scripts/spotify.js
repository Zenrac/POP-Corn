function fillDataBase() {

  set_spotify_msg('Chargement en cours...');

  const api_url = "https://api.spotify.com/v1/playlists/";
  const top_2019 = "0cYxgXN7MoBWTfVhv1D69A";
  const top_2018 = "3pFAbyXA2ALOe79w3oIbaa";
  const top_all = "3ZgmfR6lsnCwdffZUan8EA";
  get_token = "https://developer.spotify.com/console/get-search-item/?q=&type=&market=&limit=&offset="
  const token = "BQAvfqtXkgz9SBm5X0mSfC5AIGUGmp4FpzIUNHjxpa16CUXD4Lnxg72fpnsvOJjsRVmiQBOBHVtQo2i4AiKWtlPauLY5CXt0BoLX_mflG0QNt7dZQxHPhn0WEB5gVkzsfCcjAalD-v1W7NZxIrokrc_2zzDeODjWL4oLsD0";

	let config = {
	  headers: {
      'Content-Type': 'application/json',
	    authorization: 'Bearer ' + token
	  }
	}

  var url = api_url + top_2019 + "/tracks";
  return axiosRequest(url, config);
};

function getNewToken() {
  var scopes = 'user-read-private user-read-email';
  res.redirect('https://accounts.spotify.com/authorize' +
    '?response_type=code' +
    '&client_id=' + my_client_id +
    (scopes ? '&scope=' + encodeURIComponent(scopes) : '') +
    '&redirect_uri=' + encodeURIComponent(redirect_uri));
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
  console.log(data);
  deja = [];
  text = "";
  data.items.forEach((value) => {
    track = value.track;
    track.artists.forEach((artist) => {
      if (!deja.includes(artist.id)) {
        deja.push(artist.id);
        name = artist.name.split("\'").join("\'\'");
        noms = name.split(' ');
        artist_id = artist.id;
        text += `INSERT INTO Auteur(numAuteur, nom, prenom) VALUES('${artist_id}', '${noms[0]}', '${noms[1]}');\n`
      }
    });
    track.album.artists.forEach((artist) => {
      if (!deja.includes(artist.id)) {
        deja.push(artist.id);
        name = artist.name.split("\'").join("\'\'");
        noms = name.split(' ');
        artist_id = artist.id;
        text += `INSERT INTO Auteur(numAuteur, nom, prenom) VALUES('${artist_id}', '${noms[0]}', '${noms[1]}');\n`
      }
    });
    if (!deja.includes(track.album.id)) {
      deja.push(track.album.id);
      nom = track.album.name.split("\'").join("\'\'");
      album_id = track.album.id;
      album_image = track.album.images[0].url;
      album_annee = track.album.release_date;
      text += `INSERT INTO Album(numAlbum, nomAlbum, anneeAlbum, imageAlbum) VALUES('${album_id}', '${nom}', '${album_annee}', '${album_image}');\n`;
      track.album.artists.forEach((artist) => {
        if (!deja.includes(`${artist.id}${album_id}`)) {
          deja.push(`${artist.id}${album_id}`);
          text += `INSERT INTO Composer(numAuteur, numAlbum) VALUES('${artist.id}', '${album_id}');\n`
        }
      });
    }
    if (!deja.includes(track.id)) {
        deja.push(track.id);
        name = track.name.split("\'").join("\'\'");
        text += `INSERT INTO Musique(numMusique, numAlbum, titre, duree) VALUES('${track.id}', '${track.album.id}', '${name}', '${track.duration_ms}');\n`;
    }
    track.artists.forEach((artist) => {
      if (!deja.includes(`${artist.id}${track.id}`)) {
        deja.push(`${artist.id}${track.id}`);
        text += `INSERT INTO Ecrire(numAuteur, numMusique) VALUES('${artist.id}', '${track.id}');\n`
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
