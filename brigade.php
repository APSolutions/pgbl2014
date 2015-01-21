<?php
require 'src/login/usuario.php';
require 'src/brigade/brigade.php';

session_name('Global');
session_id('pgbl');
session_start();

$_SESSION["position"] = "Formulario de Brigada";

if (isset($_SESSION["brigadeID"]) && !empty($_SESSION["brigadeID"])){
    $brigadeID = $_SESSION["brigadeID"];
}else {
    $brigadeID = "Ninguno";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Page description-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Global Brigades Panama: Brigada" />
        <meta name="keywords" content="global brigades, panama, brigada" />
        <meta name="author" content="APSolution" />
        <title>Global Brigades Panama | Brigade</title>
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <!-- CSS scripts-->
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
        <link rel="stylesheet" type="text/css" href="css/brigade.css"/>
        <!-- CSS scripts-->
        <script type="text/javascript" src="js/brigade.js"></script>
        <script type="text/javascript">
            function init(){
                disableForm("frmFlights");
                disableForm("frmVolunteers");                                  
            }
        </script>
    </head>
    <body onload="init();">
        <?php
        require 'header.php';
        ?>
        <div class="container">
            <h2>Datos de la Brigada</h2>
            <div class="basics">                
                <div class="brigade-id">
                    <span class="title">ID Asignado:</span>
                    <span class="content"><?php echo $brigadeID?></span>
                </div>
                
                <div class="brigade-program">
                    <span class="title">Programa:</span>
                    <span class="content"><?php require 'src/brigade/getProgram.php';?></span>
                    <select id="selectProgram" class="cs-select" required onclick="selectRequire(0)">
                        <option value="" selected></option>
                        <?php require 'src/brigade/getProgramsList.php';?>
                    </select>
                </div>
                
                <div class="brigade-universities">
                    <span class="title">Universidad/es:</span>
                    <ul class="univesitiesList" id="universitiesList">
                        <?php require 'src/brigade/getUniversities.php';?>
                    </ul>
                    <div id="universitiesAdded"></div>
                    <select id="selectUniversity" class="cs-select" required>
                        <option value="none" selected>none</option>
                        <?php require 'src/brigade/getUniversitiesList.php';?>
                    </select>
                    <input id="btnAdd" type="button" value="Add" onclick="addUniversity()"/>
                </div>
                
                <div class="brigade-dates">
                    <h3>Fechas</h3>
                    <div class="brigade-begin-date">
                        <span class="title">Inicio:</span>
                        <span class="content">
                            <input type="date" name="brigadeBeginDate" required value="<?php require "src/brigade/beginDate.php";?>"/>
                        </span>
                    </div>
                    <div class="brigade-end-date">
                        <span class="title">Final:</span>
                        <span class="content">
                            <input type="date" name="brigadeEndingDate" required value="<?php require "src/brigade/endingDate.php";?>"/>
                        </span>
                    </div>
                </div>
            </div>
            <div class="flights">
                <h2>Vuelos</h2>                
                <form id="frmFlights" class="required" method="post" action="">
                    <input type="text" name="flightNumber" required/>
                    <input type="date" name="flightDate" required/>
                    <input type="time" name="flightTime" required/>
                    <input type="number" name="flightStudents"/>
                    <select name="flightType">
                        <option value="0" selected>Llegada</option>
                        <option value="1">Salida</option>
                    </select>
                    <input type="button" value="Add"/>
                </form>                
            </div>
            <div class="volunteers">
                <h2>Voluntarios</h2>
                <form id="frmVolunteers" class="required" method="post" action="">
                    <input type="text" name="volunteerID" required/>
                    <input type="text" name="volunteerName" required/>
                    <input type="text" name="volunteerLastName" required/>
                    <select name="flightType">
                        <option value="0" selected>Voluntario</option>
                        <option value="1">Presidente</option>
                        <option value="2">Tutor</option>
                    </select>
                    <input type="text" name="volunteerAllergies"/>
                    <input type="text" name="volunteerDiet"/>
                    <input type="text" name="volunteerComments"/>
                    <input type="checkbox" name="volunteerArrive"/>
                    <input type="checkbox" name="volunteerLeave"/>
                </form>
            </div>                    
        </div>
    </body>
</html>
