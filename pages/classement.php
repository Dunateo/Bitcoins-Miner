

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Welcome on The game">
        <meta name="author" content="Valetin Bru et Jéremy Bonnefoi">

        <title>CIR-Club</title>

        <!-- Bootstrap core CSS -->
        <link href="../bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/Index.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
        <link href="../css/login.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <script src="../js/verifLg.js"></script>

       </head>

    <body class="text-center">

        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                    <h3 class="masthead-brand">October</h3>
                    <nav class="nav nav-masthead justify-content-center">
                        <a class="nav-link" href="../index.php">Home</a>
                        <a class="nav-link" href="../pages/login.php">Sign-Up</a>
                        <a class="nav-link" href="../pages/connexion.php">Sign-In</a>
                        <a class="nav-link" href="../pages/members.php"><i class="far fa-user"></i></a>
                    </nav>
                </div>
            </header>

            <?php
            try {
            $bdd = new PDO('mysql:host=localhost;dbname=bitcoin;charset=utf8', 'root', ''); //connexion à la base  //connexion à la base 
            } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
            }
            $req = $bdd->prepare("SELECT * FROM login ");
            $req->execute();
            $n = $req->rowcount();
            class classement{
            public $reponse;
            function commandesql($bdd){

            $req = $bdd->prepare("SELECT pseudo,bitcoins FROM `login` WHERE bitcoins IS NOT NULL ORDER BY bitcoins DESC");
            $req->execute();
            $this->reponse = $req;
            }
            function affiche($reponse){
                $n=1;
            while($donnes = $reponse->fetch()){
            ?>
            <div>
                <?php echo $donnes['pseudo'];?></div> <div style="color: gold;"> Bitcoin : <?php echo $donnes['bitcoins'];?> B </div>
                <br>
            
            <?php
            $n++;
            }
            }

            }
            $cmd = new classement;
            $cmd->commandesql($bdd);
            $cmd->affiche($cmd->reponse);
            ?>
            <footer class = "mastfoot mt-auto">
            <div class = "inner">
            <p><a href = "https://www.linkedin.com/in/valentin-bru-09506a171/">Valentin Bru</a> et <a href = "https://www.linkedin.com/in/j%C3%A9r%C3%A9my-bonnefoi-134569172/">Jérémy Bonnefoi</a></p>
            </div>
            </footer>
            </div>


            <!--Bootstrap core JavaScript === === === === === === === === === === === === === === === === == -->
            <!--Placed at the end of the document so the pages load faster -->
           <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>');</script>
        <script src="../bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
        <script src="../bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
