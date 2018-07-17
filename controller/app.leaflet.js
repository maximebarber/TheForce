/* On crée une variable qu'on l'appele "L"
*  qui possède un méthode map où nous
*  envoyons une variable map. Au même temps,
*  on demande qu'il s'affiche la Latitude et
*  la Longitude, ensuite le niveau de ZOOM
*
*  On crée un variable avec le nom de la Ville
*  On va s'en servir du code d'aeroport
*  dans l'occurence Strasbourg est strasbourg
*/

var strasbourg=[48.57340529999999,7.752111300000024];

/*
*  On fait la création de la MAP
*/
var map= L.map('map').setView(strasbourg, 12);


/*
 * On fait la Création de la Calque image, en utilisant d'autres sources.
 * car on a besoin d'une carte
 * Malheureusement la carte est très lourde, avec une vitesse de
 * téléchargement lente, sera penible avoir l'affichage.
 */

L.tileLayer('https://korona.geog.uni-heidelberg.de/tiles/roads/x={x}&y={y}&z={z}',{
    maxZoom:20
    }).addTo(map);

/*
 * Ajout d'un marqueur
 * On prendre l'objet L
 */
var marker=L.marker(strasbourg).addTo(map);


/*
 * On ajout un PopUp
 * a notre variable marker on va le demander une méthode
 * avec le contenu qu'on veut afficher, en format HTML
 */

marker.bindPopup('<h3> TheForce, Strasbourg</h3>');
