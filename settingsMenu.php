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
        <!--<script src="js/settings/settingsMenu.js"></script> -->
        <title>Global Brigades Panama</title>
    </head>
    <body>
        <?php
        if(isset($_SESSION["position"])){
            $position1="SM".$_SESSION["position"];
        }
        ?>
        <div class="main_body">
             <?php
                require 'header.php';
            ?>           
        </div>
        <div class="datatable">
            <h1> Tabla para consultas </h1>
        </div>
        <div class="menu">
            <a href="<?php echo "src/webrouter.php?position=$position1+&action=crear"?>" name="Crear">
                            <button class="btn" name="Crear">Crear</button>
            </a>
            <br>
            <a href="<?php echo "src/webrouter.php?position=$position1+&action=editar"?>" name="Editar">
                            <button class="btn" name="Editar">Editar</button>
            </a>   
            <br>
            <a href="<?php echo "src/webrouter.php?position=$position1+&action=eliminar"?>" name="Eliminar">
                            <button class="btn" name="Eliminar">Eliminar</button>
            </a>   
        </div>
    </body>
</html>
