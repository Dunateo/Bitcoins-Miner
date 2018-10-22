<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../phaser-3.15.1/dist/phaser-arcade-physics.min.js"></script>
        <link href="../bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/index.css" rel="stylesheet">
        <link href="../css/play.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    </head>
    <body class="text-center">
       


                <?php
                // put your code here
                ?>
                
                    <script>
                        var config = {
                            type: Phaser.AUTO,
                            width: 1000,
                            height: 600,
                            physics: {
                                default: 'arcade',
                                arcade: {
                                    gravity: {y: 200}
                                }
                            },
                            scene: {
                                preload: preload,
                                create: create
                            }
                        };

                        var game = new Phaser.Game(config);

                        function preload()
                        {
                            this.load.setBaseURL('http://labs.phaser.io');

                            this.load.image('sky', 'assets/skies/space3.png');
                            this.load.image('logo', 'assets/sprites/phaser3-logo.png');
                            this.load.image('red', 'assets/particles/red.png');
                        }

                        function create()
                        {
                            this.add.image(400, 300, 'sky');

                            var particles = this.add.particles('red');

                            var emitter = particles.createEmitter({
                                speed: 100,
                                scale: {start: 1, end: 0},
                                blendMode: 'ADD'
                            });

                            var logo = this.physics.add.image(400, 100, 'logo');

                            logo.setVelocity(100, 200);
                            logo.setBounce(1, 1);
                            logo.setCollideWorldBounds(true);

                            emitter.startFollow(logo);
                        }
                    </script>
                


                <!-- Bootstrap core JavaScript
                    ================================================== -->
                <!-- Placed at the end of the document so the pages load faster -->
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>');</script>
                <script src="../bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
                <script src="../bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
                </body>
                </html>
