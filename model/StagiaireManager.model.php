<?php

require_once ('Manager.model.php');

class StagiaireManager extends Manager {

    public function __construct() {
        parent::dbConnect();
    }

    //LISTER TOUTES LES SESSIONS
    public function getStagiaires() {

        $statement = "SELECT * FROM liste_stagiaires";
        $req = $this->db->query($statement);
        return $req;
    }

    public function getInfosStagiaire($idStagiaire) {


        $stmt = "select concat(`s`.`prenom_stagiaire`,' ',`s`.`nom_stagiaire`) AS `nom`,`s`.`sexe_stagiaire` AS `sexe_stagiaire`,`s`.`naissance_stagiaire` AS `naissance_stagiaire`,`s`.`ville_stagiaire` AS `ville_stagiaire`,`s`.`email_stagiaire` AS `email_stagiaire`,`s`.`telephone_stagiaire` AS `telephone_stagiaire` from `maxime_elan_gestion`.`STAGIAIRE` `s` where (`s`.`id_stagiaire` = :id)";
        $req = $this->db->prepare($stmt);
        $req->execute(array(':id' => $idStagiaire));
        return $req;
    }

    public function getSessionsStagiaire($idStagiaire) {


        $stmt = "select `ss`.`intitule_session` AS `intitule_session`,date_format(`ss`.`date_debut`, '%d.%m.%Y') AS `date_debut`,date_format(`ss`.`date_fin`,'%d.%m.%Y') AS `date_fin`, ss.id_session from `maxime_elan_gestion`.`SESSION` `ss` join `maxime_elan_gestion`.`STAGIAIRE` `st` join `maxime_elan_gestion`.`session_stagiaire` `sst` where ((`ss`.`id_session` = `sst`.`id_session`) and (`st`.`id_stagiaire` = `sst`.`id_stagiaire`) and (`st`.`id_stagiaire` = :id))";
        $req = $this->db->prepare($stmt);
        $req->execute(array(':id' => $idStagiaire));
        return $req;
    }

    public function addStagiaire($prenomStagiaire, $nomStagiaire, $sexeStagiaire, $naissanceStagiaire, $villeStagiaire, $emailStagiaire, $telephoneStagiaire) {

        //VERIFIER SI L'EMAIL EXISTE DEJA DANS LA BDD
        $check = "SELECT email_stagiaire FROM STAGIAIRE WHERE email_stagiaire = :email";
        $exists = $this->db->prepare($check);
        $exists->execute(array('email' => $emailStagiaire));

        if ($exists->fetchColumn() === $emailStagiaire) {
            echo 'Cet e-mail existe déjà.';
        } else {

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

    public function addStagiaireToSession($idStagiaire, $idSession) {

        try {

            //REQUETE A EFFECTUER POUR AJOUTER UN STAGIAIRE A UNE SESSION
            $stmt = "INSERT INTO session_stagiaire (id_stagiaire, id_session)"
                    . "VALUES (:id_stagiaire, :id_session)";
            $req = $this->db->prepare($stmt);
            $req->execute(array(':id_stagiaire' => $idStagiaire,
                ':id_session' => $idSession));
            return $req;
            
        //MESSAGE AFFICHER SI LE STAGIAIRE EXISTE DEJA DANS LA SESSION            
        } catch (PDOException $e) {
            if ($e->errorInfo[0] == '23000' && $e->errorInfo[1] == '1062') {
                echo 'Ce stagiaire a déjà été ajouté à cette session.';
            } 
            else if ($e->errorInfo[0] == '23000' && $e->errorInfo[1] == '1452'){
                echo 'Veuillez saisir tous les champs.';
            }
            else {
                throw $e;
            }
        }
    }

    public function getListeStagiaires() {
        $stmt = "SELECT * FROM STAGIAIRE";
        $req = $this->db->query($stmt);
        return $req;
    }
    
    public function getListeStagiairesSession($idSession) {
        
        $stmt = "select concat(`s`.`prenom_stagiaire`,' ',`s`.`nom_stagiaire`) AS `nom`,`s`.`email_stagiaire` AS `email`, s.id_stagiaire from (`maxime_elan_gestion`.`STAGIAIRE` `s` join `maxime_elan_gestion`.`session_stagiaire` `ss`) where ((`s`.`id_stagiaire` = `ss`.`id_stagiaire`) and (`ss`.`id_session` = :id_session)) order by `s`.`nom_stagiaire`";
        $req = $this->db->prepare($stmt);
        $req->execute(array(':id_session' => $idSession));
        return $req;
        
    }

}
