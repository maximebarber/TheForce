<?php

//FONCTION QUI PERMET DE PREVENIR LES INJECTIONS XSS
function e($value){
    return strip_tags($value, ENT_COMPAT);
} 

//FONCTION QUI PERMET DE TOUT METTRE EN MINUSCULES SAUF LA PREMIERE LETTRE
//IL MANQUE LA VERIFICATION POUR LES PRÉNOM COMPOSÉS, EXEMPLE : Jean-marie; Jean-jacques
function capsLower($value){
    /* J'enlève tout pour utiliser une function 
     * que j'ai trouvé dans la documentation 
     * de PHP. Parce que, il me semble que on a crée 
     * une function qu'existe déjà. Maintenant, je vais 
     * essayer avec la function de PHP pour y tester. 
     * $firstCap = mb_strtoupper(mb_substr($value, 0, 1));
    *return $firstCap.mb_substr(mb_strtolower($value), 1);
     */
      
      //Cette fonction de PHP qui prend en compte
      // 2 ou plusieurs mots et que met en majuscules
      // tous les premièrs caractères qui sont : 
      //soit sépares par un space ou 
      //soit séparés par un trait.
      //Maxime, je laisse la version précédente
      //car peut-être j'ai oublié d'autres vérifications
      //que tu avais prévu? Sinon, il faut effacer la précédente.
      return mb_convert_case($value, MB_CASE_TITLE, "UTF-8");

}

//FONCTION QUI PERMET DE TOUT METTRE EN MAJUSCULES
//Prendre en compte toutes les voyelles.
//Maxime, je laisse la version précédente
//car peut-être j'ai oublié d'autres vérifications
//que tu avais prévu? Sinon, il faut effacer la précédente.
function capsUpper($value){
    //return mb_strtoupper($value);
      return mb_convert_case($value, MB_CASE_UPPER, "UTF-8");
      
}
