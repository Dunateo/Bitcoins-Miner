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
            $this->bdd = new PDO("mysql:host=mysql-bitcoinsminer.alwaysdata.net;dbname=bitcoinsminer_bit;charset=utf8;port:3306","170643","Circlub2018"); //connexion à la base  //connexion à la base 
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        
    }
    function sql(){
        $req = $this->bdd->prepare($this->requete);
         
    }

}
