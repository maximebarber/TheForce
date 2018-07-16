<div id="cards">

    <?php
    
    //TANT QU'IL Y A DES SESSIONS ON LES AFFICHE SOUS FORME DE CARTES
    while ($session = $sessions->fetch()) {
        
        $countStagiaire = $countStagiaires->fetch();
        
        $nb_places_reservees = $countStagiaire['countStagiaire'];
        
        if($nb_places_reservees > 0) {
            $nb_places_reservees = $nb_places_reservees;
        }
        else $nb_places_reservees = 0;
        
        $nb_places_restantes = ($session['nb_places_theoriques']) - ($countStagiaire['countStagiaire']);

        echo '<div class="card" style="width: 18rem;" id="card">
  <img class="card-img-top" src="' . $session["img_session"] . '" alt="study-img">
  <div class="card-body">
    <h5 class="card-title">' . $session["intitule_session"] . '</h5>
        
     <span class="badge badge-pill badge-primary"> ' . $nb_places_reservees . '/' . $session['nb_places_theoriques'] .'</span>
         
    <p class="card-text">Du ' . $session["date_debut"] . ' au ' . $session['date_fin'] . '</p>
    <p class="card-text">Nombre de places restantes : ' . $nb_places_restantes . '</p>
    <a href=index.php?action=programme_session&amp;idSession=' . $session["id_session"] . ' class="btn btn-primary">Plus d\'infos</a>
  </div>
</div>';
    }

    echo '</div>';

//PERMET DE STOPPER CONNECTION A LA BDD
    $sessions->closeCursor();
    