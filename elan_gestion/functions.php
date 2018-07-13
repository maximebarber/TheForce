<?php

//FONCTION QUI PERMET DE PREVENIR LES INJECTIONS XSS
function e($value){
    return strip_tags($value, ENT_COMPAT);
} 

//FONCTION QUI PERMET DE TOUT METTRE EN MINUSCULES SAUF LA PREMIERE LETTRE
function capsLower($value){
    $firstCap = mb_strtoupper(mb_substr($value, 0, 1));
    return $firstCap.mb_substr(mb_strtolower($value), 1);
}

//FONCTION QUI PERMET DE TOUT METTRE EN MAJUSCULES
function capsUpper($value){
    return mb_strtoupper($value);
}
