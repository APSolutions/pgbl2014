<?php
require 'src/login/usuario.php';
require 'src/brigade/brigade.php';

session_name('Global');
session_id('pgbl');
session_start();

$_SESSION["position"] = "Formulario de Brigada";

if (isset($_SESSION["brigadeID"])){
    $brigadeID = $_SESSION["brigadeID"];
}else {
    $brigadeID = "None";
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
                var brigadeID =  <?php echo json_encode($brigadeID) ?>;
                if (brigadeID !== ""){
                    hideiTem("selectProgram");
                }                    
            }
        </script>
    </head>
    <body onload="init()">
        <?php
        require 'header.php';
        ?>
        <div class="container">
            <h2>Datos de la Brigada</h2>
            <div class="basics">                
                <h3>ID Asignado: <span id="fichaID" class="current-value"><?php echo $brigadeID?></span></h3>
                
                <form id="frmRequired" class="required" method="post" action="">
                    
                    <h3>
                        <label for="selectProgram">Programa: </label>
                        <span id="program-content">
                            <?php require 'src/brigade/getProgram.php';?>
                        </span>
                    </h3>
                    <select id="selectProgram" class="cs-select" required onclick="selectRequire(0)">
                        <option value="" selected></option>
                        <?php require 'src/brigade/getProgramsList.php';?>
                    </select>
                    
                    <h3><label for="selectUniversity">Universidad/es:</label></h3>
                    <ul class="univesitiesList">
                        <?php require 'src/brigade/getUniversities.php';?>
                    </ul>  
                    <select id="selectUniversity" class="cs-select" required>
                        <option value="none" selected>none</option>
                        <?php require 'src/brigade/getUniversitiesList.php';?>
                    </select>
                    <input id="btnAdd" type="button" value="Add" onclick="selectRequire(1)"/>
                    
                    <h3>Fechas</h3>
                    <div class="fecha-inicio"> <label for="brigadeBeginDate">Inicio:</label>
                        <input type="date" name="brigadeBeginDate" required value="<?php require "src/brigade/beginDate.php";?>"/>
                    </div>
                    <div class="fecha-finalizacion"> <label for="brigadeEndingDate">Finalizacion:</label>
                        <input type="date" name="brigadeEndingDate" required value="<?php require "src/brigade/endingDate.php";?>"/>
                    </div>
                </form>
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
