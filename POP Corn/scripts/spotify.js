function fillDataBase() {
 	var token = "d0df61c03b394843939d462426bcbc6a";
	var top_url = "https://api.spotify.com/v1/playlists/3ZgmfR6lsnCwdffZUan8EA";

	let config = {
	  headers: {
	    authorization: token,
	  }
	}

	axios.get(top_url, config)
	.then(function (response) {
    // handle success
    console.log(response);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  .finally(function () {
    // always executed
  });

};

function openForm() {
	current = document.getElementById("connexadmin").style.display;
	document.getElementById("connexadmin").style.display = (current == "block") ? "none" : "block";
}
