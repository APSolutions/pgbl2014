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
        <title>Global Brigades Panama | Main Menu</title>
        <meta name="description" content="Global Brigades Panama: Main Menu" />
        <meta name="keywords" content="global brigades, panama, main, menu" />
        <meta name="author" content="APSolution" />
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="css/logistic_menu/default.css" />
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
                        
                        <a href="#">
                            <span class="mm-cogs"></span>
                            <h3 class="cbp-ig-title">Administration</h3>
                            <span class="cbp-ig-category">Manage GB</span>
                        </a>
                    </li>
                    <li>
                        <a href="logistic.php">
                            <span class="mm-history"></span>
                            <h3 class="cbp-ig-title">Logistic</h3>
                            <span class="cbp-ig-category">Brigades Logistic</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="mm-screen"></span>
                            <h3 class="cbp-ig-title">Programming</h3>
                            <span class="cbp-ig-category">Develop within GB</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>
