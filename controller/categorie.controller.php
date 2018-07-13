<?php

require_once 'model/CategorieManager.model.php';

function getCategories(){
    $categorieManager = new CategorieManager();
    $categories = $categorieManager->getCategories();
    require 'view/add_module.view.php';
}