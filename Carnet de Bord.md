# Carnet de bord | Projet Plugin Wordpress

Ici, repose toute la souffrance et la peine d'un développeur devant utiliser Git


# Jeudi 30 Janvier

Recherche de documentation sur la création de plugins Wordpress, suivi d’un tutoriel de Alessandro Castellani sur youtube, sur la création de plugins/widget from scratch. Après les 7 premières vidéos, je me suis arrêté car la suite ne convenait plus à mes besoins et j’ai commencé à suivre le tutoriel sur le site Numelion.Com à l’adresse suivante :

[https://www.numelion.com/creer-un-widget-wordpress.html](https://www.numelion.com/creer-un-widget-wordpress.html)

## Vendredi 31 Janvier

Suite du tutoriel de Numélion et rajout du tutoriel sur OpenClassRoom sur la création de plugin/widget . Le plugins ainsi que le widget sont créé et fonctionnel, il n’affiche juste rien a part un champ de texte vide pour le moment .  
Je décide donc de me tourner vers d’autre Plugins Wordpress déjà établie pour voir comment ils gèrent leur partie Administrateur sur Wordpress .  
Brainstorming avec Remy et Aranxa sur les différentes étapes éventuels et l’utilisation de L’API (Récupérer les données , sous quel format / comment les afficher etc… ) et des API disponible avec les données qui m’intéresse ( OpenWeatherMap ou Darksky ).

## Lundi 3 février 

Les données récupérer par L’API sont sous forme de coordonnées longitude et latitude , l’idée serais maintenant de pouvoir les convertir en nom de ville et pays via une autre API ( OpenCage Geocoder ).  
N’ayant pas trouvé de tuto explicite , je continue de décortiquer un plugin de WordPress ( Awesome-weather ) pour voir l’architecture de fichier , les fonctions etc…  
Suivi d’un tuto de la chaine Antho Welc sur youtube sur | Comment créer une application météo (OpenWeatherMap) | pour la partie API



# Mardi 4 février

Réalisation du tutoriel de Antho Welc , puis je me suis rendu compte qu'il me manquais des clés de compréhension vis a vis de l'utilisation de L'API pour les requêtes que je voulais effectuer et j'ai chercher un autre tuto plus détailler . Je suis tomber sur la chaine de  Lior CHAMLA de 30 min qui propose la création d'une app meteo avec le Fetch/Async/Await et j'ai tenter de la reproduire en l'adaptant a ma sauce . Suite a la réalisaton de cet app , je me suis retrouver face a un problême :

	- Access to fetch at 'http://freegeoip.net/json/90.80.53.89' from origin 'http://127.0.0.1:8080' has been blocked by CORS policy: No 'Access-Control-Allow-Origin' header is present on the requested resource. If an opaque response serves your needs, set the request's mode to 'no-cors' to fetch the resource with CORS disabled.

Que je vais tenter de résoudre demain.

# Mercredi 5 février









