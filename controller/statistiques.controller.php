<?php

require_once 'model/StatistiquesManager.model.php';

//AFFICHAGE STATS CATEGORIES
function getStatsCategories(){

    $statistiquesManger = new StatistiquesManager();
    $statsCategories = $statistiquesManger->getStatsCategories();
    $statsSexes = $statistiquesManger->getStatsSexes();
    require "view/statistiques.view.php";

}
