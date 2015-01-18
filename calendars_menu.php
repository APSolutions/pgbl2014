<?php
require 'src/login/usuario.php';
session_name('Global');
session_id('pgbl');
session_start();
$_SESSION["position"] = "Calendarios";
$_SESSION["action"] = "";
$_SESSION["program"] = "";
$_SESSION["calendar"] = "";
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Global Brigades Panama | Menú de Calendarios</title>
        <meta name="description" content="Global Brigades Panama: Calendar Menu" />
        <meta name="keywords" content="global brigades, panama, calendar, menu" />
        <meta name="author" content="APSolution" />
        <link rel="shortcut icon" href="img/favicon.ico"/>
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
                <ul class="cbp-ig-grid quantity2">
                    <li>
                        <a href="#" name="CVisitas" onclick="locator(event.currentTarget)">
                            <span class="mm-cogs"></span>
                            <h3 class="cbp-ig-title">Calendarios de Visitas</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                    <li>
                        <a href="src/calendars/set-events.php" name="Calendario-de-Brigradas" >
                            <span class="mm-history"></span>
                            <h3 class="cbp-ig-title">Calendarios de Brigradas</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>
