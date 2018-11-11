
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Play</title>
        <script src="../phaser-3.15.1/dist/phaser-arcade-physics.min.js"></script>

        <link href="../css/index.css" rel="stylesheet">
        <link href="../css/play.css" rel="stylesheet">

    </head>
    <body class="text-center">



        <?php
        session_start();
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
            var cmpH = 0;
            var cmpR = 0;

            var Htext;
            //Nombre de Bitcoins Total
            var bit = <?php echo $_SESSION['bitcoins']; ?>;
            //Nombre de Mines
            var NBhamster = <?php echo $_SESSION['hamster']; ?>;
            var NBraspy = <?php echo $_SESSION['raspi']; ?>;
            var NBpcport = <?php echo $_SESSION['pcportable']; ?>;
            var NBrig = <?php echo $_SESSION['rigperso']; ?>;
            var NBsalle = <?php echo $_SESSION['salle']; ?>;
            var NBbuand = <?php echo $_SESSION['buanderie']; ?>;
            var NBserv = <?php echo $_SESSION['serveur']; ?>;
            
            
            var prixhasmter = 20;
            var prixraspy = 100;
            var prixpcport = 400;
            var prixrig = 800;
            var prixsalle = 1000;
            var prixbuand = 10000;
            var prixserv = 50000;
           

            var Vraspy = 5;
            var Vpcport = 10;
            var Vrig = 15;
            var Vsalle = 20;
            var Vbuand = 25;
            var Vserv = 30;
           


            var timehamster = 3;
            var timeraspy = 10;
            var timepcport = 20;
            var timerig = 30;
            var timesalle = 40;
            var timebuand = 50;
            var timeserv = 60;
            
            var timedEvent;
            function preload()
            {
                this.load.image('bitcoin', '../assets/bitcoin.png');
                this.load.image('hamster', '../assets/hamster.png');
                this.load.image('raspy', '../assets/raspy.png');
                this.load.image('pcport', '../assets/pcport.png');
                this.load.image('rig', '../assets/RIGperso.png');
                this.load.image('salle', '../assets/salle.png');
                this.load.image('buand', '../assets/buanderie.png');
                this.load.image('serv', '../assets/serveur.png');
                
                this.load.image('save', '../assets/save.png');
               
            }

            function create()
            {
                //Text en haut à gauche
                text = this.add.text(320, 320);
                var sprite = this.add.sprite(450, 400, 'bitcoin').setInteractive();
                var Bhamster = this.add.sprite(975, 56, 'hamster').setInteractive();
                var Braspy = this.add.sprite(975, 150, 'raspy').setInteractive();
                var Bpcport = this.add.sprite(975, 242, 'pcport').setInteractive();
                var Brig = this.add.sprite(975, 334, 'rig').setInteractive();
                var Bsalle = this.add.sprite(975, 427, 'salle').setInteractive();
                var Bbuand = this.add.sprite(975, 520, 'buand').setInteractive();
                var Bserv = this.add.sprite(975, 613, 'serv').setInteractive();
                
                var Bsave = this.add.sprite(100, 600, 'save').setInteractive();
                




                //Bouton Bitcoin
                sprite.on('pointerdown', function (pointer) {

                    this.setScale(0.9, 0.9);
                    bit = bit + 1;
                    //particules
                    

                });
                sprite.on('pointerout', function (pointer) {

                    this.setScale(1, 1);

                });
                sprite.on('pointerup', function (pointer) {

                    this.setScale(1, 1);

                });
                //Texte nombre de Bitcoin
                text = this.add.text(16, 16, 'Bitcoins: 0', {fontSize: '32px', fill: 'white'});

                //Bouton Save avec la requête ajax
                Bsave.on('pointerdown', function (pointer) {

                    this.setTint(0x7878ff);

                    var xhr = getXMLHttpRequest();
                    var debut = "bit=" + bit + "&ham=" + NBhamster + "&raspi=" + NBraspy;
                    var reste = "&pc="+NBpcport+"&rig="+NBrig+"&salle="+NBsalle+"&buand="+NBbuand+"&serv="+NBserv;
                    var send = debut+reste;
                    console.log(send);

                    // Now get the value from user and pass it to
                    // server script.
                    xhr.onreadystatechange = function () {
                        /* Si l'état = terminé */
                        if (xhr.readyState === 4) {
                            //Nombre de Bitcoins Total
                            var bit = <?php echo $_SESSION['bitcoins']; ?>;
                            //Nombre de Mines
                            var NBhamster = <?php echo $_SESSION['hamster']; ?>;
                            var NBraspy = <?php echo $_SESSION['raspi']; ?>;
                        }

                    };
                    xhr.open("POST", "../php/ajax.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.send(send);


                });
                Bsave.on('pointerout', function (pointer) {

                    this.clearTint();

                });
                Bsave.on('pointerup', function (pointer) {

                    this.clearTint();

                });

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
                this.add.text(975, 149, '100B Raspy', {fontSize: '20px', fill: 'white'});
                
                //Boutton pcportable
                Bpcport.on('pointerdown', function (pointer) {

                    if (bit >= prixpcport) {
                        NBpcport = NBpcport + 1;
                        bit = bit - prixpcport;
                        PCtext.setText('' + NBpcport);
                        this.setTint(0x7878ff);
                    } else
                    {
                        this.setTint(0xff0000);
                    }
                });
                Bpcport.on('pointerout', function (pointer) {

                    this.clearTint();

                });
                Bpcport.on('pointerup', function (pointer) {

                    this.clearTint();

                });
                var PCtext = this.add.text(770, 220, '0', {fontSize: '30px', fill: 'white'});
                this.add.text(975, 242, '400B Pcportable', {fontSize: '20px', fill: 'white'});
                
                //Boutton rig
                Brig.on('pointerdown', function (pointer) {

                    if (bit >= prixrig) {
                        NBrig = NBrig + 1;
                        bit = bit - prixrig;
                        RGtext.setText('' + NBrig);
                        this.setTint(0x7878ff);
                    } else
                    {
                        this.setTint(0xff0000);
                    }
                });
                Brig.on('pointerout', function (pointer) {

                    this.clearTint();

                });
                Brig.on('pointerup', function (pointer) {

                    this.clearTint();

                });
                var RGtext = this.add.text(770, 310, '0', {fontSize: '30px', fill: 'white'});
                this.add.text(975, 334, '400B Rig Perso', {fontSize: '20px', fill: 'white'});
                
                //Boutton salle
                Bsalle.on('pointerdown', function (pointer) {

                    if (bit >= prixsalle) {
                        NBsalle = NBsalle + 1;
                        bit = bit - prixsalle;
                        Stext.setText('' + NBsalle);
                        this.setTint(0x7878ff);
                    } else
                    {
                        this.setTint(0xff0000);
                    }
                });
                Bsalle.on('pointerout', function (pointer) {

                    this.clearTint();

                });
                Bsalle.on('pointerup', function (pointer) {

                    this.clearTint();

                });
                var Stext = this.add.text(770, 400, '0', {fontSize: '30px', fill: 'white'});
                this.add.text(975, 427, '800B Salle Info', {fontSize: '20px', fill: 'white'});
                
                 //Boutton buand
                Bbuand.on('pointerdown', function (pointer) {

                    if (bit >= prixbuand) {
                        NBbuand = NBbuand + 1;
                        bit = bit - prixbuand;
                        Btext.setText('' + NBbuand);
                        this.setTint(0x7878ff);
                    } else
                    {
                        this.setTint(0xff0000);
                    }
                });
                Bbuand.on('pointerout', function (pointer) {

                    this.clearTint();

                });
                Bbuand.on('pointerup', function (pointer) {

                    this.clearTint();

                });
                var Btext = this.add.text(770, 500, '0', {fontSize: '30px', fill: 'white'});
                this.add.text(975, 520, '10000B Buanderie', {fontSize: '20px', fill: 'white'});
                
                //Boutton serveur
                Bserv.on('pointerdown', function (pointer) {

                    if (bit >= prixserv) {
                        NBserv = NBserv + 1;
                        bit = bit - prixserv;
                        SEtext.setText('' + NBserv);
                        this.setTint(0x7878ff);
                    } else
                    {
                        this.setTint(0xff0000);
                    }
                });
                Bserv.on('pointerout', function (pointer) {

                    this.clearTint();

                });
                Bserv.on('pointerup', function (pointer) {

                    this.clearTint();

                });
                var SEtext = this.add.text(770, 590, '0', {fontSize: '30px', fill: 'white'});
                this.add.text(975, 613, '50000B Serveur', {fontSize: '20px', fill: 'white'});
                
                timedEvent = this.time.addEvent({delay: 500, callback: onEvent, callbackScope: this, loop: true});
            }
            function update()
            {
                //Actualisation du texte
                text.setText('Bitcoins: ' + bit);

            }
            //Chaque seconde
            function onEvent() {
                cmpH = cmpH + 1;
                if (cmpH === timehamster) {
                    cmpH = 0;
                    bit = bit + NBhamster;
                }
                cmpR = cmpR + 1;
                if (cmpR === timeraspy) {
                    cmpR = 0;
                    bit = bit + NBraspy * 5;
                }


            }
            function getXMLHttpRequest() {
                var xhr = null;
                //ca veut dire que le navigateur prend en compte le ajax
                if (window.XMLHttpRequest || window.ActiveXObject) {
                    if (window.ActiveXObject) {
                        try {
                            xhr = new ActiveXObject("Msxml2.XMLHTTP");
                        } catch (e) {
                            xhr = new ActiveXObject("Microsoft.XMLHTTP")
                        }
                    } else {
                        xhr = new XMLHttpRequest();
                    }
                } else {
                    alert("Tu casse les couilles avec ton vieux navigateur, bouge de la!");
                    return null;
                }
                return xhr;

            }



        </script>




    </body>
</html>
