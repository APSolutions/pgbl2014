<?php
    require 'src/login/usuario.php';
    
    session_name('Global');
    session_id('pgbl');
    session_start();    
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Page description-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Global Brigades Panama: Fichas" />
        <meta name="keywords" content="global brigades, panama, fichas, programa" />
        <meta name="author" content="APSolution" />        
        <title>Global Brigades Panama | Fichas</title>
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <!-- CSS scripts-->
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <!-- JS scripts-->
    </head>
    <body>
        <?php
        require 'header.php';
        ?>
        <div class="table-content">
            <table class="responstable">
                <tr>
                  <th data-th="Driver details"><span>Numero de Ficha</span></th>
                  <th>Fecha de Inicio</th>
                  <th>Fecha de Finalizacion</th>
                  <th>Comunidad</th>
                  <td>Accion</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>1/1/2014</td>
                  <td>7/1/2014</td>
                  <td>Chepo</td>
                  <td>
                    <a href="#" class="button">Editar</a>
                    <a href="#" class="button">Excluir</a>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>1/1/2014</td>
                  <td>7/1/2014</td>
                  <td>Darien</td>
                  <td>
                    <a href="#" class="button">Editar</a>
                    <a href="#" class="button">Excluir</a>
                  </td>
                </tr>
            </table>
        </div>
    </body>
</html>
