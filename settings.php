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
        <link rel="stylesheet" type="text/css" href="css/logistic_menu/default.css" />
        <link rel="stylesheet" type="text/css" href="css/logistic_menu/component.css" />
        <link rel="stylesheet" type="text/css" href="css/menuIcons.css" />
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <!--<script src="js/logistic_menu/modernizr.custom.js"></script>-->
    </head>
    <body>
        <?php
        require_once 'header.php';
        ?>
        <div class="container">
            <div class="main">
                <ul class="cbp-ig-grid">
                    <li>
                        <a href="#">
                            <span class="icons-group4"></span>
                            <h3 class="cbp-ig-title">Staff</h3>
                            <span class="cbp-ig-category">Permanent & Temporary</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icons-communities"></span>
                            <h3 class="cbp-ig-title">Communities</h3>
                            <span class="cbp-ig-category">Brigade Communities</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icons-tent"></span>
                            <h3 class="cbp-ig-title">Compounds</h3>
                            <span class="cbp-ig-category">Compounds Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icons-shopping122"></span>
                            <h3 class="cbp-ig-title">Food Inventory</h3>
                            <span class="cbp-ig-category">Add new food</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icons-whisk1"></span>
                            <h3 class="cbp-ig-title">Kitchen Equipment</h3>
                            <span class="cbp-ig-category">Mange kitchen Equipment</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icons-pill"></span>
                            <h3 class="cbp-ig-title">Medicines Inventory</h3>
                            <span class="cbp-ig-category">Manage medicines</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icons-oxygen"></span>
                            <h3 class="cbp-ig-title">Security Equipment</h3>
                            <span class="cbp-ig-category">Manage Security Equipment</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icons-bus21"></span>
                            <h3 class="cbp-ig-title">Vehicles</h3>
                            <span class="cbp-ig-category">Manage Vehicles</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icons-businessmen23"></span>
                            <h3 class="cbp-ig-title">Roles</h3>
                            <span class="cbp-ig-category">Add/Remove permission</span>
                        </a>
                    </li>
                    <li>
                        <a href="settings_menu.php">
                            <span class="icons-school7"></span>
                            <h3 class="cbp-ig-title">Universities</h3>
                            <span class="cbp-ig-category">Add/Remove permission</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>
