<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$form = $_POST;
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bitcoin;charset=utf8', 'root', ''); //connexion à la base 
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//test du password 
if ($form['reg_password'] === $form['reg_password_confirm'] && $form['reg_password'] != '' ) {

//recupération des username 
    $user = $form['reg_username'];
    $pass = password_hash($form['reg_password'], PASSWORD_DEFAULT);
    $email = $form['reg_email'];
    $req = $bdd->prepare('INSERT INTO login(pseudo, password, mail) VALUES(:pseudo, :password, :mail)');
    $req->execute(array(
        'pseudo' => $user,
        'password' => $pass,
        'mail' => $email));
     $req->closeCursor();
     $req = null;
     $bdd = null;
    echo 'Vous êtes inscrit ! Connectez-vous maintenant';
    header('Refresh: 3; url="../pages/connexion.php"');
    
} else {
    echo 'Vous n avez pas tapé le même mdp';
    header('Refresh: 2; url="../pages/login.php"');
}



