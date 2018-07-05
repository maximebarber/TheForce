<?php

//**
// on affiche  MODULE - CATEGORIE  - NOMBRE DE JOURS
//

echo "<table class='table-striped table-light'>"
            . "<theader>"
                . "<th>CATÉGORIE</th>"
                . "<th>MODULE</th>"
                . "<th>nb JOURS</th>"
            . "<theader>";

while($programmeSession = $programmeSessions->fetch()){
    echo "<tr><td>" .$programmeSession['nom_categorie']. "</td>"
            . "<td>" .$programmeSession['nom_module']. "</td>"                      
            . "<td>" .$programmeSession['duree_module']. "</td>"   
      . "</tr>";
}
$programmeSessions->closeCursor();


echo "</table>";
    