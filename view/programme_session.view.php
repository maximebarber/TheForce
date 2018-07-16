<?php

//**
// ON AFFICHE  MODULE - CATEGORIE  - NOMBRE DE JOURS
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
        echo '<tr><td colspan=2 align="center"><span style="font-weight:bold;">' . $module['nom_categorie'] . '</span></td></tr>';
    }

    echo "<tr><td align='center'>" . $module['nom_module'] . "</td>"
    . "<td><td align='center'>" . $module['duree_module'] . "</td>"
    . "</tr>";
}

echo "</table><br>";

echo '<h4>Liste des stagiaires inscrits à la session</h4>';
echo "<table class='table-striped table-light'>"
 . "<theader>"
 . "<th>PRENOM NOM</th>"
 . "<th>ADRESSE EMAIL</th>"
 . "<theader>";

//AFFICHAGE DE LA LISTE DES STAGIAIRES INSCRITS A LA SESSION
while ($stagiaire = $stagiaires->fetch()) {
    echo "<tr><td><a href='index.php?action=fiche_stagiaire&idStagiaire=".$stagiaire['id_stagiaire']."'>" . $stagiaire['nom'] . ' </a></td> ';
    echo "<td align='center'>" . $stagiaire['email'] . "</td></tr>";
}

$modules->closeCursor();
$intitules->closeCursor();
$stagiaires->closeCursor();




