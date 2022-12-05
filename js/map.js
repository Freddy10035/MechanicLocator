
var x = document.getElementById("demo");


function getUpdatingLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}


function getCurrentLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    // x.innerHTML = "Geolocation is not supported by this browser.";
    showError(error);
  }
}


function showPosition(position) {
  long = position.coords.longitude
  lat = position.coords.latitude

  // x.innerHTML = `${lat} and ${long}`;

  document.querySelector('#long-cord').value = long;
  document.querySelector('#lat-cord').value = lat;
}


function showError(error) {
    switch(error.code) {
      case error.PERMISSION_DENIED:
        x.innerHTML = "User denied the request for Geolocation."
        break;
      case error.POSITION_UNAVAILABLE:
        x.innerHTML = "Location information is unavailable."
        break;
      case error.TIMEOUT:
        x.innerHTML = "The request to get user location timed out."
        break;
      case error.UNKNOWN_ERROR:
        x.innerHTML = "An unknown error occurred."
        break;
    }
  }

  function plotPosition(position) {
    var latlon = position.coords.latitude + "," + position.coords.longitude;
  
    // var img_url = "https://maps.googleapis.com/maps/api/staticmap?center=
    // "+latlon+"&zoom=14&size=400x300&sensor=false&key=YOUR_KEY";
  
    // document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
  }

  
// Property	Returns
// coords.latitude	The latitude as a decimal number (always returned)
// coords.longitude	The longitude as a decimal number (always returned)
// coords.accuracy	The accuracy of position (always returned)
// coords.altitude	The altitude in meters above the mean sea level (returned if available)
// coords.altitudeAccuracy	The altitude accuracy of position (returned if available)
// coords.heading	The heading as degrees clockwise from North (returned if available)
// coords.speed	The speed in meters per second (returned if available)
// timestamp	The date/time of the response (returned if available)


// getCurrentLocation();

    
function fetchLoc(){
  fetch(getCurrentLocation())
  .then(response => {
    showPosition(response);
  })
  .catch(error => {
    // showError(error);
  })
}

fetchLoc();

// function postData(){ 
//   fetch('../php/mechNear.php', {
//     method: 'POST',
//     headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'},
//   })
//   .then( response =>{})
//   .catch(error => {})
// }