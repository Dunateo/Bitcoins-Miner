<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$form = $_POST;
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bitcoin;charset=utf8', 'root', ''); //connexion à la base 
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$bitcoins = $form['bit'];
$req = $bdd->prepare('INSERT INTO login(bitcoins) VALUES(:bitcoins) WHERE pseudo = :pseudo');
                            $req->execute(array(
                                'pseudo' => $_SESSION['pseudo'],
                                'bitcoins' => $bitcoins));
$req->closeCursor();                           
                            