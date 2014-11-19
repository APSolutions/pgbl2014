<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
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
        <title>Global Brigades Panama | Logistic</title>
        <meta name="description" content="Global Brigades Panama: Logistic Menu" />
        <meta name="keywords" content="global brigades, panama, logistic, menu" />
        <meta name="author" content="APSolution" />
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="css/logistic_menu/default.css" />
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
                        <a href="#" name="Fichas" onclick="locator(event.currentTarget)">
                            <span class="cbp-ig-icon icon-file"></span>
                            <h3 class="cbp-ig-title">Fichas</h3>
                            <span class="cbp-ig-category">Actualiza tus fichas</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" name="Itinerario" onclick="locator(event.currentTarget)">
                            <span class="cbp-ig-icon icon-numbered-list"></span>
                            <h3 class="cbp-ig-title">Itinerario</h3>
                            <span class="cbp-ig-category">Actualiza tus itinerarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" name="Calendarios" onclick="locator(event.currentTarget)">
                            <span class="cbp-ig-icon icon-calendar"></span>
                            <h3 class="cbp-ig-title">Calendarios</h3>
                            <span class="cbp-ig-category">Ver y actualizar</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" name="Evaluaciones" onclick="locator(event.currentTarget)">
                            <span class="cbp-ig-icon icon-signup"></span>
                            <h3 class="cbp-ig-title">Evaluaciones</h3>
                            <span class="cbp-ig-category">Completa</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" name="Reportes" onclick="locator(event.currentTarget)">
                            <span class="cbp-ig-icon icon-stats"></span>
                            <h3 class="cbp-ig-title">Reportes</h3>
                            <span class="cbp-ig-category">Ver Reportes</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" name="Configuraciones" onclick="locator(event.currentTarget)">
                            <span class="cbp-ig-icon icon-cog"></span>
                            <h3 class="cbp-ig-title">Configuraciones</h3>
                            <span class="cbp-ig-category">Actualiza el sistema</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>
