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
        <title>Global Brigades Panama | Configuraciones de <?php echo $_SESSION["position"]?> </title>
        <meta name="description" content="Global Brigades Panama: Main Menu" />
        <meta name="keywords" content="global brigades, panama, main, menu" />
        <meta name="author" content="APSolution" />
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="css/header.css" media="all">
        <link rel="stylesheet" type="text/css" href="css/settings/settingsMenu.css" media="all">
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
            <a href="<?php echo "src/webrouter.php?position=$position+&action=crear"?>" name="Crear">
                            <button class="btn" name="Crear">Crear</button>
            </a>
            <br>
            <a href="<?php echo "src/webrouter.php?position=$position+&action=editar"?>" name="Editar">
                            <button class="btn" name="Editar">Editar</button>
            </a>   
            <br>
            <a href="<?php echo "src/webrouter.php?position=$position+&action=eliminar"?>" name="Eliminar">
                            <button class="btn" name="Eliminar">Eliminar</button>
            </a>   
        </div>
    </body>
</html>
