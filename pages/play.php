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
                parent: 'phaser-example',
                scene: {
                    preload: preload,
                    create: create,

                }
            };

            var game = new Phaser.Game(config);
            var text;
            var bit = 0;
            function preload()
            {
                this.load.image('bitcoin', '../assets/bitcoin.png');
            }

            function create()
            {
                text = this.add.text(320, 320);
                var sprite = this.add.sprite(450, 400, 'bitcoin').setInteractive();
                sprite.on('pointerdown', function (pointer) {

                    this.setScale(0.9, 0.9);
                    bit = bit + 1;
                    text.setText('Bitcoins: ' + bit);
                });

                sprite.on('pointerout', function (pointer) {

                    this.setScale(1, 1);

                });

                sprite.on('pointerup', function (pointer) {

                    this.setScale(1, 1);

                });
                text = this.add.text(16, 16, 'Bitcoins: 0', {fontSize: '32px', fill: 'white'});

            }
        </script>




    </body>
</html>
