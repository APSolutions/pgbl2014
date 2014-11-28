<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
require 'src/login/usuario.php';
session_name('Global');
session_id('pgbl');
session_start();
$_SESSION["position"] = "Menu Principal";
$_SESSION["action"] = "";
$_SESSION["program"] = "";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Global Brigades Panama | Main Menu</title>
        <meta name="description" content="Global Brigades Panama: Main Menu" />
        <meta name="keywords" content="global brigades, panama, main, menu" />
        <meta name="author" content="APSolution" />
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="css/main_menu/style.css" />
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link rel="stylesheet" type="text/css" href="css/logistic_menu/component.css" />
        <script src="js/logistic_menu/modernizr.custom.js"></script>
    </head>
    <body>
        <div class="container">
            <?php
            require 'header.php';
            ?>	
            <div class="main">
                <ul class="cbp-ig-grid">
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Administracion"?>" name="Administracion" >
                            <span class="mm-cogs"></span>
                            <h3 class="cbp-ig-title">Administracion</h3>
                            <span class="cbp-ig-category">Aministrar GB</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Logistica"?>" name="Logistica" >
                            <span class="mm-history"></span>
                            <h3 class="cbp-ig-title">Logistica</h3>
                            <span class="cbp-ig-category">Logistica de las Brigadas</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Programacion"?>" name="Programacion" >
                            <span class="mm-screen"></span>
                            <h3 class="cbp-ig-title">Programacion</h3>
                            <span class="cbp-ig-category">Desarrollo dentro de GB</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>
