<?php

abstract class Manager{
    
    //PERMET AUX ENFANTS DE LA CLASSE DE SE CONNECTER A LA BDD
    protected $db;
    
    protected function dbConnect(){
        
        try{
            //variables de connexion
            $host = 'phpmyadmin.elan-formation.eu';
            $dbname = 'maxime_elan_gestion';
            $user = 'm_barber';
            $password = 'elanformation67';
            
            $this->db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=UTF8;',$user,$password);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
        }
        catch(PDOException $e){
            echo 'Echec lors de la connexion : '.$e->getMessage();
        }
    }
}