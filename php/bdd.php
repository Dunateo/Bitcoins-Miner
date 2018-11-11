<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class bdd {

    protected $log = 'root';
    protected $mdp = '';
    protected $bdd;
    public $requete;
    
    function __construct() {
        
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=bitcoin;charset=utf8', 'root', ''); //connexion à la base 
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        
    }
    function sql(){
        $req = $this->bdd->prepare($this->requete);
         
    }

}
