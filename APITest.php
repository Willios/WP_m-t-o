<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="css/weathertest.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.10/css/weather-icons.min.css">
    <title>Test API</title>
</head>
<body>

    <section id="app">
        <h1>
            <span id="ville"></span>
            <span class="tooltip">Autre ville ?</span>
        </h1>
        <i class="wi wi-day-rain"></i>
        <h2>
        <span id="temperature"></span> C °(<span id="conditions")></span>)
        </h2>
    <section>


<script>

const weatherIcons = {
    "Rain": "wi wi-day-rain",
    "Clouds": "wi wi-day-cloudy",
    "Clear": "wi wi-day-sunny",
    "Snow": "wi wi-day-snow",
    "mist": "wi wi-day-fog",
    "Drizzle": "wi wi-day-sleet",
}

function capitalize(str){
    return str[0].toUpperCase() + str.slice(1);
}
async function getAll(withIP = true) {

    if(withIP) {

const weathertest = await window.fetch('http://api.openweathermap.org/data/2.5/weather?q=Strasbourg&lang=fr&units=metric&appid=0bcd14fdd2ed37d51585ee71dcfbfc21')
    .then(res => res.json())
    .then(resJson => resJson)


    const iptest = await window.fetch('http://api.ipify.org?format=json')
    .then(res => res.json())
    .then(json => json.ip);

    // const ville = await fetch('http://freegeoip.net/json/' + iptest)
    // .then(resultat => resultat.json())
    // .then(json => json.city)

    displayWeatherInfos(weathertest);

    } else {
        iptest = document.querySelector("#ville").textContent;
    }
}

function displayWeatherInfos(data) {
    const name = data.name
    const temperature = data.main.temp;
    const conditions = data.weather[0].main;
    const description = data.weather[0].description;

    document.querySelector('#ville').textContent = name;
    document.querySelector('#temperature').textContent = Math.round(temperature);
        
    document.querySelector('#conditions').textContent = capitalize(description);
    
    document.querySelector('i.wi').className = weatherIcons[conditions];

    document.body.className = conditions.toLowerCase();
}

const ville = document.querySelector("#ville");

ville.addEventListener('click', () => {
    ville.contentEditable = true;
});

ville.addEventListener('keydown', (e) => {
    if(e.keyCode === 13) {
        e.preventDefault();
        ville.contentEditable = false;
        getAll(false);
    } 
})


getAll();


</script>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
</body>
</html>