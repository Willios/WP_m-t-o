# Carnet de bord | Projet Plugin Wordpress

Cahier de doléance concernant les plugins Wordpress et Git


## Jeudi 30 Janvier

Recherche de documentation sur la création de plugins Wordpress, suivi d’un tutoriel de Alessandro Castellani sur youtube, sur la création de plugins/widget from scratch. Après les 7 premières vidéos, je me suis arrêté car la suite ne convenait plus à mes besoins et j’ai commencé à suivre le tutoriel sur le site Numelion.Com à l’adresse suivante :

[https://www.numelion.com/creer-un-widget-wordpress.html](https://www.numelion.com/creer-un-widget-wordpress.html)

## Vendredi 31 Janvier

Suite du tutoriel de Numélion et rajout du tutoriel sur OpenClassRoom sur la création de plugin/widget. Le plugins ainsi que le widget sont créé et fonctionnel, il n’affiche juste rien a part un champ de texte vide pour le moment .  
Je décide donc de me tourner vers d’autre Plugins Wordpress déjà établie pour voir comment ils gèrent leur partie Administrateur sur Wordpress .  
Brainstorming avec Remy et Aranxa sur les différentes étapes éventuels et l’utilisation de L’API (Récupérer les données , sous quel format / comment les afficher etc… ) et des API disponible avec les données qui m’intéresse ( OpenWeatherMap ou Darksky ).

## Lundi 3 février 

Les données récupérer par L’API sont sous forme de coordonnées longitude et latitude, l’idée serais maintenant de pouvoir les convertir en nom de ville et pays via une autre API ( OpenCage Geocoder ).  
N’ayant pas trouvé de tuto explicite , je continue de décortiquer un plugin de WordPress ( Awesome-weather ) pour voir l’architecture de fichier, les fonctions etc…  
Suivi d’un tuto de la chaine Antho Welc sur youtube sur | Comment créer une application météo (OpenWeatherMap) | pour la partie API



## Mardi 4 février

Réalisation du tutoriel de Antho Welc , puis je me suis rendu compte qu'il me manquais des clés de compréhension vis a vis de l'utilisation de L'API pour les requêtes que je voulais effectuer et j'ai chercher un autre tuto plus détailler. Je suis tomber sur la chaine de  Lior CHAMLA de 30 min qui propose la création d'une app meteo avec le Fetch/Async/Await et j'ai tenter de la reproduire en l'adaptant a ma sauce. Suite a la réalisaton de cet app, je me suis retrouver face a un problême :

	- Access to fetch at 'http://freegeoip.net/json/90.80.53.89' from origin 'http://127.0.0.1:8080' has been blocked by CORS policy: No 'Access-Control-Allow-Origin' header is present on the requested resource. If an opaque response serves your needs, set the request's mode to 'no-cors' to fetch the resource with CORS disabled.

Que je vais tenter de résoudre demain.

## Mercredi 5 février

J'ai passer une bonne partie de la journée a essayer de résoudre le problème au niveaux du CORS sans succès. Suivi du tuto de grafikart sur les CORS et leur résolution ( Il le fait en Node.js rip ), ajout d'extensions sur Chrome ou Firefox pour modifier la règle des browsers, plusieurs heures de recherche sur stackoverflow et différentes ressources sans rien trouver, j'ai décider d'abandonner l'idée d'utiliser 2 api différentes la localisation du User par IP et je vais faire autrement.
J'étais partis dans l'idée que si le user refusais d'activer la géolocalisation, j'allais déterminer une position géographique approximative en utilisant l'ip de celui qui lui afficher la météo de sa ville , mais je vais explorer une autre piste , comme par exemple interroger la langue du navigateur de l'utilisateur et lui afficher la température de la Capital de sont pays ou autre.

## Jeudi 6 février

Début de la maquette pour le plugin , actuellement la ville/L'icone/la température et le type de météo sont fonctionnel , je vais m'attaquer à a la création des boutons pour changer l'unité de température et afficher les 3 jours a venir .
![Maquette Widget](https://i.imgur.com/8sK2LFC.png)

Puis recherche vis a vis de l'activation de la géolocalisation.

## Vendredi 7 février

J'ai passer la matinée a faire des recherches sur la manière et les bonnes démarche vis a vis de la demande de la géolocalisation par le navigateur. J'ai éplucher la doc Google/RGPD/CNIL a ce sujet pour voir ce qui était " autoriser " ou non de faire dans un cadre " légal".
Dans le cas de mon plugin , je vais essayer d'afficher une ville par défaut ( Si possible la capital lié a la langue du navigateur ) puis si la personne accepte la géolocalisation, sa la météo de sa ville. Si elle refuse, cela se fera via l'ip.

J'ai réussis a activer la géolocalisation , j'ai plus qu'a agencer les différents comportement que je veux . Il faut que je me renseigne sur la récupération de la langue du navigateur, et sur les callback car avec mes fonctions Asynchrone, je me retrouve a ne pas pouvoir utiliser certaine variable ou fonctions au moment désirer.

## Lundi 10 février

J'ai passer une partie de la mâtiné a perfectionner la géolocalisation et les résultats attendu . Par défaut , on affiche Paris si la langue du navigateur est FR ou Londres si c'est EN. 
Pour continuer a améliorer le système, il faut que je me renseigne sur la LIST ISO 63-1 , c'est a dire la liste qui contient toutes les langues de navigateurs et leur abréviation. Je pourrais essayer de stocker cet liste dans une base de données et faire l'affichage de la capital en fonction de la langue.
J'ai également eu un soucis lors de l'implémentation de la géolocalisation qui m’empêchais de cliquer sur le nom de la ville pour en changer , après quelques recherches sur internet, il est résolu.

Ajout de la date du jour en haut du Widget et de la prévision sur 3 jours. J'ai modifier ma maquette après avoir juger qu'avoir plusieurs boutons dessus ne serais pas pertinent , j'affiche donc la météo en Celsius et Fahrenheit en plus petit a coté par défaut. Dans les différents pays ou on utilise le système impérial plutôt que métrique, j'afficherais les Fahrenheit en gros et les Celsius en petit.

***To do list :***
	- Intégration Wordpress
	- Gérer les cas ou la personne fait une faute de frappe
	- Auto complétion
	- Système de Favoris
	- Back Office Wordpress

## Mardi 11 février


