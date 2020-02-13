<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="wp-content/plugins/custom-widget/css/weathertest.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.10/css/weather-icons.min.css">
    <script src="wp-content/plugins/custom-widget/js/usergeolocalisation.js"></script>
    <!-- <script src="js/fromCtoF.js"></script> -->
    
    <title>Test API</title>
</head>
<body>

    <div id="container">
        <section id="app">
            <div class="redColor" id="currentDate"></div>
                <h1>
                    <span id="ville"></span>
                    <span class="tooltip">Température d'une autre ville ?</span>
                </h1>
            <p id="conditions"></p>
            <i class="wi wi-day-rain"></i>
            <h2>
            <span class="redColor" id="temperature"></span><span class="redColor">°C / </span><span class="lowFontSize redColor" id="tempF"></span><span class="lowFontSize redColor">°F</span> 
            </h2>
            <h3>
            <span class="redColor">Day+1</span>
            <span class="redColor">Day+2</span>
            <span class="redColor">Day+3</span>
            </br>
            <u id="wPlusOne"></u>
            <u id="wPlusTwo"></u>
            <u id="wPlusThree"></u>
            </br>   
            <span class="redColor" id="temperature1"></span><span class="redColor marginRight"> °C </span>
            <span class="redColor" id="temperature2"></span><span class="redColor marginRight"> °C </span>
            <span class="redColor" id="temperature3"></span><span class="redColor"> °C </span>
            </h3>
        <section>
    </div>



<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="wp-content/plugins/custom-widget/js/displayinfo.js"></script>


</body>
</html>