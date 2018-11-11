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
$pc = $form['pc'];
$rig = $form['rig'];
$salle = $form['salle'];
$buand = $form['buand'];
$serv = $form['serv'];

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {
    $user = $_SESSION['id'];
    $_SESSION['bitcoins'] = $bitcoins;
    $_SESSION['hamster'] = $ham;
    $_SESSION['raspi'] = $raspi;
    $_SESSION['pcportable'] = $pc;
    $_SESSION['rigperso'] = $rig;
    $_SESSION['salle'] = $salle;
    $_SESSION['buanderie'] = $buand;
    $_SESSION['serveur'] = $serv;
    $req = $bdd->prepare('UPDATE `login` SET `bitcoins`= :bitcoins, `hamster` =:hamster, `raspi` =:raspi, `pcportable`=:pc, `rigerso`=:rig, `salle_info`=:salle, `buanderie`=:buand, `serveur_islandais`=:serv WHERE `login`.`id_login` = :pseudo');
    $req->execute(array(
        'pseudo' => $user,
        'hamster' => $ham,
        'raspi' => $raspi,
        'pc' => $pc,
        'rig' => $rig,
        'salle' => $salle,
        'buand' => $buand,
        'serv' => $serv,
        'bitcoins' => $bitcoins));
    $req->closeCursor();
}
