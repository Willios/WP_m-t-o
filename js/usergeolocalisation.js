// --------------------------------------------------------------------
// Script pour demander demander au user d'activer la géolocalisation


window.onload = function() {
  var geoOptions = {
    maximumAge: 5 * 60 * 1000,
  }

  // Si l'utilisateur autorise
  var geoSuccess = async function(position) {
    startPos = position;
    await getAll();
  };

  // Si l'utilisateur refuse
  var geoError = async function() {
    await getAll();
  };

  navigator.geolocation.getCurrentPosition(geoSuccess, geoError, geoOptions);
};


// Fonction d'affichage de la météo

async function getAll(withIP = true) {

  let ville;

  if(withIP) {

  ville = await fetch('https://ipinfo.io?token=97e298aff821d5')
  .then(res => res.json())
  .then(json => json.city);

  } else {
      ville = document.querySelector("#ville").textContent;
  }
  
  const weathertest = await fetch(`http://api.openweathermap.org/data/2.5/weather?q=${ville}&lang=fr&units=metric&appid=0bcd14fdd2ed37d51585ee71dcfbfc21`)
    .then(res => res.json())
    .then(resJson => resJson)
  
  const forecastTemp = await fetch(`http://api.openweathermap.org/data/2.5/forecast?q=${ville}&lang=fr&units=metric&appid=0bcd14fdd2ed37d51585ee71dcfbfc21`)
      .then(res => res.json())
      .then(resultatJson => resultatJson)

      displayWeatherInfos(weathertest,forecastTemp);

}

