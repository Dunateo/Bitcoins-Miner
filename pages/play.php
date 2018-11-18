
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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <link href="../css/Index.css" rel="stylesheet">
        <link href="../css/play.css" rel="stylesheet">

    </head>
    <body class="text-center">
        <a class="nav-link" href="../index.php"><i class="fab fa-apple"></i> </a>
        <?php
        session_start();
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {
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
                var cmpPC = 0;
                var cmpRG = 0;
                var cmpS = 0;
                var cmpB = 0;
                var cmpV = 0;
                var cmpvol = 0;
                var cmpbit = 1;

                var Htext;
                var Rtext;
                var PCtext;
                var RGtext;
                var Stext;
                var Btext;
                var SEtext;
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
                    this.load.image('fond', '../assets/fond.jpg');
                    this.load.image('vol', '../assets/son.png');
                    this.load.audio('musique', '../assets/mus.mp3');
                    this.load.audio('coins', '../assets/coins.mp3');
                    this.load.audio('cash', '../assets/cash.mp3');



                }

                function create()
                {
                    //Text en haut à gauche
                    text = this.add.text(320, 320);
                    this.add.image(600, 400, 'fond');
                    var music = this.sound.add('musique');
                    var sfx = this.sound.add('coins');
                    var sfxc = this.sound.add('cash');
                    var sprite = this.add.sprite(450, 400, 'bitcoin').setInteractive();
                    var Bhamster = this.add.sprite(975, 56, 'hamster').setInteractive();
                    var Braspy = this.add.sprite(975, 150, 'raspy').setInteractive();
                    var Bpcport = this.add.sprite(975, 242, 'pcport').setInteractive();
                    var Brig = this.add.sprite(975, 334, 'rig').setInteractive();
                    var Bsalle = this.add.sprite(975, 427, 'salle').setInteractive();
                    var Bbuand = this.add.sprite(975, 520, 'buand').setInteractive();
                    var Bserv = this.add.sprite(975, 613, 'serv').setInteractive();
                    var Bvol = this.add.sprite(50, 200, 'vol').setInteractive();
                    Bvol.setScale(0.3, 0.3);


                    music.play();



                    //Bouton Bitcoin
                    sprite.on('pointerdown', function (pointer) {

                        this.setScale(0.9, 0.9);
                        bit = bit + 1;
                        //particules
                        if (cmpbit === 1) {
                            sfx.play();
                        }

                    });
                    sprite.on('pointerout', function (pointer) {

                        this.setScale(1, 1);

                    });
                    sprite.on('pointerup', function (pointer) {

                        this.setScale(1, 1);

                    });
                    //Texte nombre de Bitcoin
                    text = this.add.text(16, 16, 'Bitcoins: 0', {fontSize: '32px', fill: 'white'});

                    //Bouton Volume
                    Bvol.on('pointerdown', function (pointer) {

                        if (cmpvol === 0) {
                            music.stop();
                            cmpvol = 1;
                            cmpbit = 0;
                            this.setTint(0x7878ff);
                        } else {
                            music.play();
                            cmpvol = 0;
                            cmpbit = 1;
                            this.setTint(0xff0000);
                        }

                    });
                    Bvol.on('pointerout', function (pointer) {



                    });
                    Bvol.on('pointerup', function (pointer) {



                    });


                    //Boutton Hamster
                    Bhamster.on('pointerdown', function (pointer) {

                        if (bit >= prixhasmter) {
                            NBhamster = NBhamster + 1;
                            bit = bit - prixhasmter;
                            Htext.setText('' + NBhamster);
                            if (cmpbit === 1) {
                                sfxc.play();
                            }
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
                    this.add.text(850, 56, '20B Hamster', {fontSize: '20px', fill: 'yellow'});

                    //Boutton raspy
                    Braspy.on('pointerdown', function (pointer) {

                        if (bit >= prixraspy) {
                            NBraspy = NBraspy + 1;
                            bit = bit - prixraspy;
                            Rtext.setText('' + NBraspy);
                            if (cmpbit === 1) {
                                sfxc.play();
                            }
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
                    Rtext = this.add.text(770, 129, '0', {fontSize: '30px', fill: 'white'});
                    this.add.text(850, 149, '100B Raspy', {fontSize: '20px', fill: 'yellow'});

                    //Boutton pcportable
                    Bpcport.on('pointerdown', function (pointer) {

                        if (bit >= prixpcport) {
                            NBpcport = NBpcport + 1;
                            bit = bit - prixpcport;
                            PCtext.setText('' + NBpcport);
                            if (cmpbit === 1) {
                                sfxc.play();
                            }
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
                    PCtext = this.add.text(770, 220, '0', {fontSize: '30px', fill: 'white'});
                    this.add.text(850, 242, '400B Pcportable', {fontSize: '20px', fill: 'yellow'});

                    //Boutton rig
                    Brig.on('pointerdown', function (pointer) {

                        if (bit >= prixrig) {
                            NBrig = NBrig + 1;
                            bit = bit - prixrig;
                            RGtext.setText('' + NBrig);
                            if (cmpbit === 1) {
                                sfxc.play();
                            }
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
                    RGtext = this.add.text(770, 310, '0', {fontSize: '30px', fill: 'white'});
                    this.add.text(850, 334, '800B Rig Perso', {fontSize: '20px', fill: 'yellow'});

                    //Boutton salle
                    Bsalle.on('pointerdown', function (pointer) {

                        if (bit >= prixsalle) {
                            NBsalle = NBsalle + 1;
                            bit = bit - prixsalle;
                            Stext.setText('' + NBsalle);
                            if (cmpbit === 1) {
                                sfxc.play();
                            }
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
                    Stext = this.add.text(770, 400, '0', {fontSize: '30px', fill: 'white'});
                    this.add.text(850, 427, '1.000B Salle Info', {fontSize: '20px', fill: 'yellow'});

                    //Boutton buand
                    Bbuand.on('pointerdown', function (pointer) {

                        if (bit >= prixbuand) {
                            NBbuand = NBbuand + 1;
                            bit = bit - prixbuand;
                            Btext.setText('' + NBbuand);
                            if (cmpbit === 1) {
                                sfxc.play();
                            }
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
                    Btext = this.add.text(770, 500, '0', {fontSize: '30px', fill: 'white'});
                    this.add.text(850, 520, '10.000B Buanderie', {fontSize: '20px', fill: 'yellow'});

                    //Boutton serveur
                    Bserv.on('pointerdown', function (pointer) {

                        if (bit >= prixserv) {
                            NBserv = NBserv + 1;
                            bit = bit - prixserv;
                            SEtext.setText('' + NBserv);
                            if (cmpbit === 1) {
                                sfxc.play();
                            }
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
                    SEtext = this.add.text(770, 590, '0', {fontSize: '30px', fill: 'white'});
                    this.add.text(850, 613, '50.000B Serveur', {fontSize: '20px', fill: 'yellow'});

                    timedEvent = this.time.addEvent({delay: 500, callback: onEvent, callbackScope: this, loop: true});
                }
                function update()
                {
                    //Actualisation du texte
                    text.setText('Bitcoins: ' + bit);
                    Htext.setText(NBhamster);
                    Rtext.setText(NBraspy);
                    PCtext.setText(NBpcport);
                    RGtext.setText(NBrig);
                    Stext.setText(NBsalle);
                    Btext.setText(NBbuand);
                    SEtext.setText(NBserv);

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
                    cmpPC = cmpPC + 1;
                    if (cmpPC === timepcport) {
                        cmpPC = 0;
                        bit = bit + NBpcport * Vpcport;
                    }
                    cmpRG = cmpRG + 1;
                    if (cmpRG === timerig) {
                        cmpRG = 0;
                        bit = bit + NBrig * Vrig;
                    }
                    cmpS = cmpS + 1;
                    if (cmpS === timerig) {
                        cmpS = 0;
                        bit = bit + NBrig * Vrig;
                    }
                    cmpB = cmpB + 1;
                    if (cmpB === timebuand) {
                        cmpB = 0;
                        bit = bit + NBbuand * Vbuand;
                    }
                    cmpV = cmpV + 1;
                    if (cmpV === timeserv) {
                        cmpV = 0;
                        bit = bit + NBserv * Vserv;
                    }
                    //requête ajax
                    var xhr = getXMLHttpRequest();
                    var debut = "bit=" + bit + "&ham=" + NBhamster + "&raspi=" + NBraspy;
                    var reste = "&pc=" + NBpcport + "&rig=" + NBrig + "&salle=" + NBsalle + "&buand=" + NBbuand + "&serv=" + NBserv;
                    var send = debut + reste;


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
    <?php
} else {
    header('Refresh: 0; url="../pages/connexion.php"');
}
?>