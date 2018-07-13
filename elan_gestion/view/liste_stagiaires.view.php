<?php

echo "<table class='table-striped table-light'>"
            . "<theader>"
                    . "<th>NOM Prenom</th>"
                    . "<th>Details</th>"
            . "<theader>";



while($stagiaire = $stagiaires->fetch()){
    echo "<tr>"
                . "<td>".$stagiaire['nom']."</td>"                      
                . "<td>" . "<a href='?action=fiche_stagiaire&amp;idStagiaire=" . $stagiaire['id_stagiaire']. "' >" . "Plus d'info...!</a></td>"     
                //'Plus d'info' possède le 'id_stagiaire' pour aller dans la page qui affiche l'info personnelle de chaque stagiaire.
            . "</tr>";
}

$stagiaires->closeCursor();


echo "</table>";

