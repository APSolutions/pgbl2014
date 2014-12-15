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
        <link rel="stylesheet" type="text/css" href="css/settingsMenu.css" media="all">
        <!--jQuery dependencies-->
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/base/jquery-ui.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
        <!--PQ Grid files-->
        <link rel="stylesheet" href="css/DataGrid/pqgrid.min.css" />
        <script src="js/DataGrid/pqgrid.min.js"></script>
        <!--PQ Grid Office theme-->
        <link rel="stylesheet" href="themes/office/pqgrid.css" />
        <script>
            $(function () {                
                var data = [[1, 'Aldo Afranchi', 'Gerente de Sistemas', '36,130.0'],
                    [2, 'Mel Brown', 'Gerente de Negocios y Microfinanzas', '11,231.0'],
                                [3, 'Wendy Ardilla', 'Asistente de Contablidad', '25,311.0'],
                                [4, 'Gregorio Linares', 'Enlace Comunitario', '22,341.0'],
                                [5, 'Elio Cunampio', 'Tecnico Ambiente', '-10,567.0']];

                var obj = { width: 700, height: 400, title: "Personal",resizable:true,draggable:true };
                obj.colModel = [{ title: "#", width: 100, dataType: "integer" },
                { title: "Nombre", width: 200, dataType: "string" },
                { title: "Rol", width: 150, dataType: "float", align: "right" },
                { title: "Tipo de Personal", width: 150, dataType: "float", align: "right"}];
                obj.dataModel = { data: data };
                $("#grid_array").pqGrid(obj);
            });
        </script>    
    </head>
    <body>
        <div class="main_body">
            <?php
                require 'header.php';
            ?>           
        </div>
        <div class="menu">
            <a href="<?php echo "src/webrouter.php?position=$position+&action=Crear"?>" name="Crear">
                            <button class="btn" name="Crear">Crear</button>
            </a>
            <br><br>
            <a href="<?php echo "src/webrouter.php?position=$position+&action=Editar"?>" name="Editar">
                            <button class="btn" name="Editar">Editar</button>
            </a>   
            <br><br>
            <a href="<?php echo "src/webrouter.php?position=$position+&action=Eliminar"?>" name="Eliminar">
                            <button class="btn" name="Eliminar">Eliminar</button>
            </a>   
        </div>     
        <!-- DC DataGrid Start -->
        <div id="grid_array" style="margin:100px;"></div>
        <!-- DC DataGrid End -->
    </body>
</html>
