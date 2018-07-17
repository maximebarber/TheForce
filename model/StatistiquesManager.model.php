<?php

require_once ('Manager.model.php');

class StatistiquesManager extends Manager {

    public function __construct(){
        parent::dbConnect();
    }

    public function getStatsCategories() {

        $stmt = "SELECT * FROM stats_cat";
        $req = $this->db->query($stmt);
        return $req;

    }

    public function getStatsSexes() {

        $stmt = "SELECT * FROM stats_sexe";
        $req = $this->db->query($stmt);
        return $req;

    }

}
