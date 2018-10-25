
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
                width: 1200,
                height: 750,
                parent: 'phaser-example',
                scene: {
                    preload: preload,
                    create: create,
                    update: update
                }
            };

            var game = new Phaser.Game(config);
            var text;
            var cmpH=0;
            var cmpR=0;
            
            var Htext;
            //Nombre de Bitcoins Total
            var bit = 0;
            //Nombre de Mines
            var NBhamster = 0;
            var NBraspy = 0;

            var prixhasmter = 20;
            var prixraspy = 100;
            
            var Vraspy= 5;


            var timehamster = 3;
            var timeraspy=10;
            var timedEvent;
            function preload()
            {
                this.load.image('bitcoin', '../assets/bitcoin.png');
                this.load.image('hamster', '../assets/hamster.png');
                this.load.image('raspy', '../assets/raspy.png');
            }

            function create()
            {
                //Text en haut à gauche
                text = this.add.text(320, 320);
                var sprite = this.add.sprite(450, 400, 'bitcoin').setInteractive();
                var Bhamster = this.add.sprite(975, 56, 'hamster').setInteractive();
                var Braspy = this.add.sprite(975, 150, 'raspy').setInteractive();

                //Bouton Bitcoin
                sprite.on('pointerdown', function (pointer) {

                    this.setScale(0.9, 0.9);
                    bit = bit + 1;

                });
                sprite.on('pointerout', function (pointer) {

                    this.setScale(1, 1);

                });
                sprite.on('pointerup', function (pointer) {

                    this.setScale(1, 1);

                });
                //Texte nombre de Bitcoin
                text = this.add.text(16, 16, 'Bitcoins: 0', {fontSize: '32px', fill: 'white'});

                //Boutton Hamster
                Bhamster.on('pointerdown', function (pointer) {

                    if (bit >= prixhasmter) {
                        NBhamster = NBhamster + 1;
                        bit = bit - prixhasmter;
                        Htext.setText('' + NBhamster);
                        this.setTint(0x7878ff);
                    } else
                    {
                        this.setTint(0xff0000);
                    }
                });
                Bhamster.on('pointerout', function (pointer) {

                    this.clearTint();

                });
                Bhamster.on('pointerup', function (pointer) {

                    this.clearTint();

                });
                Htext = this.add.text(770, 36, '0', {fontSize: '30px', fill: 'white'});
                this.add.text(975, 56, '50B Hamster', {fontSize: '20px', fill: 'white'});

                //Boutton raspy
                Braspy.on('pointerdown', function (pointer) {

                    if (bit >= prixraspy) {
                        NBraspy = NBraspy + 1;
                        bit = bit - prixraspy;
                        Rtext.setText('' + NBraspy);
                        this.setTint(0x7878ff);
                    } else
                    {
                        this.setTint(0xff0000);
                    }
                });
                Braspy.on('pointerout', function (pointer) {

                    this.clearTint();

                });
                Braspy.on('pointerup', function (pointer) {

                    this.clearTint();

                });
                var Rtext = this.add.text(770, 129, '0', {fontSize: '30px', fill: 'white'});
                this.add.text(975,149, '100B Raspy', {fontSize: '20px', fill: 'white'});
                
                
                
                timedEvent = this.time.addEvent({delay: 500, callback: onEvent, callbackScope: this, loop: true});
            }
            function update()
            {
                //Actualisation du texte
                text.setText('Bitcoins: ' + bit);

            }
            //Chaque seconde
            function onEvent() {   
            cmpH=cmpH+1;
            if(cmpH===timehamster){
                cmpH=0;
                bit=bit+NBhamster;
            }
            cmpR=cmpR+1;
            if(cmpR===timeraspy){
                cmpR=0;
                bit=bit+NBraspy*5;
            }
            }
        </script>




    </body>
</html>
