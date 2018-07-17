<!DOCTYPE html>
<html>
      <head>
            <title> TheForce </title>
            <link rel="icon" type="image/png" href="favicon.png" />
            <link rel="stylesheet" href="CSS/style.css" />
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
            <meta name="viewport" content="width=device-width, initial-scale=1">
      </head>
</html>

<?php

require_once 'controller/session.controller.php';
require_once 'controller/stagiaire.controller.php';
require_once 'controller/categorie.controller.php';
require_once 'controller/statistiques.controller.php';
require_once 'functions.php';

//AFFICHAGE BARRE DE NAVIGATION
require 'view/navbar.view.html';

if(isset($_GET['action'])){
            
                switch ($_GET['action']){
                    
                    case 'accueil': require 'view/accueil.view.php'; break;
                    
                    case 'TheForce': require 'view/TheForce.view.php'; break;

                    case 'sessions_disponibles': getSessions(); break;
                    
                    case 'liste_stagiaires': getStagiaires(); break;
                    
                    case 'programme_session':

                        $idSession = $_GET['idSession'];

                        getProgrammeSession($idSession);

                        break;
                    
                    case 'fiche_stagiaire':

                        $idStagiaire = $_GET['idStagiaire'];

                        getFicheStagiaire($idStagiaire);
                        
                        break;
                    
                    case 'add_stagiaire': 
                        
                        if(!empty($_POST)){                            
                            
                            addStagiaire($_POST);  
                            
                        }
                        
                        else {
                            
                            addStagiaire();
                            
                        }
                        
                        var_dump($_POST);
                        
                        break;
  
                    case 'add_session': 
                        
                        if(!empty($_POST)){
                            
                            //DEBUT AJOUT IMAGE BDD
                            
                            /*if(isset($_POST['submit'])){
                                $file = $_FILES['img'];
                                
                                $fileName = $_FILES['img']['name'];
                                $fileTmpName = $_FILES['img']['tmp_name'];
                                $fileSize = $_FILES['img']['size'];
                                $fileError = $_FILES['img']['error'];
                                $fileType = $_FILES['img']['type'];
                                
                                $fileExt = explode('.', $fileName);
                                $fileActualExt = strtolower(end($fileExt));
                                
                                $allowed = array('jpg', 'jpeg', 'png');
                                
                                if(in_array($fileActualExt, $allowed)){
                                    if ($fileError === 0){
                                        if($fileSize < 5000000){
                                            $fileNameNew = uniqid('', true).".".$fileActualExt;
                                            $fileDestination = 'IMG/'.$fileNameNew;
                                            move_uploaded_file($fileTmpName, $fileDestination);
                                        } else {
                                            echo 'Image trop volumineuse.';
                                        }
                                    } else {
                                        echo 'Erreur lors du téléchargement.';
                                    }
                                } else {
                                    echo 'Fichier non supporté.';
                                }
                                
                            }*/
                            
                            //FIN AJOUT IMAGE BDD    
                            
                                                        
                            addSession($_POST);  
                            
                        }
                        
                        else {
                            
                            addSession();
                            
                        }
                        
                        var_dump($_POST);
                        
                        break;             
                        
                    case 'add_module':
                        
                        if(!empty($_POST)){
                            addModule($_POST);  
                        }
                        else addModule();                         
                        
                        break;      
                        
                    case 'add_module_to_session':
                        
                        if(!empty($_POST)){
                            addModuleToSession($_POST);  
                        }
                        else addModuleToSession();  
                        
                        var_dump($_POST);
                        
                        break;     
                        
                    case 'add_stagiaire_to_session':
                        
                        if(!empty($_POST)){
                            addStagiaireToSession($_POST);  
                        }
                        else addStagiaireToSession();  
                        
                        var_dump($_POST);
                        
                        break;     
                        
                    case 'statistiques':
                        
                        getStatsCategories(); break;
                        
                        break;
                      
                    default: getSessions();
                        
                }
}
else {
    
    require 'view/accueil.view.php';

}
