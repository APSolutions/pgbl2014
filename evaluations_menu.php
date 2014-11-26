<?php
require 'src/login/usuario.php';
session_name('Global');
session_id('pgbl');
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Global Brigades Panama | Menú de Evaluaciones</title>
        <meta name="description" content="Global Brigades Panama: Logistic Menu" />
        <meta name="keywords" content="global brigades, panama, logistic, menu" />
        <meta name="author" content="APSolution" />
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="css/logistic_menu/component.css" />
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <script src="js/logistic_menu/modernizr.custom.js"></script>
        <script src="js/header.js"></script>
    </head>
    <body>
        <div class="container">
            <?php
            require_once 'header.php';
            ?>
            <div class="main">
                <ul class="cbp-ig-grid">
                    <li>
                        <a href="#" name="EBrigadas" onclick="locator(event.currentTarget)">
                            <span class="cbp-ig-icon icon-#"></span>
                            <h3 class="cbp-ig-title">Brigadas</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" name="EComida" onclick="locator(event.currentTarget)">
                            <span class="cbp-ig-icon icon-#"></span>
                            <h3 class="cbp-ig-title">Gastos de Comida</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" name="EPersonal" onclick="locator(event.currentTarget)">
                            <span class="cbp-ig-icon icon-#"></span>
                            <h3 class="cbp-ig-title">Personal</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" name="ESeguridad" onclick="locator(event.currentTarget)">
                            <span class="cbp-ig-icon icon-#"></span>
                            <h3 class="cbp-ig-title">Seguridad</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" name="ETransporte" onclick="locator(event.currentTarget)">
                            <span class="cbp-ig-icon icon-#"></span>
                            <h3 class="cbp-ig-title">Transporte</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>
