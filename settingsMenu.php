<?php
require 'src/login/usuario.php';
session_name('Global');
session_id('pgbl');
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/login/style1.css" media="screen" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" type="text/css" href="css/header.css" media="all">
        <link rel="stylesheet" type="text/css" href="css/settings/settings.css" media="all">
        <link rel="stylesheet" type="text/css" href="css/logistic_menu/default.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/header.js"></script>
        <script src="js/settings/settingsMenu.js"></script>
        <title>Global Brigades Panama</title>
    </head>
    <body>
        <div class="main_body">
             <?php
                require 'header.php';
            ?>           
        </div>
        <div class="datatable">
            <h1> Tabla para consultas </h1>
        </div>
        <div class="menu">
            <?php          
                $position = $_GET["position"];
                echo <<<_END
                <input id="position" type="hidden" name=$position value="" >
_END
                ?>
            <a href="#" name="Crear" onclick="selectform(event.currentTarget)">
                            <button class="btn" name="Crear">Crear</button>
                        </a>
            <br
                <?php          
                $position = $_GET["position"];
                echo <<<_END
                <input id="position" type="hidden" name=$position value="" >
_END
                ?>
            <a href="#" name="Editar" onclick="selectform(event.currentTarget)">
                            <button class="btn" name="Editar">Editar</button>
                        </a>   
            <br
                 <?php          
                $position = $_GET["position"];
                echo <<<_END
                <input id="position" type="hidden" name=$position value="" >
_END
                ?>
             <a href="#" name="Eliminar" onclick="selectform(event.currentTarget)">
                            <button class="btn" name="Eliminar">Eliminar</button>
                        </a>   
        </div>
    </body>
</html>
