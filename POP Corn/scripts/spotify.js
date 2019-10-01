get_token = "https://developer.spotify.com/console/get-search-item/?q=&type=&market=&limit=&offset="

function fillDataBase() {

  const api_url = "https://api.spotify.com/v1/playlists/";
  const top_2019 = "0cYxgXN7MoBWTfVhv1D69A";
  const top_2018 = "3pFAbyXA2ALOe79w3oIbaa";
  const top_all = "3ZgmfR6lsnCwdffZUan8EA";

  const token = "BQDWR6GrJsKDoPAiZroAt_oblNBP06iJSgK5ZXxS1yXtH8o_pzv65SyUCM4_RcqJfBkF0T3LRqFajqcEHJT3IurCNDPxyE1ZglZ1Ac3erIEJxPuv2ZwGHzGqhwFpbJsFEKJmBDUCJbsQKmJDqY_4Dpcb02X-vEC1fth1U0w";

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
  var userStr = JSON.stringify(data.items);
  $.ajax({
      url: '../index.php',
      type: 'post',
      data: {user: userStr},
      success: function(response){
          //do whatever.
      }
  });
}
