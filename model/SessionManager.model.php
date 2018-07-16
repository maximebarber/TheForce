<?php

require_once ('Manager.model.php');

class SessionManager extends Manager {

    public function __construct() {
        parent::dbConnect();
    }

    //LISTER TOUTES LES SESSIONS
    public function getSessions() {

        $statement = "SELECT * FROM sessions_dispo2";
        $req = $this->db->query($statement);
        return $req;
    }

    public function getIntitule($idSession) {

        $statement = "SELECT intitule_session
                      FROM SESSION
                      WHERE id_session = :id";
        $req = $this->db->prepare($statement);
        $req->execute(array(':id' => $idSession));
        return $req;
    }

    public function getCountStagiaire() {

        $statement = "SELECT * FROM count_stagiaire";
        $req = $this->db->query($statement);
        return $req;
    }

    public function getModules($idSession) {


        $stmt = "select `m`.`nom_module` AS `nom_module`,`c`.`nom_categorie` AS `nom_categorie`,`sm`.`duree_module` AS `duree_module` from `maxime_elan_gestion`.`CATEGORIE` `c` join `maxime_elan_gestion`.`MODULE` `m` join `maxime_elan_gestion`.`session_module` `sm` where ((`c`.`id_categorie` = `m`.`id_categorie`) and (`sm`.`id_module` = `m`.`id_module`) and (`sm`.`id_session` = :id))";
        $req = $this->db->prepare($stmt);
        $req->execute(array(':id' => $idSession));
        return $req;
    }

    public function getListeModules() {
        $stmt = "SELECT * FROM MODULE";
        $req = $this->db->query($stmt);
        return $req;
    }

    public function addSession($intitule, $dateDebut, $dateFin, $nbPlaces/* , $img */) {

        //VERIFIER SI L'INTITULE EXISTE DEJA DANS LA BDD
        $check = "SELECT intitule_session FROM SESSION WHERE intitule_session = :intitule";
        $exists = $this->db->prepare($check);
        $exists->execute(array('intitule' => $intitule));

        if ($exists->fetchColumn() === $intitule) {
            echo 'Cet intitulé de session existe déjà.';
        } else {

            $stmt = "INSERT INTO SESSION(intitule_session, date_debut, date_fin, nb_places_theoriques) 
                        VALUES (:intitule_session, :date_debut, :date_fin, :nb_places_theoriques);";
            $req = $this->db->prepare($stmt);
            $req->execute(array(':intitule_session' => $intitule,
                ':date_debut' => $dateDebut,
                ':date_fin' => $dateFin,
                ':nb_places_theoriques' => $nbPlaces));

            return $req;
        }
    }

    public function addModule($nomModule, $idCategorie) {

        //VERIFIER SI L'INTITULE DU MODULE EXISTE DEJA DANS LA BDD
        $check = "SELECT id_session, id_module FROM session_module WHERE id_session = :idSession AND id_module = :idModule";
        $exists = $this->db->prepare($check);
        $exists->execute(array('idSession' => $idSession,
            'idModule' => $idModule));

        if ($exists->fetchColumn(0) == $idSession && $exists->fetchColumn(1) == $idModule) {
            echo 'Ce nom de module de session existe déjà.';
        } else {

            $stmt = "INSERT INTO MODULE (nom_module, id_categorie) 
                        VALUES (:nom_module, :id_categorie)";
            $req = $this->db->prepare($stmt);
            $req->execute(array(':nom_module' => $nomModule,
                ':id_categorie' => $idCategorie));
            return $req;
        }
    }

    public function addModuleToSession($idModule, $idSession, $dureeModule) {

        try {

            //REQUETE A EFFECTUER POUR AJOUTER UN MODULE A UNE SESSION
            $stmt = "INSERT INTO session_module (id_module, id_session, duree_module)"
                         . "VALUES (:id_module, :id_session, :duree_module)";
            $req = $this->db->prepare($stmt);
            $req->execute(array(':id_module' => $idModule,
                ':id_session' => $idSession,
                ':duree_module' => $dureeModule));
            return $req;
            
        } catch (PDOException $e) {
            //MESSAGE AFFICHER SI LE MODULE EXISTE DEJA DANS LA SESSION
            if ($e->errorInfo[0] == '23000' && $e->errorInfo[1] == '1062') {
               echo 'Ce module a déjà été ajouté à cette session.';
            } 
            
            //MESSAGE AFFICHER SI AUCUN ELEMENT SELECTIONNE DANS LA LISTE DEROULANTE
            else if ($e->errorInfo[0] == '23000' && $e->errorInfo[1] == '1452'){
                echo 'Veuillez saisir tous les champs.';
            }
            else {
                throw $e;
            }
        }
    }

}
