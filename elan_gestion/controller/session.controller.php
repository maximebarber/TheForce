<?php

require_once "model/CategorieManager.model.php";
require_once 'model/SessionManager.model.php';
require_once 'functions.php';

//LISTE SESSIONS
function getSessions(){
    $sessionManager = new SessionManager();
    $sessions = $sessionManager->getSessions();
    $countStagiaires = $sessionManager->getCountStagiaire();
    require 'view/sessions_disponibles.view.php';
}

//INFOS D'UNE SESSION DONNEE
function getProgrammeSession($idSession){
    $sessionManager = new SessionManager();
    $intitules = $sessionManager->getIntitule($idSession);
    $modules = $sessionManager->getModules($idSession);
    require 'view/programme_session.view.php';
}

//AJOUT D'UNE SESSION
function addSession($data = null){
    
    $msg ="";
    
    if(isset($data)){
    
        $intitule = e(capsLower($data['intitule']));
        $dateDebut = e($data['dateDebut']);
        $dateFin = e($data['dateFin']);
        $nbPlaces = e($data['nbPlaces']);
        //$img = $data['img'];
            
        $sessionManager = new SessionManager();

        //VERIFIER SI DATE FIN > DATE DEBUT
        if (strtotime($_POST['dateFin']) < strtotime($_POST['dateDebut'])) {
            
            $msg = "Veuillez saisir une date de fin de session ultérieure à la date de début.";
            
        }
        
        //ERREUR SI INTITULE COMPORTE CARACTERES SPECIAUX OU NE FAIT PAS LE BON NOMBRE DE CARACTERES
        else if (!preg_match("#^[a-zéèàêâùïüëçA-Z]{3,50}$#", $_POST['intitule'])) {
            
            $msg = 'L\'intitulé de session ne doit comporter aucun caractère spécial et doit faire entre 3 et 50 caractères.';
            
        } 
        
        //VERIFIER SI NB PLACES CORRECT
        else if ($_POST['nbPlaces'] < '0' || $_POST['nbPlaces'] > '20'){
            
            $msg = "Veuillez saisir un nombre de places compris entre 1 et 20";
            
        }
        
        //SINON AFFICHER MESSAGE SUCCES
        else if($sessionManager->addSession($intitule, $dateDebut, $dateFin, $nbPlaces/*, $img*/)){
            
            $msg = "La session a bien été ajoutée.";
            
        }
    }
    
    require 'view/add_session.view.php';
}

//AJOUT D'UN MODULE A UNE SESSION
function addModuleToSession($data = null){
    
    $msg ="";
    
    if(isset($data)){

        $idModule = $data['idModule'];
        $idSession = $data['idSession'];
        $dureeModule = $data['dureeModule'];
        
        $sessionManager = new SessionManager();
        
        //AFFICHER MESSAGE SUCCES
        if($sessionManager->addModuleToSession($idModule, $idSession, $dureeModule)){
            
            $msg = "Le module a bien été ajouté à la session.";
        }
    }
    
    $sessionManager = new SessionManager();
    
    //RECUPERER LA LISTE DES MODULES
    $listeModules = $sessionManager->getListeModules();
    
    //RECUPERER LA LISTE DES SESSIONS
    $sessions = $sessionManager->getSessions();
    
    require 'view/add_module_to_session.view.php';
}

//AJOUT D'UN MODULE
function addModule($data = null){
    
    $msg = "";
    
    if(isset($data)){
        
        $nomModule = $data['nomModule'];
        $idCategorie = $data['idCategorie']; 
        
        $sessionManager = new SessionManager();
        
        //AFFICHER MESSAGE SUCCES
        if($sessionManager->addModule($nomModule, $idCategorie)){
            
            $msg = "Le module a bien été ajouté.";
            
        }                           
    }       
    
    $categorieManager = new CategorieManager();
    
    //RECUPERER CATEGORIES
    $categories = $categorieManager->getCategories(); 
   
    require 'view/add_module.view.php';
   
}

