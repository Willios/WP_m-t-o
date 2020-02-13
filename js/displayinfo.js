// --------------------------------------------------------------------
// Script pour afficher la météo sur la page par defaut

if (navigator.language == "fr-FR") {

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

        let ville = 'Paris';

        if(withIP) {

            ville = await fetch(`http://api.openweathermap.org/data/2.5/weather?q=${ville}&lang=fr&units=metric&appid=0bcd14fdd2ed37d51585ee71dcfbfc21`)
            .then(res => res.json())
            .then(json => json.name);

        } else {
            ville = document.querySelector("#ville").textContent;
        }
        
        const weathertest = await fetch(`http://api.openweathermap.org/data/2.5/weather?q=${ville}&lang=fr&units=metric&appid=0bcd14fdd2ed37d51585ee71dcfbfc21`)
            .then(res => res.json())
            .then(resJson => resJson)
            console.log(weathertest)

        const forecastTemp = await fetch(`http://api.openweathermap.org/data/2.5/forecast?q=${ville}&lang=fr&units=metric&appid=0bcd14fdd2ed37d51585ee71dcfbfc21`)
        .then(res => res.json())
        .then(resultatJson => resultatJson)

        displayWeatherInfos(weathertest,forecastTemp);

    }

    function displayWeatherInfos(data,dataforcast) {
    
        var currentTime = new Date();
        today = currentTime.toDateString();

        const name = data.name
        const temperature = data.main.temp;
        const conditions = data.weather[0].main;
        const description = data.weather[0].description;
        const nextDayWeather = dataforcast.list[7].main.temp
        const nextDayType = dataforcast.list[7].weather[0].main
        const nextNextDayWeather = dataforcast.list[15].main.temp
        const nextNextDayWeatherType = dataforcast.list[15].weather[0].main
        const nextNextNextDayWeather = dataforcast.list[23].main.temp
        const nextNextNextDayWeatherType = dataforcast.list[23].weather[0].main
        


        document.querySelector('#currentDate').textContent = today;
        document.querySelector('#ville').textContent = name;
        document.querySelector('#temperature').textContent = Math.round(temperature);
        document.querySelector('#tempF').textContent = Math.round(temperature) * 9/5 + 32;
        document.querySelector('#temperature1').textContent = Math.round(nextDayWeather);
        document.querySelector('#temperature2').textContent = Math.round(nextNextDayWeather);
        document.querySelector('#temperature3').textContent = Math.round(nextNextNextDayWeather);
        document.querySelector('#conditions').textContent = capitalize(description);
        document.querySelector('i.wi').className = weatherIcons[conditions]; 
        document.querySelector('#wPlusOne').className = weatherIcons[nextDayType];
        document.querySelector('#wPlusTwo').className = weatherIcons[nextNextDayWeatherType]; 
        document.querySelector('#wPlusThree').className = weatherIcons[nextNextNextDayWeatherType]; 
        document.querySelector('#container').className = conditions.toLowerCase();

    }

    const ville = document.querySelector("#ville");

    ville.addEventListener('click', async () => {
        ville.contentEditable = true;
    });

    ville.addEventListener('keydown', async (e) => {
        if(e.keyCode === 13) {
            e.preventDefault();
            ville.contentEditable = false;
             getAll(false);
        } 
    })

     getAll();

    
// Si la langue du navigateur est Anglais
} else if (navigator.language == "en") {

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
    async function getAllLondon(withIP = true) {

        let ville = 'Londres';

        if(withIP) {

        ville = await fetch(`http://api.openweathermap.org/data/2.5/weather?q=${ville}&lang=fr&units=metric&appid=0bcd14fdd2ed37d51585ee71dcfbfc21`)
        .then(res => res.json())
        .then(json => json.name);

        } else {
            ville = document.querySelector("#ville").textContent;
        }
        
    const weathertest = await fetch(`http://api.openweathermap.org/data/2.5/weather?q=${ville}&lang=fr&units=metric&appid=0bcd14fdd2ed37d51585ee71dcfbfc21`)
        .then(res => res.json())
        .then(resJson => resJson)
    displayWeatherInfos(weathertest);

    
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
             getAllLondon(false);
        } 
    })

     getAllLondon();

} else {
    console.log("helloworld")
    // return;
}