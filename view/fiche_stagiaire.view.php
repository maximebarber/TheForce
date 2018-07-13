<?php
//**
// On affiche l'information personnelle d'un stagiaire
//

$infoStagiaire = $infosStagiaire->fetch();

echo "Nom : ".$infoStagiaire['nom']."<br>";
      
echo "Sexe : ".$infoStagiaire['sexe_stagiaire']."<br>";
echo "Date de naissance : ".$infoStagiaire['naissance_stagiaire']."<br>";
echo "Ville : ".$infoStagiaire['ville_stagiaire']."<br>";
echo "Courriel : ".$infoStagiaire['email_stagiaire']."<br>";
echo "Téléphone : ".$infoStagiaire['telephone_stagiaire']."<br><br>";

$infosStagiaire->closeCursor();

//**
// On affiche la ou les SESSIONS où s'est inscrit le stagiaire.
//

echo "SESSIONS PREVUES";




echo "<table class='table-striped table-light'>"
            . "<theader>"
                    . "<th>INTITULE SESSION</th>"
                    . "<th>DATE DEBUT</th>"
                    . "<th>DATE FIN</th>"
            . "</h2><theader>";


while ($sessionStagiaire = $sessionsStagiaire->fetch()){
    
      echo "<tr><td>" . $sessionStagiaire['intitule_session'] . "</td>";
      echo "<td>" . $sessionStagiaire['date_debut'] . "</td>";
      echo "<td>" . $sessionStagiaire['date_fin'] . "</td></tr>";
      
}
echo "</table>";
$sessionsStagiaire->closeCursor();
