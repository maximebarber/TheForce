<?php

//**
// on affiche  MODULE - CATEGORIE  - NOMBRE DE JOURS
//
$intitule = $intitules->fetch();

echo '<h3>' . $intitule['intitule_session'] . '</h3>';

echo "<table class='table-striped table-light'>"
 . "<theader>"
 . "<th>MODULE</th>"
 . "<th>NOMBRE DE JOURS</th>"
 . "<theader>";

$idCategorie = "";

while ($module = $modules->fetch()) {

    if ($idCategorie != $module['id_categorie']) {
        $idCategorie = $module['id_categorie'];
        echo '<tr><td colspan=2>' . $module['nom_categorie'] . '</td></tr>';
    }

    echo "<tr><td>" . $module['nom_module'] . "</td>"
    . "<td>" . $module['duree_module'] . "</td>"
    . "</tr>";
}

echo "</table><br>";

echo '<h4>Liste des stagiaires inscrits à la session</h4>';

//AFFICHAGE DE LA LISTE DES STAGIAIRES INSCRITS A LA SESSION
while ($stagiaire = $stagiaires->fetch()) {
    echo $stagiaire['nom'] . ' - ';
    echo $stagiaire['email'] . '<br>';
}

$modules->closeCursor();
$intitules->closeCursor();
$stagiaires->closeCursor();




