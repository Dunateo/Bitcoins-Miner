<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$form = $_POST;
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {
    // all us connexion and user routine
    $user = $_SESSION['pseudo'];
    
    if ($form['chg_password'] === $form['chg_password_confirm'] && $form['chg_password'] != '') {
        $pass = password_hash($form['chg_password'], PASSWORD_DEFAULT);
        $req = $bdd->prepare('INSERT INTO login(password) VALUES(:password)');
        $req->execute(array(
            'pseudo' => $user,
            'password' => $pass,));
    } else {
        echo 'password not matching';
    }

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bitcoin;charset=utf8', 'root', ''); //connexion à la base 
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    ?>






    <?PHP } else {
    ?>




<?PHP } ?>
