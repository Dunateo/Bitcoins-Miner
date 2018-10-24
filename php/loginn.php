<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$form = $_POST;
$user = $form['lg_username'];
$pass = password_hash($form['lg_username'], PASSWORD_DEFAULT);
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bitcoin;charset=utf8', 'root', ''); //connexion à la base 
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//on selectionne ce que l'on veut 
$req = $bdd->prepare('SELECT id_login, password FROM login WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $user));
$resultat = $req->fetch();
//on teste notre password 
$isPasswordCorrect = password_verify($form['lg_username'], $resultat['password']);



if (!$resultat) {
    echo 'Mauvais identifiant ou mot de passe !';
    $req->closeCursor();
    $req = null;
    $bdd = null;
    header('Refresh: 2; url="../pages/connexion.php"');
} else {
    if ($isPasswordCorrect === TRUE) {
        session_start();
        $_SESSION['id'] = $resultat['id_login'];
        $_SESSION['pseudo'] = $user;
        echo 'Vous êtes connecté !';
        $req->closeCursor();
        $req = null;
        $bdd = null;
        header('Refresh: 2; url="../pages/play.php"');
    } else {
        echo 'Mauvais identifiant ou mot de passe !';
        $req->closeCursor();
        $req = null;
        $bdd = null;
        header('Refresh: 2; url="../pages/connexion.php"');
    }
}



    