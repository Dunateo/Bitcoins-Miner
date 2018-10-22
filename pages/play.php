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

        <link href="../css/index.css" rel="stylesheet">
        <link href="../css/play.css" rel="stylesheet">

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
                this.load.image('sky', '../assets/sky.png');


                this.load.image('logo', '../assets/meteorite.png');
                this.load.image('red', '../assets/particules.png');
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




    </body>
</html>
