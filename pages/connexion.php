
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
        <link href="../css/index.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
        <link href="../css/login.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>

    <body class="text-center">

        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                    <h3 class="masthead-brand">February</h3>
                    <nav class="nav nav-masthead justify-content-center">
                        <a class="nav-link " href="../index.php">Home</a>
                        <a class="nav-link " href="../pages/login.php">Sign-Up</a>
                        <a class="nav-link active" href="../pages/connexion.php">Connexion</a>
                    </nav>
                </div>
            </header>

            
            <div class="text-center" style="padding:50px 0">
                <div class="logo">login</div>
                <!-- Main Form -->
                <div class="login-form-1">
                    <form id="login-form" class="text-left">
                        <div class="login-form-main-message"></div>
                        <div class="main-login-form">
                            <div class="login-group">
                                <div class="form-group">
                                    <label for="lg_username" class="sr-only">Username</label>
                                    <input type="text" class="form-control" id="lg_username" name="lg_username" placeholder="username">
                                </div>
                                <div class="form-group">
                                    <label for="lg_password" class="sr-only">Password</label>
                                    <input type="password" class="form-control" id="lg_password" name="lg_password" placeholder="password">
                                </div>
                                <div class="form-group login-group-checkbox">
                                    <input type="checkbox" id="lg_remember" name="lg_remember">
                                    <label for="lg_remember">remember</label>
                                </div>
                            </div>
                            <button type="submit" class="login-button"><i class="fas fa-play"></i></button>
                        </div>
                        <div class="etc-login-form">
                            <p>new user? <a href="../pages/login.php">create new account</a></p>
                        </div>
                    </form>
                </div>
                <!-- end:Main Form -->
            </div>

            <footer class="mastfoot mt-auto">
                <div class="inner">
                    <p>Valentin Bru et Jérémy Bonnefoi</p>
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