<?php
require 'src/login/usuario.php';

session_name('Global');
session_id('pgbl');
session_start();
$_SESSION["position"] = "Itinerarios";
$_SESSION["action"] = "";
$_SESSION["program"] = "";
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Page description-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Global Brigades Panama: Itinerarios" />
        <meta name="keywords" content="global brigades, panama, Itinerarios" />
        <meta name="author" content="APSolution" />        
        <title>Global Brigades Panama | Itinerarios</title>
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <!-- CSS scripts-->
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link rel="stylesheet" type="text/css" href="css/logistic_menu/component.css" />
        <!-- JS scripts-->
    </head>
    <body>
        <?php
        require 'header.php';
        ?>
        <div class="container">
            <div class="main">
                <ul class="cbp-ig-grid quantity3">
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Itinerarios&program=Ambiente"?>" name="eviromental" >
                            <span class="cbp-ig-icon icon-programs-enviromental"></span>
                            <h3 class="cbp-ig-title">Ambiente</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Itinerarios&program=Derechos Humanos"?>" name="humanRights" >
                            <span class="cbp-ig-icon icon-programs-human-rights"></span>
                            <h3 class="cbp-ig-title">Derechos Humanos</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Itinerarios&program=Medica"?>" name="medical" >
                            <span class="cbp-ig-icon icon-programs-medical"></span>
                            <h3 class="cbp-ig-title">Medica</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Itinerarios&program=Dental"?>" name="dental" >
                            <span class="cbp-ig-icon icon-programs-medical"></span>
                            <h3 class="cbp-ig-title">Dental</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Itinerarios&program=Microfinanzas"?>" name="microfinance" >
                            <span class="cbp-ig-icon icon-programs-microfinance"></span>
                            <h3 class="cbp-ig-title">Microfinanzas</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Itinerarios&program=Negocios"?>" name="business" >
                            <span class="cbp-ig-icon icon-programs-business"></span>
                            <h3 class="cbp-ig-title">Negocios</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Itinerarios&program=Salud Publica"?>" name="publicHealth" >
                            <span class="cbp-ig-icon icon-programs-public-health"></span>
                            <h3 class="cbp-ig-title">Salud Pública</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Itinerarios&program=Profesional"?>" name="professional" >
                            <span class="cbp-ig-icon icon-programs-professional"></span>
                            <h3 class="cbp-ig-title">Profesional</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>       
    </body>
</html>
