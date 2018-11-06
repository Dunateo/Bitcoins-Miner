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
$ham = $form['ham'];
$raspi = $form['raspi'];

if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
    $user = $_SESSION['id'];
    $_SESSION['bitcoins'] = $bitcoins;
    $_SESSION['hamster'] = $ham;
    $_SESSION['raspi'] = $raspi;
    $req = $bdd->prepare('UPDATE `login` SET `bitcoins`= :bitcoins, `hamster` =:hamster, `raspi` =:raspi WHERE `login`.`id_login` = :pseudo');
                            $req->execute(array(
                                'pseudo' => $user,
                                'hamster' => $ham,
                                'raspi' => $raspi,
                                'bitcoins' => $bitcoins));
$req->closeCursor();                           
                            
}
