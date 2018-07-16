<?php

require_once 'model/StagiaireManager.model.php';
require_once 'functions.php';

//LISTE STAGIAIRES
function getStagiaires() {

    $stagiaireManager = new StagiaireManager();

    $stagiaires = $stagiaireManager->getStagiaires();

    require 'view/liste_stagiaires.view.php';
}

function getFicheStagiaire($idStagiaire) {

    $stagiaireManager = new StagiaireManager();

    //AFFICHAGE INFOS PERSO STAGIAIRE
    $infosStagiaire = $stagiaireManager->getInfosStagiaire($idStagiaire);

    //AFFICHAGE DES SESSIONS DU STAGIAIRE
    $sessionsStagiaire = $stagiaireManager->getSessionsStagiaire($idStagiaire);

    require 'view/fiche_stagiaire.view.php';
}

//AJOUT D'UN STAGIAIRE A UNE SESSION
function addStagiaireToSession($data = null) {

    $msg = "";

    if (isset($data)) {

        $idStagiaire = e($data['idStagiaire']);
        $idSession = e($data['idSession']);

        $sessionManager = new StagiaireManager();
        
        //ERREUR SI CHAMP VIDE
        if (empty($_POST['idStagiaire']) || empty($_POST['idSession'])) {

            $msg = "Veuillez renseigner tous les champs.";
        }

        //AFFICHER MESSAGE SUCCES
        else if ($sessionManager->addStagiaireToSession($idStagiaire, $idSession)) {

            $msg = "Le stagiaire a bien été ajouté à la session.";
        }
    }

    $sessionManager = new StagiaireManager();

    //AFFICHER LISTE STAGIAIRES
    $listeStagiaires = $sessionManager->getListeStagiaires();

    $sessionManager = new SessionManager();

    //AFFICHER LISTE SESSIONS
    $sessions = $sessionManager->getSessions();

    require 'view/add_stagiaire_to_session.view.php';
}

//AJOUT STAGIAIRE
function addStagiaire($data = null) {

    $msg = "";

    if (isset($data)) {

        $prenomStagiaire = e(capsLower($data['prenomStagiaire']));
        $nomStagiaire = e(capsUpper($data['nomStagiaire']));
        $sexeStagiaire = e(capsUpper($data['sexeStagiaire']));
        $naissanceStagiaire = e($data['naissanceStagiaire']);
        $villeStagiaire = e(capsLower($data['villeStagiaire']));
        $emailStagiaire = e(strtolower($data['emailStagiaire']));
        $telephoneStagiaire = e($data['telephoneStagiaire']);

        $stagiaireManager = new StagiaireManager();

        //ERREUR SI CHAMP VIDE
        if (empty($_POST['prenomStagiaire']) || empty($_POST['nomStagiaire']) ||
                empty($_POST['sexeStagiaire']) || empty($_POST['naissanceStagiaire']) ||
                empty($_POST['emailStagiaire']) || empty($_POST['telephoneStagiaire'])) {

            $msg = "Veuillez renseigner tous les champs.";
        }

        //ERREUR SI EMAIL DEJA EXISTANT DANS LA BDD
        //->dans StagiaireManager
        
        //ERREUR SI PRENOM OU NOM OU VILLE COMPORTENT CARACTERES SPECIAUX OU NE FONT PAS LE BON NOMBRE DE CARACTERES
        else if (!preg_match("#[a-zéèàêâùïüëçA-Z'-]{3,20}#", $_POST['prenomStagiaire'])) {
            
            $msg = 'Votre prénom ne doit comporter aucun caractère spécial et faire doit entre 3 et 20 caractères.';
            
        } 
        
        else if (!preg_match("#[a-zéèàêâùïüëçA-Z'-]{3,20}#", $_POST['nomStagiaire'])) {
            
            $msg = 'Votre nom ne doit comporter aucun caractère spécial et doit faire entre 3 et 20 caractères.';
            
        } 
        
        else if (!preg_match("#^[a-zéèàêâùïüëçA-Z'-]{3,20}$#", $_POST['villeStagiaire'])) {
            
            $msg = 'Votre ville de naissance ne doit comporter aucun caractère spécial et doit faire entre 3 et 20 caractères.';
            
        } 
        
        //ERREUR SI LE NUMERO DE TELEPHONE NE COMMENCE PAS PAR UN ZERO ET SI IL NE COMPORTE PAS 10 CHIFFRES
        else if (!preg_match("#^0[1-9]([0-9]{2}){4}$#", $_POST['telephoneStagiaire'])) {
            
            $msg = 'Votre numéro de téléphone doit comporter uniquement des chiffres et faire 10 chiffres de long.';
            
        } 
        
        //ERREUR SI L'EMAIL N'A PAS UN FORMAT VALIDE
        else if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,10}$#", $_POST['emailStagiaire'])) {
 //  avant c'était ça :) --> "#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#"   
            $msg = 'Votre adresse e-mail doit être valide.';
            
        } 

        //AFFICHAGE MESSAGE SUCCES
        else if ($stagiaireManager->addStagiaire($prenomStagiaire, $nomStagiaire, $sexeStagiaire, $naissanceStagiaire, $villeStagiaire, $emailStagiaire, $telephoneStagiaire)) {

            $msg = "Le stagiaire <h2>" . $prenomStagiaire . " " . $nomStagiaire . "</h2> a bien été ajouté.";
        } 
    }

    require 'view/add_stagiaire.view.php';
}
