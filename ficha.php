<?php
require 'src/ficha/ficha.php';
require 'src/login/usuario.php';

session_name('Global');
session_id('pgbl');
session_start();

$position=$_SESSION["position"] = "Detalle de la Ficha";
$_SESSION["action"] = "";
$_SESSION["program"] = "";

$ficha = $_SESSION["ficha"];
$fichaID = $ficha->getID();
$communities = $ficha->getCommunities();
$compounds = $ficha->getCompounds();
$fichaGenerals = $ficha->getFichaData();
$staffCoordinator = $ficha->getStaffCoordinator();
$staffInterpreter = $ficha->getStaffInterpreter();

?>
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
        <link rel="stylesheet" type="text/css" href="css/ficha.css" />
        <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
        <!-- JS scripts-->
        <script src="js/ficha.js"></script>
        <script type="text/javascript">
            function getCommunities(){
                var a = <?php echo json_encode($communities)?>;
                return a;
            }
            function getCompounds(){
                var a = <?php echo json_encode($compounds)?>;
                return a;
            }
            function getStaffCoordinator(){
                var a = <?php echo json_encode($staffCoordinator)?>;
                return a;
            }
            function getStaffInterpreter(){
                var a = <?php echo json_encode($staffInterpreter)?>;
                return a;
            }
            function selectedCommunity(){
                var a = <?php echo json_encode($fichaGenerals["community"])?>;
                return a;
            }
            function selectedCompound(){
                var a = <?php echo json_encode($fichaGenerals["compound"])?>;
                return a;
            }
        </script>
    </head>
    <body onload="loadData(getCommunities(),getCompounds(),getStaffCoordinator(),getStaffInterpreter());loadCommunities(selectedCommunity());loadCompounds(selectedCompound());loadStaffCoordinator(' ');loadStaffInterpreter(' ')" >
        <?php
        require 'header.php';
        ?>
        <div class="container">
            <div class="fichaSection fichaGenerals">
                <h2 class="ficha-tittle"><?php echo $fichaID;?>
                    <span class="ficha-program"><?php echo $fichaGenerals["program"]?></span>
                </h2>
                <h2 class="ficha-places"> Comunidad </h2>
                <select class="cs-select" id="communityList"></select>
                <h2 class="ficha-places"> Campamento </h2>                
                <select class="cs-select" id="compoundList"></select>                            
            </div>
            <div class="fichaSection fichaFlights">
                <div class="flights">
                    <h2 class="ficha-tittle">Vuelos</h2>
                    <table id="tableFlights">
                        <tr>
                            <td><h4>Vuelo</h4></td>
                            <td><h4>Fecha y Hora</h4></td>
                            <td><h4>Estudiantes</h4></td>
                        </tr>
                    </table>                    
                </div>                
            </div>
            <div class="fichaSection fichaTransportation">
                <div class="busses">
                    <h2 class="ficha-tittle">Transporte</h2>
                </div>
                <h2 class="ficha-places">Tour por la ciudad</h2>
                <select class="cs-select">
                    <option value="0" selected>No</option>
                    <option value="1">Si</option>
                </select>
                <h3>Total de Estudiantes</h3><span>10</span> 
            </div>
            <div class="fichaSection fichaStaff">
                <h2 class="ficha-tittle">Staff</h2>
                <div>
                    <h2 class="ficha-places"> Coordinador </h2>
                    <select class="cs-select" id="coordinatorList"></select>
                    <h2 class="ficha-places"> Interpretes </h2>                
                    <select class="cs-select" id="interpreterList"></select>
                    <h2 class="ficha-places"> Chofer </h2>                
                    <select class="cs-select" id="driverList"></select>
                </div>
            </div>
            <div class="fichaSection fichaStaff">
                <h2 class="ficha-tittle">Staff</h2>
                <div>
                    <h2 class="ficha-places"> Paramédico </h2>
                    <select class="cs-select" id="paramedicList"></select>
                    <h2 class="ficha-places"> Técnico </h2>                
                    <select class="cs-select" id="technicianList"></select>  
                    <h2 class="ficha-places"> Otros </h2>                
                    <select class="cs-select" id="otherList"></select>
                </div>
            </div>            
            <div class="fichaSection fichaVolunteers" style="clear: both;">
                <h2 class="ficha-tittle">Voluntarios</h2>
                <div class="volunteers">
                    <table id="tableVolunteers">
                        <tr>
                            <td><h4>Identificación</h4></td>
                            <td><h4>Nombre</h4></td>
                            <td><h4>Apellido</h4></td>
                            <td><h4>Llega antes</h4></td>
                            <td><h4>Se retira solo</h4></td>
                            <td><h4>Alergias</h4></td>
                            <td><h4>Dieta</h4></td>
                            <td><h4>Comentarios</h4></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>      
    </body>
</html>
