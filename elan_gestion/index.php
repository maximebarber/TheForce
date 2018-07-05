<link rel="stylesheet" href="CSS/style.css" />
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php

require_once 'controller/session.controller.php';
require_once 'controller/stagiaire.controller.php';

require 'view/navbar.view.html';

if(isset($_GET['action'])){
            
                switch ($_GET['action']){
                    
                    case 'accueil': require 'view/accueil.view.php'; break;

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
                    
                    case 'add_stagiaire': require 'view/add_stagiaire.view.php'; break;
                    
                    case 'insert_stagiaire': 
                        //@TODO insert into front controller

                        if(isset($_POST['prenomStagiaire']) && isset($_POST['nomStagiaire']) && isset($_POST['sexeStagiaire']) && isset($_POST['naissanceStagiaire']) && isset($_POST['villeStagiaire']) && isset($_POST['emailStagiaire']) && isset($_POST['telephoneStagiaire'])){
                            $p = $_POST['prenomStagiaire'];
                            $nm = $_POST['nomStagiaire'];
                            $s = $_POST['sexeStagiaire'];
                            $n = $_POST['naissanceStagiaire'];
                            $v = $_POST['villeStagiaire'];
                            $e = $_POST['emailStagiaire'];
                            $t = $_POST['telephoneStagiaire'];
                            addStagiaire($p,$nm,$s,$n,$v,$e,$t);
                            
                            break;
                        }
                        
                    case 'add_session': require 'view/add_session.view.php'; break;
                    
                    case 'insert_session': 
                        //@TODO insert into front controller

                        if(isset($_POST['intitule']) && isset($_POST['dateDebut']) && isset($_POST['dateFin']) && isset($_POST['nbPlaces']) && isset($_POST['img'])){
                            $i = $_POST['intitule'];
                            $dd = $_POST['dateDebut'];
                            $df = $_POST['dateFin'];
                            $nb = $_POST['nbPlaces'];
                            $img = $_POST['img'];
                            addSession($i,$dd,$df,$nb,$img);
                            
                            break;
                        }
                        
                    
                    default: getSessions();
                        
                }
}
else {
    require 'view/accueil.view.php';
}