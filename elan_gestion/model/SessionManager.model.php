<?php

require_once ('Manager.model.php');

class SessionManager extends Manager {

    public function __construct(){
        parent::dbConnect();
    }
    
    //LISTER TOUTES LES SESSIONS
    public function getSessions(){

        $statement = "SELECT * FROM sessions_dispo2";
        $req = $this->db->query($statement);
        return $req;
    }
    
    public function getCountStagiaire(){
        
        $statement = "SELECT * FROM count_stagiaire";
        $req = $this->db->query($statement);
        return $req;
        
    }
    
    public function getProgrammeSession($idSession){


        $stmt = "select `m`.`nom_module` AS `nom_module`,`c`.`nom_categorie` AS `nom_categorie`,`sm`.`duree_module` AS `duree_module` from `maxime_elan_gestion`.`CATEGORIE` `c` join `maxime_elan_gestion`.`MODULE` `m` join `maxime_elan_gestion`.`session_module` `sm` where ((`c`.`id_categorie` = `m`.`id_categorie`) and (`sm`.`id_module` = `m`.`id_module`) and (`sm`.`id_session` = :id))";
        $req = $this->db->prepare($stmt);
        $req->execute(array(':id' => $idSession));
        return $req;

    }
         
    public function  addSession($intitule, $dateDebut, $dateFin, $nbPlaces, $img){
        
        $stmt = "INSERT INTO SESSION(intitule_session, date_debut, date_fin, nb_places_theoriques, img_session) 
                        VALUES (:intitule_session, :date_debut, :date_fin, :nb_places_theoriques, :img_session)";
        $req = $this->db->prepare($stmt);
        $req->execute(array(':intitule_session' => $intitule,
                            ':date_debut' => $dateDebut,
                            ':date_fin' => $dateFin,
                            ':nb_places_theoriques' => $nbPlaces,
                            ':img_session' => $img));
        return $req;
        
    }


}
