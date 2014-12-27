<?php
require 'src/login/usuario.php';
require 'src/brigade/brigade.php';

session_name('Global');
session_id('pgbl');
session_start();

$_SESSION["position"] = "Formulario de Brigada";
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
                var programsID = <?php echo json_encode(loadPrograms()["id"]);?>;
                var programsName = <?php echo json_encode(loadPrograms()["program"]);?>;
                loadPrograms(programsID,programsName);
                var universityID = <?php echo json_encode(loadUniveristies()["id"]);?>;
                var universityName = <?php echo json_encode(loadUniveristies()["univesity"]);?>;
                loadUniversities(universityID,universityName);
            }
        </script>
    </head>
    <body onload="init()">
        <?php
        require 'header.php';
        ?>
        <div class="container">
            <h2>Datos de la Brigada</h2>
            <div class="required">                
                <h3>ID Asignado:</h3><span id="fichaID"></span>
                
                <form id="frmRequired" class="required" method="post" action="">
                    <label for="selectUniversity">Universidad</label>
                    <select id="selectUniversity" class="cs-select" required>
                        <option value="none" selected>none</option>
                    </select>
                    <input id="btnAdd" type="button" value="Add" onclick="selectRequire(1)"/>
                    <label for="selectProgram">Programa</label>
                    <select id="selectProgram" class="cs-select" required onclick="selectRequire(0)">
                        <option value="none" selected>none</option>
                    </select>
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
