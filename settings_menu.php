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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="shortcut icon" href="img/favicon.ico"/>
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
            <a href="formcampamento.php">
                            <button class="btn" name="Crear">Crear</button>
                        </a>
            <br>
            <a href="formcampamento.php">
                            <button class="btn" name="Editar">Editar</button>
                        </a>   
        </div>
    </body>
</html>
