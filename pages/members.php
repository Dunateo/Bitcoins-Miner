<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {
//connected
$user = $_SESSION['pseudo'];
 try {
    $bdd = new PDO('mysql:host=localhost;dbname=bitcoin;charset=utf8', 'root', ''); //connexion à la base 
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$req = $bdd->prepare('SELECT * FROM login WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $user));
$resultat = $req->fetch();   
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Welcome on The game">
        <meta name="author" content="Valetin Bru et Jéremy Bonnefoi">

        <title>Members</title>

        <!-- Bootstrap core CSS -->
        <link href="../bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/index.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    </head>

    <body class="text-center">

        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                    <h3 class="masthead-brand">October</h3>
                    <nav class="nav nav-masthead justify-content-center">
                        <a class="nav-link " href="../index.php">Home</a>
                        <a class="nav-link " href="../pages/login.php">Sign-Up</a>
                        <a class="nav-link " href="../pages/connexion.php">Sign-In</a>
                        <a class="nav-link active" href="../pages/members.php"><i class="far fa-user"></i></a>
                    </nav>
                </div>
            </header>

            <section>
                <?PHP
                 
                
                    echo 'Welcome ' . $_SESSION['pseudo'].' on your members page !';
                    echo '<br><br>Your mail is:'. $resultat['mail'];
                    echo '<br> <br>Your stats: <br>'. $resultat['bitcoins'].' bitcoins';
                    echo '<br>-'. $resultat['hamster'].' Hamster ';
                    echo '<br>-'. $resultat['raspi'].' Raspi ';
                    echo '<br>-'. $resultat['pcportable'].' Laptop';
                    echo '<br>-'. $resultat['rigerso'].' RIG';
                    echo '<br>-'. $resultat['salle_info'].' Classroom';
                    echo '<br>-'. $resultat['buanderie'].' Buanderie';
                    echo '<br>-'. $resultat['serveur_islandais'].' Serveur';
                    echo '<br>-'. $resultat['iss'].' ISS';
                    $req->closeCursor();
                    $req = null;
                    $bdd = null;
                ?>
                <br>
                <br>
                <a type="button" class="btn btn-dark" href="../php/deconnexion.php"> Log out ?</a>
                 <a type="button" class="btn btn-dark" href="../php/pass.php"> Password ?</a>
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
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>');</script>
        <script src="../bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
        <script src="../bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    </body>
</html>


<?PHP
}else{
//not member
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Welcome on The game">
        <meta name="author" content="Valetin Bru et Jéremy Bonnefoi">

        <title>Members</title>

        <!-- Bootstrap core CSS -->
        <link href="../bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/index.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    </head>

    <body class="text-center">

        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                    <h3 class="masthead-brand">October</h3>
                    <nav class="nav nav-masthead justify-content-center">
                        <a class="nav-link " href="../index.php">Home</a>
                        <a class="nav-link " href="../pages/login.php">Sign-Up</a>
                        <a class="nav-link " href="../pages/connexion.php">Sign-In</a>
                        <a class="nav-link active" href="../pages/members.php"><i class="far fa-user"></i></a>
                    </nav>
                </div>
            </header>

            <section>
                <?PHP
                 
                
                    echo 'You are not connected please sign-in ! ';
                   header('Refresh: 2; url="../pages/connexion.php"');
                
                ?>
                
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
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>');</script>
        <script src="../bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
        <script src="../bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    </body>
</html>
<?PHP

}
?>