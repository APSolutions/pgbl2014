<?php
require 'src/ficha/ficha.php';
require 'src/login/usuario.php';

session_name('Global');
session_id('pgbl');
session_start();

$ficha = $_SESSION["ficha"];
$fichaID = $ficha->getID();
$communities = $ficha->getCommunities();
$compounds = $ficha->getCompounds();
?>
<html>
    <head>
        <!-- Page description-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Global Brigades Panama: Fichas" />
        <meta name="keywords" content="global brigades, panama, fichas, programa" />
        <meta name="author" content="APSolution" />
        <title>Global Brigades Panama | Fichas</title>
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <!-- CSS scripts-->
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link rel="stylesheet" type="text/css" href="css/ficha.css" />
        <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
        <!-- JS scripts-->
        <script src="js/ficha.js"></script>
        <script src="js/classie.js"></script>
        <script src="js/selectFx.js"></script>
        <script type="text/javascript">
            function getCommunities(){
                var a = <?php echo json_encode($communities)?>;
                return a;
            }
            function getCompounds(){
                var a = <?php echo json_encode($compounds)?>;
                return a;
            }
            function setup(){
                (function() {
                    [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
                        new SelectFx(el);
                    } );
                })();
            }
        </script>
    </head>
    <body onload="loadData(getCommunities(),getCompounds()),loadCommunities(),loadCompounds(),setup();">
        <?php
        require 'header.php';
        ?>
        <div class="container">
            <div class="fichaSection fichaGenerals">
                <?php
                $fichaGenerals = $ficha->getFichaData();
                ?>
                <h2 class="ficha-tittle"><?php echo $fichaID;?>
                    <span class="ficha-program"><?php echo $fichaGenerals["program"]?></span>
                </h2>
                <h2 class="ficha-places"> Comunidad </h2>
                <section>
                    <select class="cs-select cs-skin-slide" id="communityList">
                    </select>
                </section>
                <h2 class="ficha-places"> Campamento </h2>
                <section>
                    <select class="cs-select cs-skin-slide" id="compoundList">
                    </select>
                </section>            
            </div>
        </div>        
    </body>
</html>
