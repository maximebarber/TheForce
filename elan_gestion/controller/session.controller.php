<?php

require_once 'model/SessionManager.model.php';

//LISTE FILMS
function getSessions(){
    $sessionManager = new SessionManager();
    $sessions = $sessionManager->getSessions();
    $countStagiaires = $sessionManager->getCountStagiaire();
    require 'view/sessions_disponibles.view.php';
}

function getProgrammeSession($idSession){
    $sessionManager = new SessionManager();
    $programmeSessions = $sessionManager->getProgrammeSession($idSession);
    require 'view/programme_session.view.php';
}

function addSession($intitule, $dateDebut, $dateFin, $nbPlaces, $img){
    $sessionManager = new SessionManager();
    if($sessionManager->addSession($intitule, $dateDebut, $dateFin, $nbPlaces, $img)){
         require 'view/add_session.view.php';
    }
    else echo "neineineinein!!!";
   
}

