<?php
require 'src/ficha/ficha.php';
require 'src/login/usuario.php';

session_name('Global');
session_id('pgbl');
session_start();

$ficha = $_SESSION["ficha"];
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
        <!-- JS scripts-->
    </head>
    <body>
        <?php
        require 'header.php';
        ?>
        <div class="container">
            <div class="fichaSection fichaGenerals">
                <?php
                $fichaGenerals = $ficha->getFichaData();
                ?>
                <span id="fichaID"><?php echo $fichaGenerals["id"]?></span>
                <span><?php echo $fichaGenerals["program"]?></span>
                <label> Comunidad </label>
                <span><?php echo $fichaGenerals["community"]?></span>                
                <label> Campamento </label>
                <span><?php echo $fichaGenerals["compound"]?></span>                
            </div>
        </div>
        
    </body>
</html>
