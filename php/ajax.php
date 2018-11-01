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

if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
    $user = $_SESSION['id'];
    $_SESSION['bitcoins'] = $bitcoins;
    $req = $bdd->prepare('UPDATE `login` SET `bitcoins`= :bitcoins WHERE `login`.`id_login` = :pseudo');
                            $req->execute(array(
                                'pseudo' => $user,
                                'bitcoins' => $bitcoins));
$req->closeCursor();                           
                            
}
