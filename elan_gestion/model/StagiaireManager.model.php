<?php

require_once ('Manager.model.php');

class StagiaireManager extends Manager {

    public function __construct(){
        parent::dbConnect();
    }
    
    //LISTER TOUTES LES SESSIONS
    public function getStagiaires(){

        $statement = "SELECT * FROM liste_stagiaires";
        $req = $this->db->query($statement);
        return $req;
    }
    
    public function getInfosStagiaire($idStagiaire){


        $stmt = "select concat(`s`.`prenom_stagiaire`,' ',`s`.`nom_stagiaire`) AS `nom`,`s`.`sexe_stagiaire` AS `sexe_stagiaire`,`s`.`naissance_stagiaire` AS `naissance_stagiaire`,`s`.`ville_stagiaire` AS `ville_stagiaire`,`s`.`email_stagiaire` AS `email_stagiaire`,`s`.`telephone_stagiaire` AS `telephone_stagiaire` from `maxime_elan_gestion`.`STAGIAIRE` `s` where (`s`.`id_stagiaire` = :id)";
        $req = $this->db->prepare($stmt);
        $req->execute(array(':id' => $idStagiaire));
        return $req;

    }
    
    public function getSessionsStagiaire($idStagiaire){


        $stmt = "select `ss`.`intitule_session` AS `intitule_session`,`ss`.`date_debut` AS `date_debut`,`ss`.`date_fin` AS `date_fin` from `maxime_elan_gestion`.`SESSION` `ss` join `maxime_elan_gestion`.`STAGIAIRE` `st` join `maxime_elan_gestion`.`session_stagiaire` `sst` where ((`ss`.`id_session` = `sst`.`id_session`) and (`st`.`id_stagiaire` = `sst`.`id_stagiaire`) and (`st`.`id_stagiaire` = :id))";
        $req = $this->db->prepare($stmt);
        $req->execute(array(':id' => $idStagiaire));
        return $req;

    }
    
    public function  addStagiaire($prenomStagiaire, $nomStagiaire, $sexeStagiaire, $naissanceStagiaire, $villeStagiaire, $emailStagiaire, $telephoneStagiaire){
        
        $stmt = "INSERT INTO STAGIAIRE(prenom_stagiaire, nom_stagiaire, sexe_stagiaire, naissance_stagiaire, ville_stagiaire, email_stagiaire, telephone_stagiaire) 
                        VALUES (:prenom_stagiaire, :nom_stagiaire, :sexe_stagiaire, :naissance_stagiaire, :ville_stagiaire, :email_stagiaire, :telephone_stagiaire)";
        $req = $this->db->prepare($stmt);
        $req->execute(array(':prenom_stagiaire' => $prenomStagiaire,
                                              ':nom_stagiaire' => $nomStagiaire,
                                              ':sexe_stagiaire' => $sexeStagiaire,
                                              ':naissance_stagiaire' => $naissanceStagiaire,
                                              ':ville_stagiaire' => $villeStagiaire,
                                              ':email_stagiaire' => $emailStagiaire,
                                              ':telephone_stagiaire' => $telephoneStagiaire));
        return $req;
        
    }

}
