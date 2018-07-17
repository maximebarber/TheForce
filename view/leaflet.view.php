<!DOCTYPE html>

<html>
    <head>
        <title>Leaflet Map</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- le style CSS propre à Leaflet-->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.2/dist/leaflet.css"
        accesskey=""integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin=""/>

        <!-- Pour ne pas écraser mon style, on ajoute avant le style CSS qui appartient à Leaflet.-->
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
    </head>
    <body>
        <div id="map"> </div>

         <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.3.2/dist/leaflet.js"
        integrity="sha512-2fA79E27MOeBgLjmBrtAgM/20clVSV8vJERaW/EcnnWCVGwQRazzKtQS1kIusCZv1PtaQxosDZZ0F1Oastl55w=="
        crossorigin=""></script>

        <!-- Le script qui appele le JS-->
        <script type="text/javascript" src="controller/app.leaflet.js"> </script>
    </body>
</html>
