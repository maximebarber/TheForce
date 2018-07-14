<?php

//FONCTION QUI PERMET DE PREVENIR LES INJECTIONS XSS
function e($value){
    return strip_tags($value, ENT_COMPAT);
} 

//FONCTION QUI PERMET DE TOUT METTRE EN MINUSCULES SAUF LA PREMIERE LETTRE
function capsLower($value){

      return mb_convert_case($value, MB_CASE_TITLE, "UTF-8");

}

//FONCTION QUI PERMET DE TOUT METTRE EN MAJUSCULES
function capsUpper($value){

      return mb_convert_case($value, MB_CASE_UPPER, "UTF-8");
      
}
