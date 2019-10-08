get_token = "https://developer.spotify.com/console/get-search-item/?q=&type=&market=&limit=&offset="

function fillDataBase() {

  const api_url = "https://api.spotify.com/v1/playlists/";
  const top_2019 = "0cYxgXN7MoBWTfVhv1D69A";
  const top_2018 = "3pFAbyXA2ALOe79w3oIbaa";
  const top_all = "3ZgmfR6lsnCwdffZUan8EA";

  const token = "BQBLAVRnjscnPn4tqEK_QV9iyQzdGp_2ELVyCbbG1nlvnxr878oekwCCWflg_tD0yHWGmCq4V_G3pJTGlSW8EfIaEUSE6S8DlkcI29YYNxq1F_XSXzgiiC5fIa-TUYw8fstaUM5ZVgbgZhyR6RWNXQQeP_-AyJ4w99XT_5Y";

	let config = {
	  headers: {
      'Content-Type': 'application/json',
	    authorization: 'Bearer ' + token
	  }
	}

  var url = api_url + top_2019 + "/tracks";
  return axiosRequest(url, config);
};

function axiosRequest(url, config) {
  return axios.get(url, config)
  .then((response) => {
    // handle success
    return manageData(response.data);
  })
  .catch((error) => {
    // handle error
    return error;
  })
  .finally(() => {
    // always executed
  });
}

function manageData(data) {
  deja = [];
  text = "";
  data.items.forEach((value) => {
    console.log(value.track);
    track = value.track;
    track.artists.forEach((artist) => {
      if (!deja.includes(artist.id)) {
        deja.push(artist.id);
        noms = artist.name.split(' ');
        artist_id = artist.id;
        text += `INSERT INTO Auteur(numAuteur, nom, prenom) VALUES(${artist_id}, ${noms[0]}, ${noms[1]});\n`
      }
    });
    track.album.artists.forEach((artist) => {
      if (!deja.includes(artist.id)) {
        deja.push(artist.id);
        noms = artist.name.split(' ');
        artist_id = artist.id;
        text += `INSERT INTO Auteur(numAuteur, nom, prenom) VALUES(${artist_id}, ${noms[0]}, ${noms[1]});\n`
      }
    });
    if (!deja.includes(track.album.id)) {
      deja.push(track.album.id);
      nom = track.album.name;
      album_id = track.album.id;
      album_image = track.album.images[0];
      album_annee = track.album.release_date.split('-')[0];
      text += `INSERT INTO Album(numAlbum, nomAlbum, anneeAlbum, imageAlbum) VALUES(${album_id}, ${nom}, ${album_annee}, ${album_image});\n`;
      track.album.artists.forEach((artist) => {
        if (!deja.includes(`${artist.id}${album_id}`)) {
          deja.push(`${artist.id}${album_id}`);
          text += `INSERT INTO Composer(numAuteur, numAlbum) VALUES(${artist.id}, ${album_id});\n`
        }
      });
    }
    if (!deja.includes(track.id)) {
        deja.push(track.id);
        text += `INSERT INTO Musique(numMusique, numAlbum, titre, duree) VALUES(${track.id}, ${track.album.id}, ${track.name}, ${track.duration_ms});\n`;
    }
    track.artists.forEach((artist) => {
      if (!deja.includes(`${artist.id}${track.id}`)) {
        deja.push(`${artist.id}${track.id}`);
        text += `INSERT INTO Ecrire(numAuteur, numMusique) VALUES(${artist.id}, ${track.id});\n`
      }
    });
  });
  requeteSQL(text);
}

function requeteSQL(text) {
  text = text.split("'").join("''");
  text = text.split('undefined').join('null');
  console.log(text);
};
