<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require 'src/login/usuario.php';
session_name('Global');
session_id('pgbl');
session_start();
$_SESSION["position"] = "Configuraciones";
$_SESSION["action"] = "";
$_SESSION["program"] = "";
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Global Brigades Panama | Main Menu</title>
        <meta name="description" content="Global Brigades Panama: Main Menu" />
        <meta name="keywords" content="global brigades, panama, settings, menu" />
        <meta name="author" content="APSolution" />
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="css/logistic_menu/component.css" />
        <link rel="stylesheet" type="text/css" href="css/menuIcons.css" />
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <!--<script src="js/header.js"></script>-->
        <!--<script src="js/logistic_menu/modernizr.custom.js"></script>-->
    </head>
    <body>
        <?php
        require_once 'header.php';
        ?>
        <div class="container">
            <div class="main">
                <ul class="cbp-ig-grid quantity5">
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Personal"?>" name="Personal">
                            <span class="cbp-ig-icon icons-group4"></span>
                            <h3 class="cbp-ig-title">Personal</h3>
                            <span class="cbp-ig-category">Permanent & Temporary</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Comunidades"?>" name="Comunidades">
                            <span class="cbp-ig-icon icons-communities"></span>
                            <h3 class="cbp-ig-title">Comunidades</h3>
                            <span class="cbp-ig-category">Brigade Communities</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Campamentos"?>" name="Campamentos">
                            <span class="cbp-ig-icon icons-tent"></span>
                            <h3 class="cbp-ig-title">Campamentos</h3>
                            <span class="cbp-ig-category">Compounds Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Inventario de Comida"?>" name="Inventario de Comida">
                            <span class="cbp-ig-icon icons-shopping122"></span>
                            <h3 class="cbp-ig-title">Inventario de Comida</h3>
                            <span class="cbp-ig-category">Add new food</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Equipos de Cocina"?>" name="Equipos de Cocina"> 
                            <span class="cbp-ig-icon icons-whisk1"></span>
                            <h3 class="cbp-ig-title">Equipos de Cocina</h3>
                            <span class="cbp-ig-category">Manage kitchen Equipment</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Inventario de Medicinas"?>" name="Inventario de Medicinas">
                            <span class="cbp-ig-icon icons-pill"></span>
                            <h3 class="cbp-ig-title">Inventario de Medicinas</h3>
                            <span class="cbp-ig-category">Manage medicines</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Equipos de Seguridad"?>" name="Equipos de Seguridad">
                            <span class="cbp-ig-icon icons-oxygen"></span>
                            <h3 class="cbp-ig-title">Equipos de Seguridad</h3>
                            <span class="cbp-ig-category">Manage Security Equipment</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Vehiculos"?>" name="Vehiculos">
                            <span class="cbp-ig-icon icons-bus21"></span>
                            <h3 class="cbp-ig-title">Vehiculos</h3>
                            <span class="cbp-ig-category">Manage Vehicles</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Roles"?>" name="Roles">
                            <span class="cbp-ig-icon icons-businessmen23"></span>
                            <h3 class="cbp-ig-title">Roles</h3>
                            <span class="cbp-ig-category">Add/Remove permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=Universidades"?>" name="Universidades">
                            <span class="cbp-ig-icon icons-school7"></span>
                            <h3 class="cbp-ig-title">Universidades</h3>
                            <span class="cbp-ig-category">Add/Remove permission</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>
