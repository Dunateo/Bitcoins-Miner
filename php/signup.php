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
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Welcome on The game">
        <meta name="author" content="Valetin Bru et Jéremy Bonnefoi">

        <title>Sign-up...</title>

        <!-- Bootstrap core CSS -->
        <link href="../bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/index.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">


    </head>

    <body class="text-center">

        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                    <h3 class="masthead-brand">October</h3>
                    <nav class="nav nav-masthead justify-content-center">
                        <a class="nav-link " href="../index.php">Home</a>
                        <a class="nav-link active" href="../pages/login.php">Sign-Up</a>
                        <a class="nav-link " href="../pages/connexion.php">Sign-In</a>
                    </nav>
                </div>
            </header>

            <section>
                <?PHP
//test du password 
                if ($form['reg_password'] === $form['reg_password_confirm'] && $form['reg_password'] != '') {

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
                    echo 'Vous êtes inscrit ! Connectez-vous';
                    header('Refresh: 3; url="../pages/connexion.php"');
                } else {
                    echo 'Vous n avez pas tapé le même mdp';
                    header('Refresh: 2; url="../pages/login.php"');
                }
                ?>
                <br>
                <img src="../pictures/loader4.gif" alt="loader"/>
            </section>



            <footer class="mastfoot mt-auto">
                <div class="inner">
                    <p><a href="https://www.linkedin.com/in/valentin-bru-09506a171/">Valentin Bru</a> et <a href="https://www.linkedin.com/in/j%C3%A9r%C3%A9my-bonnefoi-134569172/">Jérémy Bonnefoi</a></p>
                </div>
            </footer>
        </div>


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="../bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
        <script src="../bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    </body>
</html>
